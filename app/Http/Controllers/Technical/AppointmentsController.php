<?php

namespace App\Http\Controllers\Technical;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAppointmentRequest;
use App\Http\Requests\StoreAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;
use App\Models\Appointment;
use App\Models\Contract;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class AppointmentsController extends Controller
{
    public function index(Request $request)
    { 

        if ($request->ajax()) {
            $query = Appointment::with(['contract', 'user'])->where('user_id',auth()->id())->select(sprintf('%s.*', (new Appointment)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = true;
                $editGate      = true;
                $deleteGate    = false;
                $crudRoutePart = 'technical.appointments';

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

            $table->editColumn('time', function ($row) {
                return $row->time ? $row->time : '';
            });
            $table->editColumn('title', function ($row) {
                return $row->title ? $row->title : '';
            });
            $table->addColumn('contract_name', function ($row) {
                return $row->contract ? $row->contract->name : '';
            });

            $table->addColumn('user_name', function ($row) {
                return $row->user ? $row->user->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'contract', 'user']);

            return $table->make(true);
        }

        return view('technical.appointments.index');
    }

    public function create()
    { 
        $contracts = Contract::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('technical.appointments.create', compact('contracts', 'users'));
    }

    public function store(StoreAppointmentRequest $request)
    {
        $appointment = Appointment::create($request->all());

        return redirect()->route('technical.appointments.index');
    }

    public function edit(Appointment $appointment)
    { 

        $contracts = Contract::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $appointment->load('contract', 'user');

        return view('technical.appointments.edit', compact('appointment', 'contracts', 'users'));
    }

    public function update(UpdateAppointmentRequest $request, Appointment $appointment)
    {
        $appointment->update($request->all());

        return redirect()->route('technical.appointments.index');
    }

    public function show(Appointment $appointment)
    { 
        $appointment->load('contract', 'user');

        return view('technical.appointments.show', compact('appointment'));
    }

    public function destroy(Appointment $appointment)
    { 
        $appointment->delete();

        return back();
    }

    public function massDestroy(MassDestroyAppointmentRequest $request)
    {
        $appointments = Appointment::find(request('ids'));

        foreach ($appointments as $appointment) {
            $appointment->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
