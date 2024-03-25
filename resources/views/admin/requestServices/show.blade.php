@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.requestService.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.request-services.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.requestService.fields.id') }}
                        </th>
                        <td>
                            {{ $requestService->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.requestService.fields.service') }}
                        </th>
                        <td>
                            {{ $requestService->service->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.requestService.fields.user') }}
                        </th>
                        <td>
                            {{ $requestService->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.requestService.fields.message') }}
                        </th>
                        <td>
                            {{ $requestService->message }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.requestService.fields.place') }}
                        </th>
                        <td>
                            {{ $requestService->place }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.requestService.fields.visiting_form') }}
                        </th>
                        <td>
                            @if($requestService->visiting_form)
                                <a href="{{ $requestService->visiting_form->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.requestService.fields.offer_price_file') }}
                        </th>
                        <td>
                            @if($requestService->offer_price_file)
                                <a href="{{ $requestService->offer_price_file->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.requestService.fields.offer_price') }}
                        </th>
                        <td>
                            {{ $requestService->offer_price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.requestService.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\RequestService::STATUS_SELECT[$requestService->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.requestService.fields.edits') }}
                        </th>
                        <td>
                            {{ $requestService->edits }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.request-services.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection