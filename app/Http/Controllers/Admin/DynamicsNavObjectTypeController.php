<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDynamicsNavObjectTypeRequest;
use App\Http\Requests\StoreDynamicsNavObjectTypeRequest;
use App\Http\Requests\UpdateDynamicsNavObjectTypeRequest;
use App\Models\DynamicsNavObjectType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DynamicsNavObjectTypeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('dynamics_nav_object_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dynamicsNavObjectTypes = DynamicsNavObjectType::all();

        return view('admin.dynamicsNavObjectTypes.index', compact('dynamicsNavObjectTypes'));
    }

    public function create()
    {
        abort_if(Gate::denies('dynamics_nav_object_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.dynamicsNavObjectTypes.create');
    }

    public function store(StoreDynamicsNavObjectTypeRequest $request)
    {
        $dynamicsNavObjectType = DynamicsNavObjectType::create($request->all());

        return redirect()->route('admin.dynamics-nav-object-types.index');
    }

    public function edit(DynamicsNavObjectType $dynamicsNavObjectType)
    {
        abort_if(Gate::denies('dynamics_nav_object_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.dynamicsNavObjectTypes.edit', compact('dynamicsNavObjectType'));
    }

    public function update(UpdateDynamicsNavObjectTypeRequest $request, DynamicsNavObjectType $dynamicsNavObjectType)
    {
        $dynamicsNavObjectType->update($request->all());

        return redirect()->route('admin.dynamics-nav-object-types.index');
    }

    public function show(DynamicsNavObjectType $dynamicsNavObjectType)
    {
        abort_if(Gate::denies('dynamics_nav_object_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.dynamicsNavObjectTypes.show', compact('dynamicsNavObjectType'));
    }

    public function destroy(DynamicsNavObjectType $dynamicsNavObjectType)
    {
        abort_if(Gate::denies('dynamics_nav_object_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dynamicsNavObjectType->delete();

        return back();
    }

    public function massDestroy(MassDestroyDynamicsNavObjectTypeRequest $request)
    {
        $dynamicsNavObjectTypes = DynamicsNavObjectType::find(request('ids'));

        foreach ($dynamicsNavObjectTypes as $dynamicsNavObjectType) {
            $dynamicsNavObjectType->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
