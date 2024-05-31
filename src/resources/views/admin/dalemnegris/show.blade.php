@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.List_Beasiswa.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.dalemnegris.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.List_Beasiswa.fields.id') }}
                        </th>
                        <td>
                            {{ $dalem->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.List_Beasiswa.fields.image') }}
                        </th>
                        <td>
                            @if($dalem->image)
                                <a href="{{ $dalem->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $dalem->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.List_Beasiswa.fields.name') }}
                        </th>
                        <td>
                            {{ $dalem->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.List_Beasiswa.fields.description') }}
                        </th>
                        <td>
                            {{ $dalem->description }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.dalemnegris.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection