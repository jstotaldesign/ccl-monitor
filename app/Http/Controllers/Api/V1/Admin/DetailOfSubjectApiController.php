<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreDetailOfSubjectRequest;
use App\Http\Requests\UpdateDetailOfSubjectRequest;
use App\Http\Resources\Admin\DetailOfSubjectResource;
use App\Models\DetailOfSubject;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DetailOfSubjectApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('detail_of_subject_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DetailOfSubjectResource(DetailOfSubject::with(['subject'])->get());
    }

    public function store(StoreDetailOfSubjectRequest $request)
    {
        $detailOfSubject = DetailOfSubject::create($request->all());

        return (new DetailOfSubjectResource($detailOfSubject))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(DetailOfSubject $detailOfSubject)
    {
        abort_if(Gate::denies('detail_of_subject_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DetailOfSubjectResource($detailOfSubject->load(['subject']));
    }

    public function update(UpdateDetailOfSubjectRequest $request, DetailOfSubject $detailOfSubject)
    {
        $detailOfSubject->update($request->all());

        return (new DetailOfSubjectResource($detailOfSubject))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(DetailOfSubject $detailOfSubject)
    {
        abort_if(Gate::denies('detail_of_subject_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $detailOfSubject->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
