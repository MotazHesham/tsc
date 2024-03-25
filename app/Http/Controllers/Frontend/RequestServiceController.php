<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\RequestService;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequestServiceController extends Controller
{

    public function index(Request $request){ 
        return redirect()->route('home');
    }

    public function store(Request $request){ 
        $request->validate(['email'=>'unique:users,email|email']);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'approved' => 1,
            'phone_number' => $request->phone,
            'user_type' => 'client',
            'password' => bcrypt($request->password),
        ]);

        Client::create(['user_id'=>$user->id]);

        RequestService::create([
            'service_id' => $request->service_id,
            'user_id' => $user->id,
            'message' => $request->message, 
            'place' => $request->place, 
            'status' => 'pending', 
        ]);
        Auth::login($user);
        alert()->success('تم أرسال طلبك بنجاح','');
        return redirect()->route('client.home');
    }


}
