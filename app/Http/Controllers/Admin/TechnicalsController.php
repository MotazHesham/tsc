<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTechnicalRequest;
use App\Http\Requests\StoreTechnicalRequest;
use App\Http\Requests\UpdateTechnicalRequest;
use App\Models\Technical;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class TechnicalsController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('technical_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Technical::with(['user'])->select(sprintf('%s.*', (new Technical)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'technical_show';
                $editGate      = 'technical_edit';
                $deleteGate    = 'technical_delete';
                $crudRoutePart = 'admin.technicals';

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
            $table->addColumn('user_name', function ($row) {
                return $row->user ? $row->user->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'user']);

            return $table->make(true);
        }

        return view('admin.technicals.index');
    }

    public function create()
    {
        abort_if(Gate::denies('technical_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.technicals.create', compact('users'));
    }

    public function store(StoreTechnicalRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'approved' => $request->approved,
            'phone_number' => $request->phone_number,
            'user_type' => 'technical',
            'password' => bcrypt($request->password),
        ]);

        $technical = Technical::create(['user_id'=>$user->id]);

        return redirect()->route('admin.technicals.index');
    }

    public function edit(Technical $technical)
    {
        abort_if(Gate::denies('technical_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden'); 

        $technical->load('user');

        $user = $technical->user;

        return view('admin.technicals.edit', compact('technical','user'));
    }

    public function update(UpdateTechnicalRequest $request, Technical $technical)
    {
        $user = User::findOrFail($request->user_id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'approved' => $request->approved,
            'phone_number' => $request->phone_number, 
            'password' => $request->password ? bcrypt($request->password) : $user->password,
        ]);

        return redirect()->route('admin.technicals.index');
    }

    public function show(Technical $technical)
    {
        abort_if(Gate::denies('technical_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $technical->load('user');

        return view('admin.technicals.show', compact('technical'));
    }

    public function destroy(Technical $technical)
    {
        abort_if(Gate::denies('technical_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $technical->delete();

        return back();
    }

    public function massDestroy(MassDestroyTechnicalRequest $request)
    {
        $technicals = Technical::find(request('ids'));

        foreach ($technicals as $technical) {
            $technical->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
