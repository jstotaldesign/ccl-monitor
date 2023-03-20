<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreIssueRequest;
use App\Http\Requests\UpdateIssueRequest;
use App\Http\Resources\Admin\IssueResource;
use App\Models\Issue;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IssuesApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('issue_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new IssueResource(Issue::with(['jobtype', 'categorize_priority', 'responsibility', 'requester', 'department'])->get());
    }

    public function store(StoreIssueRequest $request)
    {
        $issue = Issue::create($request->all());

        return (new IssueResource($issue))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Issue $issue)
    {
        abort_if(Gate::denies('issue_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new IssueResource($issue->load(['jobtype', 'categorize_priority', 'responsibility', 'requester', 'department']));
    }

    public function update(UpdateIssueRequest $request, Issue $issue)
    {
        $issue->update($request->all());

        return (new IssueResource($issue))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Issue $issue)
    {
        abort_if(Gate::denies('issue_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $issue->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
