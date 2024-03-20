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
            'user_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
