<?php

namespace App\Http\Requests;

use App\Models\Technical;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTechnicalRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('technical_edit');
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
                'unique:users,email,' . request()->user_id,
            ],
            'phone_number' => [
                'string',
                'required',
            ],
        ];
    }
}
