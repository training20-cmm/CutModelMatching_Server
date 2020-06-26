<?php

namespace App\Http\Controllers\Api;

use App\Hairdresser;
use App\HairdresserPosition;
use App\Http\Controllers\Controller;
use App\Http\Requests\CustomRequest;
use App\Http\Responses\HairdresserResponse;
use App\Http\Responses\MenuImageResponse;
use App\Http\Responses\MenuTagResponse;
use App\Http\Responses\MenuTreatmentResponse;
use App\Http\Responses\MenuResponse;
use App\Http\Responses\SalonResponse;
use App\Menu;
use App\MenuImage;
use App\MenuTime;
use App\Services\FileSaveService;
use App\Services\ResponseConvertService;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class MenusController extends Controller
{

    public function search(CustomRequest $request)
    {
        $prefecture = $request->prefecture;
        $treatmentIds = $request->treatmentIds;
        $minPrice = $request->minPrice;
        $maxPrice = $request->maxPrice;
        $date = $request->date;
        $minStartTime = $request->minStartTime;
        $maxStartTime = $request->maxStartTime;
        $gender = $request->gender;
        $paymentMethodIds = $request->paymentMethodIds;
        $salonScale = $request->salonScale;
        $parking = $request->parking;
        $builder = DB::table("menus as m")
            ->select(
                "m.id as m_id",
                "m.title as m_title",
                "m.details as m_details",
                "m.price as m_price",
                "m.minutes as m_minutes",
                "h.profile_image_path as h_profile_image_path",
                "h.name as h_name",
                "h.gender as h_gender",
                "h.years as h_years",
                "h.birthday as h_birthday",
                "hp.name as hp_name",
                "tag.name as tag_name",
                "tag.color as tag_color",
                "s.name as s_name",
                "s.prefecture as s_prefecture",
                "treatment.id as treatment_id",
                "treatment.name as treatment_name",
                "image.path as image_path"
            )
            ->join("hairdressers as h", function ($join) {
                $join->on("m.hairdresser_id", "h.id");
            })
            ->join("hairdresser_positions as hp", function ($join) {
                $join->on("h.position_id", "hp.id");
            })
            ->join("reviews as r", function ($join) {
                $join->on("h.id", "r.hairdresser_id");
            })
            ->join("salons as s", function ($join) {
                $join->on("s.id", "h.salon_id");
            })
            ->join("menu_tag_association as tag_ass", function ($join) {
                $join->on("m.id", "tag_ass.menu_id");
            })
            ->join("menu_tags as tag", function ($join) {
                $join->on("tag.id", "tag_ass.menu_tag_id");
            })
            ->join("menu_treatment_association as treatment_ass", function ($join) {
                $join->on("m.id", "treatment_ass.menu_id");
            })
            ->join("menu_treatment as treatment", function ($join) {
                $join->on("treatment.id", "treatment_ass.menu_treatment_id");
            })
            ->join("menu_time as time", function ($join) {
                $join->on("m.id", "time.menu_id");
            })
            ->join("menu_images as image", function ($join) {
                $join->on("m.id", "image.menu_id");
            });
        if (!is_null($prefecture)) {
            $builder = $builder->where("s.prefecture", $prefecture);
        }
        if (!is_null($treatmentIds)) {
            $builder = $builder->whereIn("treatment.id", $treatmentIds);
        }
        if (!is_null($minPrice)) {
            $builder = $builder->where("m.price", ">=", $minPrice);
        }
        if (!is_null($maxPrice)) {
            $builder = $builder->where("m.price", "<=", $maxPrice);
        }
        if (!is_null($date)) {
            $builder = $builder->where("time.date", $date);
        }
        if (!is_null($minStartTime)) {
            $builder = $builder->where("time.start", ">=", $minStartTime);
        }
        if (!is_null($maxStartTime)) {
            $builder = $builder->where("time.start", "<=", $maxStartTime);
        }
        if (!is_null($gender)) {
            $builder = $builder->where("m.gender", $gender);
        }
        $menuGroups = $builder->get()->groupBy("m_id")->all();
        $menuResponses = [];
        //  "skill" => $faker->numberBetween(1, 5),
        // "customer_service" => $faker->numberBetween(1, 5),
        // "salon_service" => $faker->numberBetween(1, 5),
        // "app" => $faker->numberBetween(1, 5),
        foreach ($menuGroups as $menuId => $menus) {
            $menu = $menus[0];
            $menuResponse = new MenuResponse();
            $menuResponse->id = $menu->m_id;
            $menuResponse->title = $menu->m_title;
            $menuResponse->details = $menu->m_details;
            $menuResponse->price = $menu->m_price;
            $menuResponse->minutes = $menu->m_minutes;
            $hairdresser = new HairdresserResponse();
            $hairdresser->name = $menu->h_name;
            $hairdresser->gender = $menu->h_gender;
            $hairdresser->profileImagePath = $menu->h_profile_image_path;
            $hairdresser->years = $menu->h_years;
            $hairdresser->setAge(new Carbon($menu->h_birthday));
            $hairdresserPosition = new HairdresserPosition();
            $hairdresserPosition->name = $menu->hp_name;
            $hairdresser->position = $hairdresserPosition;
            $salon = new SalonResponse();
            $salon->name = $menu->s_name;
            $salon->prefecture = $menu->s_prefecture;
            $hairdresser->salon = $salon;
            $menuResponse->hairdresser = $hairdresser;
            $menuResponse->salon = $salon;
            $menuResponse->tags = array_map(function ($menu) {
                $tagResponse = new MenuTagResponse();
                $tagResponse->name = $menu->tag_name;
                $tagResponse->color = $menu->tag_color;
                return $tagResponse;
            }, $menus->all());
            $menuResponse->treatment = array_map(function ($menu) {
                $treatmentResponse = new MenuTreatmentResponse();
                $treatmentResponse->name = $menu->treatment_name;
                return $treatmentResponse;
            }, $menus->all());
            $menuResponse->images = array_map(function ($menu) {
                $menuImageResponse = new MenuImageResponse();
                $menuImageResponse->path = $menu->image_path;
                return $menuImageResponse;
            }, $menus->all());
            $menuResponses[] = $menuResponse;
        }
        return $menuResponses;
    }

    public function store(CustomRequest $request)
    {
        $user = self::user($request->token());
        $hairdresser = Hairdresser::where("user_id", $user->id)->first();
        $menu = DB::transaction(function () use ($request, $hairdresser) {
            $menu = Menu::create([
                "title" => $request->title,
                "details" => $request->details,
                "gender" => $request->gender,
                "price" => $request->price,
                "minutes" => $request->minutes,
                "hairdresser_id" => $hairdresser->id
            ]);
            if (!is_null($request->images)) {
                $menuImageParameters = [];
                foreach ($request->images as $image) {
                    if (!$image->isValid()) {
                        continue;
                    }
                    $fileSaveService = new FileSaveService();
                    $path = $fileSaveService->save($image, "images/menus/$menu->id");
                    $menuImageParameters[] = ["path" => $path, "menu_id" => $menu->id];
                }
                DB::table(MenuImage::table())->insert($menuImageParameters);
            }
            if (!is_null($request->tagIds)) {
                $menu->tags()->attach($request->tagIds);
            }
            if (!is_null($request->treatmentIds)) {
                $menu->treatment()->attach($request->treatmentIds);
            }
            if (!is_null($request->timeDates) && !is_null($request->timeStart)) {
                $timeDates = $request->timeDates;
                $timeStart = $request->timeStart;
                $menuTimeParameters = [];
                $count = min(count($timeDates), count($timeStart));
                for ($index = 0; $index < $count; ++$index) {
                    $menuTimeParameters[] = [
                        "date" => $timeDates[$index],
                        "start" => $timeStart[$index],
                        "menu_id" => $menu->id
                    ];
                }
                DB::table(MenuTime::table())->insert($menuTimeParameters);
            }
            return $menu;
        });
        $menu = Menu::with(["tags", "images", "treatment"])->where("id", $menu->id)->first();
        $converter = new ResponseConvertService();
        $menuResponse = new MenuResponse();
        $menuResponse->constructWith($menu);
        $menuResponse->tags = $converter->convert($menu->tags->all(), MenuTagResponse::class);
        $menuResponse->images = $converter->convert($menu->images->all(), MenuImageResponse::class);
        $menuResponse->treatment = $converter->convert($menu->treatment->all(), MenuTreatmentResponse::class);
        return $menuResponse;
    }
}
