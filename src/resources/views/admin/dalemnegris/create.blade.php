@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.dalem_negri.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.dalemnegris.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="jenis_beasiswa">{{ trans('cruds.dalem_negri.fields.jenis_beasiswa') }}</label>
                <input class="form-control {{ $errors->has('jenis_beasiswa') ? 'is-invalid' : '' }}" type="text" name="jenis_beasiswa" id="jenis_beasiswa" value="{{ old('jenis_beasiswa', '') }}">
                @if($errors->has('jenis_beasiswa'))
                    <div class="invalid-feedback">
                        {{ $errors->first('jenis_beasiswa') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dalem_negri.fields.jenis_beasiswa_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pengumuman">{{ trans('cruds.dalem_negri.fields.pengumuman') }}</label>
                <input class="form-control {{ $errors->has('pengumuman') ? 'is-invalid' : '' }}" type="text" name="pengumuman" id="pengumuman" value="{{ old('pengumuman', '') }}">
                @if($errors->has('pengumuman'))
                    <div class="invalid-feedback">
                        {{ $errors->first('pengumuman') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dalem_negri.fields.pengumuman_helper') }}</span>
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
    url: '{{ route('admin.dalemnegris.storeMedia') }}',
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