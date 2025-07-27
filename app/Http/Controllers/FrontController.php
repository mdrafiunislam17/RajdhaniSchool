<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Setting;
use App\Models\Slider;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    //

//    public function __construct()
//    {
//        $this->settings = Setting::query()->pluck("value", "setting_name")->toArray();
//    }

    public function index()
    {
        $sliders = Slider::where('status', 1)->get();
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        $about = About::latest()->first();
        return view('front.index',compact('sliders','settings','about'));
    }

    public function aboutUs($title = null)
    {
        $about = About::first();
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();

        return view('front.about', compact('about','settings'));
    }

}
