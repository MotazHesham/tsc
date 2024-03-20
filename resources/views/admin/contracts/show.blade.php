@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.contract.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.contracts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.contract.fields.id') }}
                        </th>
                        <td>
                            {{ $contract->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contract.fields.name') }}
                        </th>
                        <td>
                            {{ $contract->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contract.fields.contract_type') }}
                        </th>
                        <td>
                            {{ App\Models\Contract::CONTRACT_TYPE_SELECT[$contract->contract_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contract.fields.user') }}
                        </th>
                        <td>
                            {{ $contract->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contract.fields.request_service') }}
                        </th>
                        <td>
                            {{ $contract->request_service->status ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contract.fields.city') }}
                        </th>
                        <td>
                            {{ $contract->city }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contract.fields.address') }}
                        </th>
                        <td>
                            {{ $contract->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contract.fields.contract_value') }}
                        </th>
                        <td>
                            {{ $contract->contract_value }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contract.fields.start_date') }}
                        </th>
                        <td>
                            {{ $contract->start_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contract.fields.end_date') }}
                        </th>
                        <td>
                            {{ $contract->end_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contract.fields.mngr_name') }}
                        </th>
                        <td>
                            {{ $contract->mngr_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contract.fields.mngr_email') }}
                        </th>
                        <td>
                            {{ $contract->mngr_email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contract.fields.mngr_phone') }}
                        </th>
                        <td>
                            {{ $contract->mngr_phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contract.fields.contract') }}
                        </th>
                        <td>
                            @if($contract->contract)
                                <a href="{{ $contract->contract->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.contracts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#contract_appointments" role="tab" data-toggle="tab">
                {{ trans('cruds.appointment.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="contract_appointments">
            @includeIf('admin.contracts.relationships.contractAppointments', ['appointments' => $contract->contractAppointments])
        </div>
    </div>
</div>

@endsection