@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.about.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.abouts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.about.fields.id') }}
                        </th>
                        <td>
                            {{ $about->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.about.fields.site_name') }}
                        </th>
                        <td>
                            {{ $about->site_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.about.fields.email') }}
                        </th>
                        <td>
                            {{ $about->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.about.fields.phone') }}
                        </th>
                        <td>
                            {{ $about->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.about.fields.phone_2') }}
                        </th>
                        <td>
                            {{ $about->phone_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.about.fields.address') }}
                        </th>
                        <td>
                            {{ $about->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.about.fields.logo') }}
                        </th>
                        <td>
                            @if($about->logo)
                                <a href="{{ $about->logo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $about->logo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.about.fields.description') }}
                        </th>
                        <td>
                            {{ $about->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.about.fields.footer_description') }}
                        </th>
                        <td>
                            {{ $about->footer_description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.about.fields.how_do_we_work_video') }}
                        </th>
                        <td>
                            {{ $about->how_do_we_work_video }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.about.fields.count_experience') }}
                        </th>
                        <td>
                            {{ $about->count_experience }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.about.fields.count_projects') }}
                        </th>
                        <td>
                            {{ $about->count_projects }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.about.fields.partners') }}
                        </th>
                        <td>
                            @foreach($about->partners as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.abouts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection