<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomRequest extends FormRequest
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
            //
        ];
    }

    public function token(): string
    {
        return $this->header("Authorization");
    }

    public function hasQuery(): bool
    {
        return !empty($this->search) || !empty($this->sort) || !empty($this->embed) || !empty($this->fields);
    }
}
