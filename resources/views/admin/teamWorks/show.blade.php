@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.teamWork.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.team-works.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.teamWork.fields.id') }}
                        </th>
                        <td>
                            {{ $teamWork->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.teamWork.fields.name') }}
                        </th>
                        <td>
                            {{ $teamWork->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.teamWork.fields.job') }}
                        </th>
                        <td>
                            {{ $teamWork->job }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.teamWork.fields.photo') }}
                        </th>
                        <td>
                            @if($teamWork->photo)
                                <a href="{{ $teamWork->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $teamWork->photo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.teamWork.fields.twitter') }}
                        </th>
                        <td>
                            {{ $teamWork->twitter }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.teamWork.fields.linkedin') }}
                        </th>
                        <td>
                            {{ $teamWork->linkedin }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.teamWork.fields.facebook') }}
                        </th>
                        <td>
                            {{ $teamWork->facebook }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.team-works.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection