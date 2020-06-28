<?php

namespace App\Http\Controllers\Api;

use App\Hairdresser;
use App\Http\Controllers\Controller;
use App\Http\Requests\CustomRequest;
use App\Http\Responses\HairdresserResponse;
use App\Http\Responses\SalonImageResponse;
use App\Http\Responses\SalonPaymentMethodResponse;
use App\Http\Responses\SalonResponse;
use App\QueryAdapter;
use App\Salon;
use App\SalonImage;
use App\SalonPaymentMethod;
use App\Services\FileSaveService;
use App\Services\ResponseConvertService;
use Illuminate\Support\Facades\DB;

class SalonsController extends Controller
{

    public function index(CustomRequest $request)
    {
        $user = self::user($request->token());
        $hairdresser = Hairdresser::where("user_id", $user->id)->get()->first();
        if (is_null($hairdresser)) {
            return self::badRequest();
        }
        $salon = $hairdresser->salon;
        if (is_null($salon)) {
            return self::notFound();
        }
        $converter = new ResponseConvertService();
        $salonResponse = new SalonResponse();
        $salonResponse->constructWith($salon);
        $salonResponse->paymentMethods = $converter->convert($salon->paymentMethods->all(), SalonPaymentMethodResponse::class);
        $salonResponse->images = $converter->convert($salon->images->all(), SalonImageResponse::class);
        $salonResponse->hairdressers = $converter->convert($salon->hairdressers->all(), HairdresserResponse::class);
        return $salonResponse;
    }

    public function store(CustomRequest $request): SalonResponse
    {
        $user = self::user($request->token());
        $hairdresser = Hairdresser::where("user_id", $user->id)->get()->first();
        if (is_null($hairdresser)) {
            return self::badRequest();
        }
        $salon = DB::transaction(function () use ($request, $hairdresser) {
            $salon = Salon::create([
                "name" => $request->name,
                "postcode" => $request->postcode,
                "prefecture" => $request->prefecture,
                "address" => $request->address,
                "building" => $request->building,
                "bio_text" => $request->bioText,
                "capacity" => $request->capacity,
                "parking" => $request->parking,
                "open_hours_weekdays" => $request->openHoursWeekdays,
                "close_hours_weekdays" => $request->closeHoursWeekdays,
                "open_hours_weekends" => $request->openHoursWeekends,
                "close_hours_weekends" => $request->closeHoursWeekends,
                "regular_holiday" => $request->regularHoliday,
            ]);
            if (!is_null($request->paymentMethodIds)) {
                foreach ($request->paymentMethodIds as $paymentMethodId) {
                    $salon->paymentMethods()->attach($paymentMethodId);
                }
            }
            if (!is_null($request->images)) {
                $imageParameters = [];
                foreach ($request->images as $image) {
                    if (!$image->isValid()) {
                        continue;
                    }
                    $fileSaveService = new FileSaveService();
                    $path = $fileSaveService->save($image, "images/salons/$salon->id");
                    // $path = $image->store("public/images/salons/$salon->id");
                    // $path = "storage" . substr($path, strlen("public"));
                    $imageParameters[] = ["path" => $path, "salon_id" => $salon->id];
                }
                DB::table(SalonImage::table())->insert($imageParameters);
            }
            $hairdresser->salon_id = $salon->id;
            $hairdresser->save();
            return $salon;
        });
        $converter = new ResponseConvertService();
        $salon = Salon::with(["paymentMethods", "images", "hairdressers"])->where("id", $salon->id)->first();
        $salonResponse = new SalonResponse();
        $salonResponse->constructWith($salon);
        $salonResponse->paymentMethods = $converter->convert($salon->paymentMethods->all(), SalonPaymentMethodResponse::class);
        $salonResponse->images = $converter->convert($salon->images->all(), SalonImageResponse::class);
        $salonResponse->hairdressers = $converter->convert($salon->hairdressers->all(), HairdresserResponse::class);
        return $salonResponse;
    }
}
