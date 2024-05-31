<?php

namespace App\Http\Requests;

use App\Models\Dalemnegri;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyDalemnegriRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('dalem_negri_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:dalamnegris,id',
        ];
    }
}
