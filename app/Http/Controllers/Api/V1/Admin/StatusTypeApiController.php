<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStatusTypeRequest;
use App\Http\Requests\UpdateStatusTypeRequest;
use App\Http\Resources\Admin\StatusTypeResource;
use App\Models\StatusType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StatusTypeApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('status_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StatusTypeResource(StatusType::all());
    }

    public function store(StoreStatusTypeRequest $request)
    {
        $statusType = StatusType::create($request->all());

        return (new StatusTypeResource($statusType))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(StatusType $statusType)
    {
        abort_if(Gate::denies('status_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StatusTypeResource($statusType);
    }

    public function update(UpdateStatusTypeRequest $request, StatusType $statusType)
    {
        $statusType->update($request->all());

        return (new StatusTypeResource($statusType))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(StatusType $statusType)
    {
        abort_if(Gate::denies('status_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $statusType->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
