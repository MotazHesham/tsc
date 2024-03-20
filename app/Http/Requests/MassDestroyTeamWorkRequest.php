<?php

namespace App\Http\Requests;

use App\Models\TeamWork;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTeamWorkRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('team_work_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:team_works,id',
        ];
    }
}
