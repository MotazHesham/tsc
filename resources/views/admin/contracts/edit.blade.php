@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.contract.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.contracts.update", [$contract->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.contract.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $contract->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.contract.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.contract.fields.contract_type') }}</label>
                <select class="form-control {{ $errors->has('contract_type') ? 'is-invalid' : '' }}" name="contract_type" id="contract_type" required>
                    <option value disabled {{ old('contract_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Contract::CONTRACT_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('contract_type', $contract->contract_type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('contract_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('contract_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.contract.fields.contract_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.contract.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $contract->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.contract.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="request_service_id">{{ trans('cruds.contract.fields.request_service') }}</label>
                <select class="form-control select2 {{ $errors->has('request_service') ? 'is-invalid' : '' }}" name="request_service_id" id="request_service_id">
                    @foreach($request_services as $id => $entry)
                        <option value="{{ $id }}" {{ (old('request_service_id') ? old('request_service_id') : $contract->request_service->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('request_service'))
                    <div class="invalid-feedback">
                        {{ $errors->first('request_service') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.contract.fields.request_service_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="city">{{ trans('cruds.contract.fields.city') }}</label>
                <input class="form-control {{ $errors->has('city') ? 'is-invalid' : '' }}" type="text" name="city" id="city" value="{{ old('city', $contract->city) }}">
                @if($errors->has('city'))
                    <div class="invalid-feedback">
                        {{ $errors->first('city') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.contract.fields.city_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address">{{ trans('cruds.contract.fields.address') }}</label>
                <textarea class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" name="address" id="address">{{ old('address', $contract->address) }}</textarea>
                @if($errors->has('address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.contract.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="contract_value">{{ trans('cruds.contract.fields.contract_value') }}</label>
                <input class="form-control {{ $errors->has('contract_value') ? 'is-invalid' : '' }}" type="number" name="contract_value" id="contract_value" value="{{ old('contract_value', $contract->contract_value) }}" step="0.01">
                @if($errors->has('contract_value'))
                    <div class="invalid-feedback">
                        {{ $errors->first('contract_value') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.contract.fields.contract_value_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="start_date">{{ trans('cruds.contract.fields.start_date') }}</label>
                <input class="form-control date {{ $errors->has('start_date') ? 'is-invalid' : '' }}" type="text" name="start_date" id="start_date" value="{{ old('start_date', $contract->start_date) }}" required>
                @if($errors->has('start_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('start_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.contract.fields.start_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="end_date">{{ trans('cruds.contract.fields.end_date') }}</label>
                <input class="form-control date {{ $errors->has('end_date') ? 'is-invalid' : '' }}" type="text" name="end_date" id="end_date" value="{{ old('end_date', $contract->end_date) }}" required>
                @if($errors->has('end_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('end_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.contract.fields.end_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="mngr_name">{{ trans('cruds.contract.fields.mngr_name') }}</label>
                <input class="form-control {{ $errors->has('mngr_name') ? 'is-invalid' : '' }}" type="text" name="mngr_name" id="mngr_name" value="{{ old('mngr_name', $contract->mngr_name) }}" required>
                @if($errors->has('mngr_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mngr_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.contract.fields.mngr_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mngr_email">{{ trans('cruds.contract.fields.mngr_email') }}</label>
                <input class="form-control {{ $errors->has('mngr_email') ? 'is-invalid' : '' }}" type="text" name="mngr_email" id="mngr_email" value="{{ old('mngr_email', $contract->mngr_email) }}">
                @if($errors->has('mngr_email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mngr_email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.contract.fields.mngr_email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mngr_phone">{{ trans('cruds.contract.fields.mngr_phone') }}</label>
                <input class="form-control {{ $errors->has('mngr_phone') ? 'is-invalid' : '' }}" type="text" name="mngr_phone" id="mngr_phone" value="{{ old('mngr_phone', $contract->mngr_phone) }}">
                @if($errors->has('mngr_phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mngr_phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.contract.fields.mngr_phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="contract">{{ trans('cruds.contract.fields.contract') }}</label>
                <div class="needsclick dropzone {{ $errors->has('contract') ? 'is-invalid' : '' }}" id="contract-dropzone">
                </div>
                @if($errors->has('contract'))
                    <div class="invalid-feedback">
                        {{ $errors->first('contract') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.contract.fields.contract_helper') }}</span>
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
    Dropzone.options.contractDropzone = {
    url: '{{ route('admin.contracts.storeMedia') }}',
    maxFilesize: 5, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 5
    },
    success: function (file, response) {
      $('form').find('input[name="contract"]').remove()
      $('form').append('<input type="hidden" name="contract" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="contract"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($contract) && $contract->contract)
      var file = {!! json_encode($contract->contract) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="contract" value="' + file.file_name + '">')
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