<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Contract;
use Carbon\Carbon;

class SystemCalendarController extends Controller
{
    public $sources = [
        [
            'model'      => '\App\Models\Appointment',
            'date_field' => 'date',
            'field'      => 'title',
            'prefix'     => '',
            'suffix'     => '',
            'route'      => 'client.appointments.edit',
        ],
    ];

    public function index()
    { 
        $events = [];
        foreach ($this->sources as $source) {
            foreach ($source['model']::whereIn('contract_id',Contract::where('user_id',auth()->id())->pluck('id'))->get() as $model) {
                $crudFieldValue = $model->getAttributes()[$source['date_field']];

                if (! $crudFieldValue) {
                    continue;
                }

                $events[] = [
                    'title' => trim($source['prefix'] . ' ' . $model->{$source['field']} . ' ' . $source['suffix']),
                    'start' => $crudFieldValue . ' ' . $model->getAttributes()['time'],
                    'url'   => route($source['route'], $model->id),
                ];
            }
        }

        return view('client.calendar.calendar', compact('events'));
    }
}
