<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyTeamWorkRequest;
use App\Http\Requests\StoreTeamWorkRequest;
use App\Http\Requests\UpdateTeamWorkRequest;
use App\Models\TeamWork;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class TeamWorksController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('team_work_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teamWorks = TeamWork::with(['media'])->get();

        return view('admin.teamWorks.index', compact('teamWorks'));
    }

    public function create()
    {
        abort_if(Gate::denies('team_work_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.teamWorks.create');
    }

    public function store(StoreTeamWorkRequest $request)
    {
        $teamWork = TeamWork::create($request->all());

        if ($request->input('photo', false)) {
            $teamWork->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $teamWork->id]);
        }

        return redirect()->route('admin.team-works.index');
    }

    public function edit(TeamWork $teamWork)
    {
        abort_if(Gate::denies('team_work_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.teamWorks.edit', compact('teamWork'));
    }

    public function update(UpdateTeamWorkRequest $request, TeamWork $teamWork)
    {
        $teamWork->update($request->all());

        if ($request->input('photo', false)) {
            if (! $teamWork->photo || $request->input('photo') !== $teamWork->photo->file_name) {
                if ($teamWork->photo) {
                    $teamWork->photo->delete();
                }
                $teamWork->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
            }
        } elseif ($teamWork->photo) {
            $teamWork->photo->delete();
        }

        return redirect()->route('admin.team-works.index');
    }

    public function show(TeamWork $teamWork)
    {
        abort_if(Gate::denies('team_work_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.teamWorks.show', compact('teamWork'));
    }

    public function destroy(TeamWork $teamWork)
    {
        abort_if(Gate::denies('team_work_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teamWork->delete();

        return back();
    }

    public function massDestroy(MassDestroyTeamWorkRequest $request)
    {
        $teamWorks = TeamWork::find(request('ids'));

        foreach ($teamWorks as $teamWork) {
            $teamWork->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('team_work_create') && Gate::denies('team_work_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new TeamWork();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
