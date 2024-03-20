@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.requestService.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.request-services.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="service_id">{{ trans('cruds.requestService.fields.service') }}</label>
                <select class="form-control select2 {{ $errors->has('service') ? 'is-invalid' : '' }}" name="service_id" id="service_id" required>
                    @foreach($services as $id => $entry)
                        <option value="{{ $id }}" {{ old('service_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('service'))
                    <div class="invalid-feedback">
                        {{ $errors->first('service') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.requestService.fields.service_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.requestService.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.requestService.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="message">{{ trans('cruds.requestService.fields.message') }}</label>
                <textarea class="form-control {{ $errors->has('message') ? 'is-invalid' : '' }}" name="message" id="message" required>{{ old('message') }}</textarea>
                @if($errors->has('message'))
                    <div class="invalid-feedback">
                        {{ $errors->first('message') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.requestService.fields.message_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="visiting_form">{{ trans('cruds.requestService.fields.visiting_form') }}</label>
                <div class="needsclick dropzone {{ $errors->has('visiting_form') ? 'is-invalid' : '' }}" id="visiting_form-dropzone">
                </div>
                @if($errors->has('visiting_form'))
                    <div class="invalid-feedback">
                        {{ $errors->first('visiting_form') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.requestService.fields.visiting_form_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="offer_price_file">{{ trans('cruds.requestService.fields.offer_price_file') }}</label>
                <div class="needsclick dropzone {{ $errors->has('offer_price_file') ? 'is-invalid' : '' }}" id="offer_price_file-dropzone">
                </div>
                @if($errors->has('offer_price_file'))
                    <div class="invalid-feedback">
                        {{ $errors->first('offer_price_file') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.requestService.fields.offer_price_file_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="offer_price">{{ trans('cruds.requestService.fields.offer_price') }}</label>
                <input class="form-control {{ $errors->has('offer_price') ? 'is-invalid' : '' }}" type="number" name="offer_price" id="offer_price" value="{{ old('offer_price', '') }}" step="0.01">
                @if($errors->has('offer_price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('offer_price') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.requestService.fields.offer_price_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.requestService.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\RequestService::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', 'pending') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.requestService.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="edits">{{ trans('cruds.requestService.fields.edits') }}</label>
                <textarea class="form-control {{ $errors->has('edits') ? 'is-invalid' : '' }}" name="edits" id="edits">{{ old('edits') }}</textarea>
                @if($errors->has('edits'))
                    <div class="invalid-feedback">
                        {{ $errors->first('edits') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.requestService.fields.edits_helper') }}</span>
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
    Dropzone.options.visitingFormDropzone = {
    url: '{{ route('admin.request-services.storeMedia') }}',
    maxFilesize: 4, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 4
    },
    success: function (file, response) {
      $('form').find('input[name="visiting_form"]').remove()
      $('form').append('<input type="hidden" name="visiting_form" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="visiting_form"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($requestService) && $requestService->visiting_form)
      var file = {!! json_encode($requestService->visiting_form) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="visiting_form" value="' + file.file_name + '">')
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
    Dropzone.options.offerPriceFileDropzone = {
    url: '{{ route('admin.request-services.storeMedia') }}',
    maxFilesize: 4, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 4
    },
    success: function (file, response) {
      $('form').find('input[name="offer_price_file"]').remove()
      $('form').append('<input type="hidden" name="offer_price_file" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="offer_price_file"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($requestService) && $requestService->offer_price_file)
      var file = {!! json_encode($requestService->offer_price_file) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="offer_price_file" value="' + file.file_name + '">')
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
@endsection