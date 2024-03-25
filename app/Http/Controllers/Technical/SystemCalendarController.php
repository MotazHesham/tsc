<?php

namespace App\Http\Controllers\Technical;

use App\Http\Controllers\Controller;
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
            'route'      => 'technical.appointments.edit',
        ],
    ];

    public function index()
    {
        $events = [];
        foreach ($this->sources as $source) {
            foreach ($source['model']::where('user_id',auth()->id())->get() as $model) {
                $crudFieldValue = $model->getAttributes()[$source['date_field']];

                if (! $crudFieldValue) {
                    continue;
                }

                $events[] = [
                    'title' => trim($source['prefix'] . ' ' . $model->{$source['field']} . ' ' . $source['suffix']),
                    'start' => $crudFieldValue,
                    'url'   => route($source['route'], $model->id),
                ];
            }
        }

        return view('technical.calendar.calendar', compact('events'));
    }
}
