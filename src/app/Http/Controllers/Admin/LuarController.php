<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\MassDestroyLuarRequest;
use App\Http\Requests\StoreLuarRequest;
use App\Http\Requests\UpdateLuarRequest;
use App\Models\Luar;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LuarController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('luar_negri_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $luarnegri = Luar::all();

        return view('admin.luars.index', compact('luarnegri'));
    }

    public function create()
    {
        abort_if(Gate::denies('luar_negri_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.luars.create');
    }

    public function store(StoreLuarRequest $request)
    {
        $luarnegri = Luar::create($request->all());

        return redirect()->route('admin.luars.index');
    }

    public function edit(Luar $luarnegri)
    {
        abort_if(Gate::denies('luar_negri_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.luars.edit', compact('luare$luarnegri'));
    }

    public function update(UpdateLuarRequest $request, Luar $luarnegri)
    {
        $luarnegri->update($request->all());

        return redirect()->route('admin.luars.index');
    }

    public function show(Luar $luarnegri)
    {
        abort_if(Gate::denies('luar_negri_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.luars.show', compact('luare$luarnegri'));
    }

    public function destroy(Luar $luarnegri)
    {
        abort_if(Gate::denies('luar_negri_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $luarnegri->delete();

        return back();
    }

    public function massDestroy(MassDestroyLuarRequest $request)
    {
        $luarnegri = Luar::find(request('ids'));

        foreach ($luarnegri as $luarnegri) {
            $luarnegri->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
