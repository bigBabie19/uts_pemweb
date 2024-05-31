<?php

namespace App\Http\Controllers\Admin;

use Gate;
use App\Models\Dalemnegri;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDalemnegriRequest;
use App\Http\Requests\UpdateDalemnegriRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\MassDestroyDalemnegriRequest;
use App\Http\Controllers\Traits\MediaUploadingTrait;


class DalemnegriController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('dalem_negri_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dalem = Dalemnegri::with(['media'])->get();

        return view('admin.dalemnegris.index', compact('dalem'));
    }

    public function create()
    {
        abort_if(Gate::denies('dalem_negri_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.dalemnegris.create');
    }

    public function store(StoreDalemnegriRequest $request)
    {
        $dalem = Dalemnegri::create($request->all());

        return redirect()->route('admin.dalemnegris.index');
    }

    public function edit(Dalemnegri $dalem)
    {
        abort_if(Gate::denies('dalem_negri_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.dalemnegris.edit', compact('dalem'));
    }

    public function update(UpdateDalemnegriRequest $request, Dalemnegri $dalem)
    {
        $dalem->update($request->all());

        return redirect()->route('admin.dalemnegris.index');
    }

    public function show(Dalemnegri $dalem)
    {
        abort_if(Gate::denies('dalem_negri_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.dalemnegris.show', compact('dalem'));
    }

    public function destroy(Dalemnegri $dalem)
    {
        abort_if(Gate::denies('dalem_negri_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dalem->delete();

        return back();
    }

    public function massDestroy(MassDestroyDalemnegriRequest $request)
    {
        $dalem = Dalemnegri::find(request('ids'));

        foreach ($dalem as $dalem) {
            $dalem->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

}
