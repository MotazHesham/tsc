<?php

namespace App\Http\Requests;

use App\Models\About;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAboutRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('about_edit');
    }

    public function rules()
    {
        return [
            'site_name' => [
                'string',
                'nullable',
            ],
            'phone' => [
                'string',
                'nullable',
            ],
            'phone_2' => [
                'string',
                'nullable',
            ],
            'how_do_we_work_video' => [
                'string',
                'nullable',
            ],
            'count_experience' => [
                'string',
                'nullable',
            ],
            'count_projects' => [
                'string',
                'nullable',
            ],
            'partners' => [
                'array',
            ],
        ];
    }
}
