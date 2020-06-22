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
        $this->typeId = $model->user->typeId;
        $this->name = $model->name;
        $this->bioText = $model->bioText;
        $this->gender = $model->gender;
        $this->birthday = $model->birthday;
        $this->userId = $model->userId;
        $this->deletedAt = $model->deletedAt;
        $this->createdAt = $model->created_at->toDateString();
        $this->updatedAt = $model->updated_at->toDateString();
    }
}
