<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Contactu;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{

    public function index(){
        $about = About::first();
        return view('frontend.contactus',compact('about'));
    }

    public function store(Request $request){ 
        Contactu::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);
        alert()->success('تم أرسال رسالتك بنجاح','');
        return redirect()->route('frontend.contactus.index');
    }
}
