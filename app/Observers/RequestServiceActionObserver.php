<?php

namespace App\Observers;

use App\Models\RequestService;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class RequestServiceActionObserver
{
    public function created(RequestService $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'RequestService'];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
