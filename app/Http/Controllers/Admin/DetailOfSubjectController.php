<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyDetailOfSubjectRequest;
use App\Http\Requests\StoreDetailOfSubjectRequest;
use App\Http\Requests\UpdateDetailOfSubjectRequest;
use App\Models\DetailOfSubject;
use App\Models\Issue;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class DetailOfSubjectController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('detail_of_subject_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $detailOfSubjects = DetailOfSubject::with(['subject'])->get();

        $issues = Issue::get();

        return view('admin.detailOfSubjects.index', compact('detailOfSubjects', 'issues'));
    }

    public function create()
    {
        abort_if(Gate::denies('detail_of_subject_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subjects = Issue::pluck('nuber_excel', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.detailOfSubjects.create', compact('subjects'));
    }

    public function store(StoreDetailOfSubjectRequest $request)
    {
        $detailOfSubject = DetailOfSubject::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $detailOfSubject->id]);
        }

        return redirect()->route('admin.detail-of-subjects.index');
    }

    public function edit(DetailOfSubject $detailOfSubject)
    {
        abort_if(Gate::denies('detail_of_subject_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subjects = Issue::pluck('nuber_excel', 'id')->prepend(trans('global.pleaseSelect'), '');

        $detailOfSubject->load('subject');

        return view('admin.detailOfSubjects.edit', compact('detailOfSubject', 'subjects'));
    }

    public function update(UpdateDetailOfSubjectRequest $request, DetailOfSubject $detailOfSubject)
    {
        $detailOfSubject->update($request->all());

        return redirect()->route('admin.detail-of-subjects.index');
    }

    public function show(DetailOfSubject $detailOfSubject)
    {
        abort_if(Gate::denies('detail_of_subject_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $detailOfSubject->load('subject');

        return view('admin.detailOfSubjects.show', compact('detailOfSubject'));
    }

    public function destroy(DetailOfSubject $detailOfSubject)
    {
        abort_if(Gate::denies('detail_of_subject_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $detailOfSubject->delete();

        return back();
    }

    public function massDestroy(MassDestroyDetailOfSubjectRequest $request)
    {
        $detailOfSubjects = DetailOfSubject::find(request('ids'));

        foreach ($detailOfSubjects as $detailOfSubject) {
            $detailOfSubject->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('detail_of_subject_create') && Gate::denies('detail_of_subject_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new DetailOfSubject();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
