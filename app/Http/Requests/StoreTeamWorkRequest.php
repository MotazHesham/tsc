<?php

namespace App\Http\Requests;

use App\Models\TeamWork;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTeamWorkRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('team_work_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'job' => [
                'string',
                'required',
            ],
            'twitter' => [
                'string',
                'nullable',
            ],
            'linkedin' => [
                'string',
                'nullable',
            ],
            'facebook' => [
                'string',
                'nullable',
            ],
        ];
    }
}
