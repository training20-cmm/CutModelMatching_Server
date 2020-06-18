<?php

namespace App\Http\Responses;

use App\Salon;

class SalonResponse extends Response
{

    public $id;
    public $name;
    public $postcode;
    public $prefecture;
    public $address;
    public $building;
    public $bioText;
    public $capacity;
    public $parking;
    public $openHoursWeekdays;
    public $closeHoursWeekdays;
    public $openHoursWeekends;
    public $closeHoursWeekends;
    public $regularHoliday;
    public $createdAt;
    public $updatedAt;

    public $paymentMethods;

    public function constructWith(Salon $salon)
    {
        $this->id = $salon->id;
        $this->name = $salon->name;
        $this->postcode = $salon->postcode;
        $this->prefecture = $salon->prefecture;
        $this->address = $salon->address;
        $this->building = $salon->building;
        $this->bioText = $salon->bio_text;
        $this->capacity = $salon->capacity;
        $this->parking = $salon->parking;
        $this->openHoursWeekdays = $salon->open_hours_weekdays;
        $this->closeHoursWeekdays = $salon->close_hours_weekdays;
        $this->openHoursWeekends = $salon->open_hours_weekends;
        $this->closeHoursWeekends = $salon->close_hours_weekends;
        $this->regularHoliday = $salon->regular_holiday;
        $this->createdAt = $salon->created_at->toDateString();
        $this->updatedAt = $salon->updated_at->toDateString();
    }

    public function setPaymentMethods(array $salonPaymentMethods)
    {
        $salonPaymentMethodresponses = array_map(function ($salonPaymentMethod) {
            $salonPaymentMethodResponse = new SalonPaymentMethodResponse();
            $salonPaymentMethodResponse->constructWith($salonPaymentMethod);
            return $salonPaymentMethodResponse;
        }, $salonPaymentMethods);
        $this->paymentMethods = $salonPaymentMethodresponses;
    }
}
