<?php

namespace App\Http\Requests;

use App\Models\Technical;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTechnicalRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('technical_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:technicals,id',
        ];
    }
}
