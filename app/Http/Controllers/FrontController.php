<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Notice;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\Teacher;
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
        $teacher = Teacher::query()
                    ->where("status", 1)
                    ->latest()
                    ->get();
        $notices  =   Notice::latest()->take(3)->get();

        return view('front.index',compact('sliders','settings','about','teacher','notices'));
    }

    public function aboutUs($title = null)
    {
        $about = About::first();
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();

        return view('front.about', compact('about','settings'));
    }


   public function teachers(){


        $teacher = Teacher::where('status', 1)->get();
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view('front.teachers', compact('teacher','settings'));
    }

    public function teacherdetails($name = null){

        $teacher = Teacher::where('name', $name)->firstOrFail();
        $teachers = Teacher::query()
            ->where("status", 1)
            ->latest()
            ->get();

         $settings = Setting::query()->pluck("value", "setting_name")->toArray();
         return view('front.teacherdetails', compact('teacher','teachers','settings'));

    }

    public function notices(){


        $notices = Notice::where('status', 1)->get();
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view('front.notice', compact('notices','settings'));
    }


    public function noticeDetails($title = null){
        $notice = Notice::where('title', $title)->firstOrFail();
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view('front.noticeDetails', compact('notice','settings'));
    }

}
