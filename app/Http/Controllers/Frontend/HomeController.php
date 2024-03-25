<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Client;
use App\Models\Contactu;
use App\Models\FaqQuestion;
use App\Models\RequestService;
use App\Models\Service;
use App\Models\Slider;
use App\Models\TeamWork;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $about = About::first();
        $sliders = Slider::where('publish',1)->get();
        $faqs = FaqQuestion::get();
        $services = Service::take(4)->get();
        return view('frontend.home',compact('sliders','services','about','faqs'));
    }

    public function about(){
        $about = About::first();
        $team_works = TeamWork::get();
        return view('frontend.about',compact('about','team_works'));
    }


    public function clients(){
        $about = About::first();
        return view('frontend.clients',compact('about'));
    }

    public function contact(){
        return view('frontend.contact');
    }

    
    public function sterilization(){
        $faqs = FaqQuestion::get();
        return view('frontend.sterilization',compact('faqs'));
    }
}
