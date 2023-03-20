<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRequesterRequest;
use App\Http\Requests\StoreRequesterRequest;
use App\Http\Requests\UpdateRequesterRequest;
use App\Models\Department;
use App\Models\Requester;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RequesterController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('requester_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $requesters = Requester::with(['department'])->get();

        $departments = Department::get();

        return view('admin.requesters.index', compact('departments', 'requesters'));
    }

    public function create()
    {
        abort_if(Gate::denies('requester_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $departments = Department::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.requesters.create', compact('departments'));
    }

    public function store(StoreRequesterRequest $request)
    {
        $requester = Requester::create($request->all());

        return redirect()->route('admin.requesters.index');
    }

    public function edit(Requester $requester)
    {
        abort_if(Gate::denies('requester_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $departments = Department::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $requester->load('department');

        return view('admin.requesters.edit', compact('departments', 'requester'));
    }

    public function update(UpdateRequesterRequest $request, Requester $requester)
    {
        $requester->update($request->all());

        return redirect()->route('admin.requesters.index');
    }

    public function show(Requester $requester)
    {
        abort_if(Gate::denies('requester_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $requester->load('department');

        return view('admin.requesters.show', compact('requester'));
    }

    public function destroy(Requester $requester)
    {
        abort_if(Gate::denies('requester_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $requester->delete();

        return back();
    }

    public function massDestroy(MassDestroyRequesterRequest $request)
    {
        $requesters = Requester::find(request('ids'));

        foreach ($requesters as $requester) {
            $requester->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
