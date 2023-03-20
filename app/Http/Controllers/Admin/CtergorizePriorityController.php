<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCtergorizePriorityRequest;
use App\Http\Requests\StoreCtergorizePriorityRequest;
use App\Http\Requests\UpdateCtergorizePriorityRequest;
use App\Models\CtergorizePriority;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CtergorizePriorityController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('ctergorize_priority_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ctergorizePriorities = CtergorizePriority::all();

        return view('admin.ctergorizePriorities.index', compact('ctergorizePriorities'));
    }

    public function create()
    {
        abort_if(Gate::denies('ctergorize_priority_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.ctergorizePriorities.create');
    }

    public function store(StoreCtergorizePriorityRequest $request)
    {
        $ctergorizePriority = CtergorizePriority::create($request->all());

        return redirect()->route('admin.ctergorize-priorities.index');
    }

    public function edit(CtergorizePriority $ctergorizePriority)
    {
        abort_if(Gate::denies('ctergorize_priority_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.ctergorizePriorities.edit', compact('ctergorizePriority'));
    }

    public function update(UpdateCtergorizePriorityRequest $request, CtergorizePriority $ctergorizePriority)
    {
        $ctergorizePriority->update($request->all());

        return redirect()->route('admin.ctergorize-priorities.index');
    }

    public function show(CtergorizePriority $ctergorizePriority)
    {
        abort_if(Gate::denies('ctergorize_priority_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.ctergorizePriorities.show', compact('ctergorizePriority'));
    }

    public function destroy(CtergorizePriority $ctergorizePriority)
    {
        abort_if(Gate::denies('ctergorize_priority_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ctergorizePriority->delete();

        return back();
    }

    public function massDestroy(MassDestroyCtergorizePriorityRequest $request)
    {
        $ctergorizePriorities = CtergorizePriority::find(request('ids'));

        foreach ($ctergorizePriorities as $ctergorizePriority) {
            $ctergorizePriority->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
