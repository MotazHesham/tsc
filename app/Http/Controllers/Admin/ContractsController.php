<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyContractRequest;
use App\Http\Requests\StoreContractRequest;
use App\Http\Requests\UpdateContractRequest;
use App\Models\Contract;
use App\Models\RequestService;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ContractsController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('contract_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Contract::with(['user', 'request_service'])->select(sprintf('%s.*', (new Contract)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'contract_show';
                $editGate      = 'contract_edit';
                $deleteGate    = 'contract_delete';
                $crudRoutePart = 'admin.contracts';

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
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('contract_type', function ($row) {
                return $row->contract_type ? Contract::CONTRACT_TYPE_SELECT[$row->contract_type] : '';
            });
            $table->addColumn('user_name', function ($row) {
                return $row->user ? $row->user->name : '';
            });

            $table->editColumn('city', function ($row) {
                return $row->city ? $row->city : '';
            });
            $table->editColumn('address', function ($row) {
                return $row->address ? $row->address : '';
            });
            $table->editColumn('contract_value', function ($row) {
                return $row->contract_value ? $row->contract_value : '';
            });

            $table->editColumn('contract', function ($row) {
                return $row->contract ? '<a href="' . $row->contract->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>' : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'user', 'contract']);

            return $table->make(true);
        }

        return view('admin.contracts.index');
    }

    public function create()
    {
        abort_if(Gate::denies('contract_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $request_services = RequestService::pluck('place', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.contracts.create', compact('request_services', 'users'));
    }

    public function store(StoreContractRequest $request)
    {
        $contract = Contract::create($request->all());

        if ($request->input('contract', false)) {
            $contract->addMedia(storage_path('tmp/uploads/' . basename($request->input('contract'))))->toMediaCollection('contract');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $contract->id]);
        }

        return redirect()->route('admin.contracts.index');
    }

    public function edit(Contract $contract)
    {
        abort_if(Gate::denies('contract_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $request_services = RequestService::pluck('place', 'id')->prepend(trans('global.pleaseSelect'), '');

        $contract->load('user', 'request_service');

        return view('admin.contracts.edit', compact('contract', 'request_services', 'users'));
    }

    public function update(UpdateContractRequest $request, Contract $contract)
    {
        $contract->update($request->all());

        if ($request->input('contract', false)) {
            if (! $contract->contract || $request->input('contract') !== $contract->contract->file_name) {
                if ($contract->contract) {
                    $contract->contract->delete();
                }
                $contract->addMedia(storage_path('tmp/uploads/' . basename($request->input('contract'))))->toMediaCollection('contract');
            }
        } elseif ($contract->contract) {
            $contract->contract->delete();
        }

        return redirect()->route('admin.contracts.index');
    }

    public function show(Contract $contract)
    {
        abort_if(Gate::denies('contract_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contract->load('user', 'request_service', 'contractAppointments');

        return view('admin.contracts.show', compact('contract'));
    }

    public function destroy(Contract $contract)
    {
        abort_if(Gate::denies('contract_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contract->delete();

        return back();
    }

    public function massDestroy(MassDestroyContractRequest $request)
    {
        $contracts = Contract::find(request('ids'));

        foreach ($contracts as $contract) {
            $contract->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('contract_create') && Gate::denies('contract_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Contract();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
