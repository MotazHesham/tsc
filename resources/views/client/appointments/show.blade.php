@extends('layouts.client')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.appointment.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('client.appointments.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.appointment.fields.id') }}
                        </th>
                        <td>
                            {{ $appointment->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.appointment.fields.date') }}
                        </th>
                        <td>
                            {{ $appointment->date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.appointment.fields.time') }}
                        </th>
                        <td>
                            {{ $appointment->time }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.appointment.fields.title') }}
                        </th>
                        <td>
                            {{ $appointment->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.appointment.fields.notes') }}
                        </th>
                        <td>
                            {{ $appointment->notes }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.appointment.fields.contract') }}
                        </th>
                        <td>
                            {{ $appointment->contract->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.appointment.fields.user') }}
                        </th>
                        <td>
                            {{ $appointment->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.appointment.fields.finish_code') }}
                        </th>
                        <td>
                            {{ $appointment->finish_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.appointment.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\Appointment::STATUS_SELECT[$appointment->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.appointment.fields.reject_reason') }}
                        </th>
                        <td>
                            {{ $appointment->reject_reason }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('client.appointments.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection