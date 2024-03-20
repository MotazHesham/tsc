<?php

namespace App\Http\Requests;

use App\Models\Contract;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreContractRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('contract_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'contract_type' => [
                'required',
            ],
            'user_id' => [
                'required',
                'integer',
            ],
            'city' => [
                'string',
                'nullable',
            ],
            'start_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'end_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'mngr_name' => [
                'string',
                'required',
            ],
            'mngr_email' => [
                'string',
                'nullable',
            ],
            'mngr_phone' => [
                'string',
                'nullable',
            ],
        ];
    }
}
