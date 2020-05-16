<?php

namespace App\Http\Requests;

use App\Domain\HairdresserIdentifier;
use App\Domain\HairdresserPassword;
use App\Hairdresser;
use Illuminate\Foundation\Http\FormRequest;

class HairdresserRegistrationRequest extends FormRequest
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
            "name" => ["required", "string", "max:" . Hairdresser::NAME_MAX_LENGTH],
            "identifier" => ["required", "string", "unique:hairdressers", "max:" . Hairdresser::IDENTIFIER_MAX_LENGTH],
            "password" => ["confirmed", "required", "string", "min:" . Hairdresser::PASSWORD_MIN_LENGTH, "max:" . Hairdresser::PASSWORD_MAX_LENGTH]
        ];
    }
}
