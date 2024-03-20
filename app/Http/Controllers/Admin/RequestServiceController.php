<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyRequestServiceRequest;
use App\Http\Requests\StoreRequestServiceRequest;
use App\Http\Requests\UpdateRequestServiceRequest;
use App\Models\RequestService;
use App\Models\Service;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class RequestServiceController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('request_service_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = RequestService::with(['service', 'user'])->select(sprintf('%s.*', (new RequestService)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'request_service_show';
                $editGate      = 'request_service_edit';
                $deleteGate    = 'request_service_delete';
                $crudRoutePart = 'request-services';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->addColumn('service_name', function ($row) {
                return $row->service ? $row->service->name : '';
            });

            $table->addColumn('user_name', function ($row) {
                return $row->user ? $row->user->name : '';
            });

            $table->editColumn('status', function ($row) {
                return $row->status ? RequestService::STATUS_SELECT[$row->status] : '';
            });
            $table->editColumn('edits', function ($row) {
                return $row->edits ? $row->edits : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'service', 'user']);

            return $table->make(true);
        }

        return view('admin.requestServices.index');
    }

    public function create()
    {
        abort_if(Gate::denies('request_service_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $services = Service::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.requestServices.create', compact('services', 'users'));
    }

    public function store(StoreRequestServiceRequest $request)
    {
        $requestService = RequestService::create($request->all());

        if ($request->input('visiting_form', false)) {
            $requestService->addMedia(storage_path('tmp/uploads/' . basename($request->input('visiting_form'))))->toMediaCollection('visiting_form');
        }

        if ($request->input('offer_price_file', false)) {
            $requestService->addMedia(storage_path('tmp/uploads/' . basename($request->input('offer_price_file'))))->toMediaCollection('offer_price_file');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $requestService->id]);
        }

        return redirect()->route('admin.request-services.index');
    }

    public function edit(RequestService $requestService)
    {
        abort_if(Gate::denies('request_service_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $services = Service::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $requestService->load('service', 'user');

        return view('admin.requestServices.edit', compact('requestService', 'services', 'users'));
    }

    public function update(UpdateRequestServiceRequest $request, RequestService $requestService)
    {
        $requestService->update($request->all());

        if ($request->input('visiting_form', false)) {
            if (! $requestService->visiting_form || $request->input('visiting_form') !== $requestService->visiting_form->file_name) {
                if ($requestService->visiting_form) {
                    $requestService->visiting_form->delete();
                }
                $requestService->addMedia(storage_path('tmp/uploads/' . basename($request->input('visiting_form'))))->toMediaCollection('visiting_form');
            }
        } elseif ($requestService->visiting_form) {
            $requestService->visiting_form->delete();
        }

        if ($request->input('offer_price_file', false)) {
            if (! $requestService->offer_price_file || $request->input('offer_price_file') !== $requestService->offer_price_file->file_name) {
                if ($requestService->offer_price_file) {
                    $requestService->offer_price_file->delete();
                }
                $requestService->addMedia(storage_path('tmp/uploads/' . basename($request->input('offer_price_file'))))->toMediaCollection('offer_price_file');
            }
        } elseif ($requestService->offer_price_file) {
            $requestService->offer_price_file->delete();
        }

        return redirect()->route('admin.request-services.index');
    }

    public function show(RequestService $requestService)
    {
        abort_if(Gate::denies('request_service_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $requestService->load('service', 'user');

        return view('admin.requestServices.show', compact('requestService'));
    }

    public function destroy(RequestService $requestService)
    {
        abort_if(Gate::denies('request_service_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $requestService->delete();

        return back();
    }

    public function massDestroy(MassDestroyRequestServiceRequest $request)
    {
        $requestServices = RequestService::find(request('ids'));

        foreach ($requestServices as $requestService) {
            $requestService->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('request_service_create') && Gate::denies('request_service_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new RequestService();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
