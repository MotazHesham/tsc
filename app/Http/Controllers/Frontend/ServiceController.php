<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\FaqQuestion;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(){
        $services = Service::simplePaginate(12);
        return view('frontend.services',compact('services'));
    }

    public function show($id){
        $service = Service::findOrFail($id);
        $faqs = FaqQuestion::get();
        return view('frontend.service',compact('service','faqs'));
    }
}
