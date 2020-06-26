<?php

namespace App\Http\Responses;

use App\Hairdresser;
use Carbon\Carbon;

class HairdresserResponse extends Response
{

    public $id;
    public $identifier;
    public $password;
    public $email;
    public $name;
    public $ruby;
    public $bioText;
    public $speciality;
    public $profileImagePath;
    public $gender;
    public $birthday;
    public $years;
    public $salonId;
    public $userId;
    public $positionId;
    public $deletedAt;
    public $createdAt;
    public $updatedAt;

    public $age;
    public $comprehensiveEvaluation;

    public $salon;
    public $position;
    public $reviews;

    public function constructWith(Hairdresser $hairdresser)
    {
        $this->id = $hairdresser->id;
        $this->identifier = $hairdresser->user->identifier;
        $this->password = $hairdresser->user->password;
        $this->email = $hairdresser->user->email;
        $this->name = $hairdresser->name;
        $this->ruby = $hairdresser->ruby;
        $this->bioText = $hairdresser->bio_text;
        $this->speciality = $hairdresser->speciality;
        $this->profileImagePath = $hairdresser->profile_image_path;
        $this->gender = $hairdresser->gender;
        $this->birthday = $hairdresser->birthday;
        $this->years = $hairdresser->years;
        $this->salonId = $hairdresser->salon_id;
        $this->userId = $hairdresser->user_id;
        $this->positionId = $hairdresser->position_id;
        $this->deletedAt = is_null($hairdresser->deleted_at) ? null : $hairdresser->deleted_at->toDateString();
        $this->createdAt = $hairdresser->created_at->toDateString();
        $this->updatedAt = $hairdresser->updated_at->toDateString();
    }

    public function setAge(Carbon $createdAt)
    {
        $now = new Carbon();
        $this->age = $now->diffInYears($createdAt);
    }

    public function setReviews(array $reviews)
    {
        $reviewSum = array_sum(array_map(function ($review) {
            $arr = [$review->skill, $review->customerService, $review->salonService, $review->app];
            return array_sum($arr) / count($arr);
        }, $reviews));
        $reviewsCount = count($reviews);
        $this->comprehensiveEvaluation = $reviewsCount == 0 ? 0 : $reviewSum / $reviewsCount;
        $this->reviews;
    }
}
