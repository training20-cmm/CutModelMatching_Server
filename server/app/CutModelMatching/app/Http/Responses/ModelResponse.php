<?php

namespace App\Http\Responses;

use App\Model;

class ModelResponse extends Response
{

    public $identifier;
    public $password;
    public $email;
    public $typeId;
    public $name;
    public $bioText;
    public $gender;
    public $birthday;
    public $userId;
    public $deletedAt;
    public $createdAt;
    public $updatedAt;

    public function constructWith(Model $model)
    {
        $this->identifier = $model->user->identifier;
        $this->password = $model->user->password;
        $this->email = $model->user->email;
        $this->typeId = $model->user->type_id;
        $this->name = $model->name;
        $this->bioText = $model->bio_text;
        $this->gender = $model->gender;
        $this->birthday = $model->birthday;
        $this->userId = $model->user_id;
        $this->deletedAt = $model->deleted_at->toDateString();
        $this->createdAt = $model->created_at->toDateString();
        $this->updatedAt = $model->updated_at->toDateString();
    }
}
