<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyIssueRequest;
use App\Http\Requests\StoreIssueRequest;
use App\Http\Requests\UpdateIssueRequest;
use App\Models\CtergorizePriority;
use App\Models\Department;
use App\Models\Issue;
use App\Models\JobType;
use App\Models\Requester;
use App\Models\Responsibility;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class IssuesController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('issue_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $issues = Issue::with(['jobtype', 'categorize_priority', 'responsibility', 'requester', 'department'])->get();

        $job_types = JobType::get();

        $ctergorize_priorities = CtergorizePriority::get();

        $responsibilities = Responsibility::get();

        $requesters = Requester::get();

        $departments = Department::get();

        return view('admin.issues.index', compact('ctergorize_priorities', 'departments', 'issues', 'job_types', 'requesters', 'responsibilities'));
    }

    public function create()
    {
        abort_if(Gate::denies('issue_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jobtypes = JobType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categorize_priorities = CtergorizePriority::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $responsibilities = Responsibility::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $requesters = Requester::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $departments = Department::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.issues.create', compact('categorize_priorities', 'departments', 'jobtypes', 'requesters', 'responsibilities'));
    }

    public function store(StoreIssueRequest $request)
    {
        $issue = Issue::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $issue->id]);
        }

        return redirect()->route('admin.issues.index');
    }

    public function edit(Issue $issue)
    {
        abort_if(Gate::denies('issue_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jobtypes = JobType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categorize_priorities = CtergorizePriority::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $responsibilities = Responsibility::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $requesters = Requester::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $departments = Department::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $issue->load('jobtype', 'categorize_priority', 'responsibility', 'requester', 'department');

        return view('admin.issues.edit', compact('categorize_priorities', 'departments', 'issue', 'jobtypes', 'requesters', 'responsibilities'));
    }

    public function update(UpdateIssueRequest $request, Issue $issue)
    {
        $issue->update($request->all());

        return redirect()->route('admin.issues.index');
    }

    public function show(Issue $issue)
    {
        abort_if(Gate::denies('issue_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $issue->load('jobtype', 'categorize_priority', 'responsibility', 'requester', 'department', 'subjectDetailOfSubjects');

        return view('admin.issues.show', compact('issue'));
    }

    public function destroy(Issue $issue)
    {
        abort_if(Gate::denies('issue_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $issue->delete();

        return back();
    }

    public function massDestroy(MassDestroyIssueRequest $request)
    {
        $issues = Issue::find(request('ids'));

        foreach ($issues as $issue) {
            $issue->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('issue_create') && Gate::denies('issue_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Issue();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
