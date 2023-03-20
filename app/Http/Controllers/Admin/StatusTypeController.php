<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyStatusTypeRequest;
use App\Http\Requests\StoreStatusTypeRequest;
use App\Http\Requests\UpdateStatusTypeRequest;
use App\Models\StatusType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StatusTypeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('status_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $statusTypes = StatusType::all();

        return view('admin.statusTypes.index', compact('statusTypes'));
    }

    public function create()
    {
        abort_if(Gate::denies('status_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.statusTypes.create');
    }

    public function store(StoreStatusTypeRequest $request)
    {
        $statusType = StatusType::create($request->all());

        return redirect()->route('admin.status-types.index');
    }

    public function edit(StatusType $statusType)
    {
        abort_if(Gate::denies('status_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.statusTypes.edit', compact('statusType'));
    }

    public function update(UpdateStatusTypeRequest $request, StatusType $statusType)
    {
        $statusType->update($request->all());

        return redirect()->route('admin.status-types.index');
    }

    public function show(StatusType $statusType)
    {
        abort_if(Gate::denies('status_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.statusTypes.show', compact('statusType'));
    }

    public function destroy(StatusType $statusType)
    {
        abort_if(Gate::denies('status_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $statusType->delete();

        return back();
    }

    public function massDestroy(MassDestroyStatusTypeRequest $request)
    {
        $statusTypes = StatusType::find(request('ids'));

        foreach ($statusTypes as $statusType) {
            $statusType->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
