<?php

namespace App\Http\Requests;

use App\Model;
use Illuminate\Foundation\Http\FormRequest;

class ModelRegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "identifier" => ["required", "string", "max:" . Model::IDENTIFIER_MAX_LENGTH],
            'name' => ['required', 'string', 'max:' . Model::NAME_MAX_LENGTH],
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:models'],
            'password' => ['required', 'string', 'confirmed', "min:" . Model::PASSWORD_MIN_LENGTH, "max:" . Model::PASSWORD_MAX_LENGTH],
        ];
    }
}
