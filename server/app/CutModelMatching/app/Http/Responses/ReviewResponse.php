<?php

namespace  App\Http\Responses;

use App\Review;

class ReviewResponse extends Response
{

    public $id;
    public $content;
    public $skill;
    public $customerService;
    public $salonService;
    public $app;
    public $modelId;
    public $hairdresserId;
    public $createdAt;
    public $updatedAt;

    public function constructWith(Review $review)
    {
        $this->id = $review->id;
        $this->content = $review->content;
        $this->skill = $review->skill;
        $this->customerService = $review->customer_service;
        $this->salonService = $review->salon_servie;
        $this->app = $review->app;
        $this->modelId = $review->model_id;
        $this->hairdresserId = $review->hairdresser_id;
        $this->createdAt = $review->created_at->toDateTimeString();
        $this->updatedAt = $review->updated_at->toDateTimeString();
    }
}
