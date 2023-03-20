<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreResponsibilityRequest;
use App\Http\Requests\UpdateResponsibilityRequest;
use App\Http\Resources\Admin\ResponsibilityResource;
use App\Models\Responsibility;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ResponsibilityApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('responsibility_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ResponsibilityResource(Responsibility::all());
    }

    public function store(StoreResponsibilityRequest $request)
    {
        $responsibility = Responsibility::create($request->all());

        return (new ResponsibilityResource($responsibility))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Responsibility $responsibility)
    {
        abort_if(Gate::denies('responsibility_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ResponsibilityResource($responsibility);
    }

    public function update(UpdateResponsibilityRequest $request, Responsibility $responsibility)
    {
        $responsibility->update($request->all());

        return (new ResponsibilityResource($responsibility))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Responsibility $responsibility)
    {
        abort_if(Gate::denies('responsibility_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $responsibility->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
