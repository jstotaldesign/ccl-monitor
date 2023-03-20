<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDynamicsNavOjbectIdRequest;
use App\Http\Requests\StoreDynamicsNavOjbectIdRequest;
use App\Http\Requests\UpdateDynamicsNavOjbectIdRequest;
use App\Models\DynamicsNavObjectType;
use App\Models\DynamicsNavOjbectId;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DynamicsNavOjbectIdController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('dynamics_nav_ojbect_id_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dynamicsNavOjbectIds = DynamicsNavOjbectId::with(['type'])->get();

        $dynamics_nav_object_types = DynamicsNavObjectType::get();

        return view('admin.dynamicsNavOjbectIds.index', compact('dynamicsNavOjbectIds', 'dynamics_nav_object_types'));
    }

    public function create()
    {
        abort_if(Gate::denies('dynamics_nav_ojbect_id_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $types = DynamicsNavObjectType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.dynamicsNavOjbectIds.create', compact('types'));
    }

    public function store(StoreDynamicsNavOjbectIdRequest $request)
    {
        $dynamicsNavOjbectId = DynamicsNavOjbectId::create($request->all());

        return redirect()->route('admin.dynamics-nav-ojbect-ids.index');
    }

    public function edit(DynamicsNavOjbectId $dynamicsNavOjbectId)
    {
        abort_if(Gate::denies('dynamics_nav_ojbect_id_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $types = DynamicsNavObjectType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dynamicsNavOjbectId->load('type');

        return view('admin.dynamicsNavOjbectIds.edit', compact('dynamicsNavOjbectId', 'types'));
    }

    public function update(UpdateDynamicsNavOjbectIdRequest $request, DynamicsNavOjbectId $dynamicsNavOjbectId)
    {
        $dynamicsNavOjbectId->update($request->all());

        return redirect()->route('admin.dynamics-nav-ojbect-ids.index');
    }

    public function show(DynamicsNavOjbectId $dynamicsNavOjbectId)
    {
        abort_if(Gate::denies('dynamics_nav_ojbect_id_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dynamicsNavOjbectId->load('type');

        return view('admin.dynamicsNavOjbectIds.show', compact('dynamicsNavOjbectId'));
    }

    public function destroy(DynamicsNavOjbectId $dynamicsNavOjbectId)
    {
        abort_if(Gate::denies('dynamics_nav_ojbect_id_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dynamicsNavOjbectId->delete();

        return back();
    }

    public function massDestroy(MassDestroyDynamicsNavOjbectIdRequest $request)
    {
        $dynamicsNavOjbectIds = DynamicsNavOjbectId::find(request('ids'));

        foreach ($dynamicsNavOjbectIds as $dynamicsNavOjbectId) {
            $dynamicsNavOjbectId->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
