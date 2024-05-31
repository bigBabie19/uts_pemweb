<?php

namespace App\Http\Requests;

use App\Models\Luar;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyLuarRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('luar_negri_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:luars,id',
        ];
    }
}