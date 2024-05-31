@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.List_Beasiswa.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.products.store") }}" enctype="multipart/form-data">
            @csrf
            {{-- <div class="form-group">
                <label for="image">{{ trans('cruds.List_Beasiswa.fields.image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('image') ? 'is-invalid' : '' }}" id="image-dropzone">
                </div>
                @if($errors->has('image'))
                    <div class="invalid-feedback">
                        {{ $errors->first('image') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.List_Beasiswa.fields.image_helper') }}</span>
            </div> --}}
            <div class="form-group">
                <label for="nama_mahasiswa">{{ trans('cruds.List_Beasiswa.fields.nama_beasiswa') }}</label>
                <input class="form-control {{ $errors->has('nama_mahasiswa') ? 'is-invalid' : '' }}" type="text" name="nama_mahasiswa" id="nama_mahasiswa" value="{{ old('nama_mahasiswa', '') }}">
                @if($errors->has('nama_mahasiswa'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nama_mahasiswa') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.List_Beasiswa.fields.nama_beasiswa_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nis">{{ trans('cruds.List_Beasiswa.fields.nis') }}</label>
                <input class="form-control {{ $errors->has('nis') ? 'is-invalid' : '' }}" type="number" name="nis" id="nis" value="{{ old('nis', '') }}">
                @if($errors->has('nis'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nis') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.List_Beasiswa.fields.nis_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nomor_telfon">{{ trans('cruds.List_Beasiswa.fields.nomor_telfon') }}</label>
                <input class="form-control {{ $errors->has('nomor_telfon') ? 'is-invalid' : '' }}" type="number" name="nomor_telfon" id="nomor_telfon" value="{{ old('nomor_telfon', '') }}">
                @if($errors->has('nomor_telfon'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nomor_telfon') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.List_Beasiswa.fields.nomor_telfon_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email">{{ trans('cruds.List_Beasiswa.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', '') }}" step="1">
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.List_Beasiswa.fields.email_helper') }}</span>
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

{{-- @section('scripts')
<script>
    Dropzone.options.imageDropzone = {
    url: '{{ route('admin.products.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="image"]').remove()
      $('form').append('<input type="hidden" name="image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($product) && $product->image)
      var file = {!! json_encode($product->image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="image" value="' + file.file_name + '">')
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
@endsection --}}