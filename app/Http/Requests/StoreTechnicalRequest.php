<?php

namespace App\Http\Requests;

use App\Models\Technical;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTechnicalRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('technical_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'email' => [
                'required',
                'unique:users',
            ],
            'password' => [
                'required',
            ],
            'phone_number' => [
                'string',
                'required',
            ],
        ];
    }
}
