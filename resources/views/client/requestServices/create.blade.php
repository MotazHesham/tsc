@extends('layouts.client')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.requestService.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('client.request-services.store') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                <input type="hidden" name="status" value="pending">
                <div class="form-group">
                    <label class="required" for="service_id">{{ trans('cruds.requestService.fields.service') }}</label>
                    <select class="form-control select2 {{ $errors->has('service') ? 'is-invalid' : '' }}" name="service_id"
                        id="service_id" required>
                        @foreach ($services as $id => $entry)
                            <option value="{{ $id }}" {{ old('service_id') == $id ? 'selected' : '' }}>
                                {{ $entry }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('service'))
                        <div class="invalid-feedback">
                            {{ $errors->first('service') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.requestService.fields.service_helper') }}</span>
                </div> 
                <div class="form-group">
                    <label class="required" for="message">{{ trans('cruds.requestService.fields.message') }}</label>
                    <textarea class="form-control {{ $errors->has('message') ? 'is-invalid' : '' }}" name="message" id="message"
                        required>{{ old('message') }}</textarea>
                    @if ($errors->has('message'))
                        <div class="invalid-feedback">
                            {{ $errors->first('message') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.requestService.fields.message_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="place">{{ trans('cruds.requestService.fields.place') }}</label>
                    <textarea class="form-control {{ $errors->has('place') ? 'is-invalid' : '' }}" name="place" id="place"
                        required>{{ old('place') }}</textarea>
                    @if ($errors->has('place'))
                        <div class="invalid-feedback">
                            {{ $errors->first('place') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.requestService.fields.place_helper') }}</span>
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
            url: '{{ route('client.request-services.storeMedia') }}',
            maxFilesize: 4, // MB
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 4
            },
            success: function(file, response) {
                $('form').find('input[name="visiting_form"]').remove()
                $('form').append('<input type="hidden" name="visiting_form" value="' + response.name + '">')
            },
            removedfile: function(file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="visiting_form"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function() {
                @if (isset($requestService) && $requestService->visiting_form)
                    var file = {!! json_encode($requestService->visiting_form) !!}
                    this.options.addedfile.call(this, file)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="visiting_form" value="' + file.file_name + '">')
                    this.options.maxFiles = this.options.maxFiles - 1
                @endif
            },
            error: function(file, response) {
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
            url: '{{ route('client.request-services.storeMedia') }}',
            maxFilesize: 4, // MB
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 4
            },
            success: function(file, response) {
                $('form').find('input[name="offer_price_file"]').remove()
                $('form').append('<input type="hidden" name="offer_price_file" value="' + response.name + '">')
            },
            removedfile: function(file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="offer_price_file"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function() {
                @if (isset($requestService) && $requestService->offer_price_file)
                    var file = {!! json_encode($requestService->offer_price_file) !!}
                    this.options.addedfile.call(this, file)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="offer_price_file" value="' + file.file_name + '">')
                    this.options.maxFiles = this.options.maxFiles - 1
                @endif
            },
            error: function(file, response) {
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
