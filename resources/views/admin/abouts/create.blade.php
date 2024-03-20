@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.about.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.abouts.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="site_name">{{ trans('cruds.about.fields.site_name') }}</label>
                <input class="form-control {{ $errors->has('site_name') ? 'is-invalid' : '' }}" type="text" name="site_name" id="site_name" value="{{ old('site_name', '') }}">
                @if($errors->has('site_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('site_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.about.fields.site_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email">{{ trans('cruds.about.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email') }}">
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.about.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="phone">{{ trans('cruds.about.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', '') }}">
                @if($errors->has('phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.about.fields.phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="phone_2">{{ trans('cruds.about.fields.phone_2') }}</label>
                <input class="form-control {{ $errors->has('phone_2') ? 'is-invalid' : '' }}" type="text" name="phone_2" id="phone_2" value="{{ old('phone_2', '') }}">
                @if($errors->has('phone_2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone_2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.about.fields.phone_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address">{{ trans('cruds.about.fields.address') }}</label>
                <textarea class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" name="address" id="address">{{ old('address') }}</textarea>
                @if($errors->has('address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.about.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="logo">{{ trans('cruds.about.fields.logo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('logo') ? 'is-invalid' : '' }}" id="logo-dropzone">
                </div>
                @if($errors->has('logo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('logo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.about.fields.logo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.about.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{{ old('description') }}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.about.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="footer_description">{{ trans('cruds.about.fields.footer_description') }}</label>
                <textarea class="form-control {{ $errors->has('footer_description') ? 'is-invalid' : '' }}" name="footer_description" id="footer_description">{{ old('footer_description') }}</textarea>
                @if($errors->has('footer_description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('footer_description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.about.fields.footer_description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="how_do_we_work_video">{{ trans('cruds.about.fields.how_do_we_work_video') }}</label>
                <input class="form-control {{ $errors->has('how_do_we_work_video') ? 'is-invalid' : '' }}" type="text" name="how_do_we_work_video" id="how_do_we_work_video" value="{{ old('how_do_we_work_video', '') }}">
                @if($errors->has('how_do_we_work_video'))
                    <div class="invalid-feedback">
                        {{ $errors->first('how_do_we_work_video') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.about.fields.how_do_we_work_video_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="count_experience">{{ trans('cruds.about.fields.count_experience') }}</label>
                <input class="form-control {{ $errors->has('count_experience') ? 'is-invalid' : '' }}" type="text" name="count_experience" id="count_experience" value="{{ old('count_experience', '') }}">
                @if($errors->has('count_experience'))
                    <div class="invalid-feedback">
                        {{ $errors->first('count_experience') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.about.fields.count_experience_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="count_projects">{{ trans('cruds.about.fields.count_projects') }}</label>
                <input class="form-control {{ $errors->has('count_projects') ? 'is-invalid' : '' }}" type="text" name="count_projects" id="count_projects" value="{{ old('count_projects', '') }}">
                @if($errors->has('count_projects'))
                    <div class="invalid-feedback">
                        {{ $errors->first('count_projects') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.about.fields.count_projects_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="partners">{{ trans('cruds.about.fields.partners') }}</label>
                <div class="needsclick dropzone {{ $errors->has('partners') ? 'is-invalid' : '' }}" id="partners-dropzone">
                </div>
                @if($errors->has('partners'))
                    <div class="invalid-feedback">
                        {{ $errors->first('partners') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.about.fields.partners_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')
<script>
    Dropzone.options.logoDropzone = {
    url: '{{ route('admin.abouts.storeMedia') }}',
    maxFilesize: 4, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 4,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="logo"]').remove()
      $('form').append('<input type="hidden" name="logo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="logo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($about) && $about->logo)
      var file = {!! json_encode($about->logo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="logo" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}

</script>
<script>
    var uploadedPartnersMap = {}
Dropzone.options.partnersDropzone = {
    url: '{{ route('admin.abouts.storeMedia') }}',
    maxFilesize: 4, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 4,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="partners[]" value="' + response.name + '">')
      uploadedPartnersMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedPartnersMap[file.name]
      }
      $('form').find('input[name="partners[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($about) && $about->partners)
      var files = {!! json_encode($about->partners) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="partners[]" value="' + file.file_name + '">')
        }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}

</script>
@endsection