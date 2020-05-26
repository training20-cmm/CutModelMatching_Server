<?php

namespace App\Http\Responses;

use App\User;

class UserResponse extends Response
{

    public $id;
    public $identifier;
    public $email;
    public $createdAt;
    public $updatedAt;

    public function __construct(User $user)
    {
        $this->id = $user->id;
        $this->identifier = $user->identifier;
        $this->email = $user->email;
        $this->createdAt = $user->created_at;
        $this->updatedAt = $user->updated_at;
    }
}
