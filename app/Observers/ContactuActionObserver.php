<?php

namespace App\Observers;

use App\Models\Contactu;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class ContactuActionObserver
{
    public function created(Contactu $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'Contactu'];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        // Notification::send($users, new DataChangeEmailNotification($data));
    }
}
