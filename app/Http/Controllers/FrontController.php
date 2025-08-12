<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Blog;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\Notice;
use App\Models\Saying;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\Teacher;
use App\Models\SchoolClass;
use App\Models\Student;
use App\Models\Syllabus;
use Carbon\Carbon;
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
        $gallery = Gallery::latest()->get();
        $events = Event::query()
                ->where("status", 1)
                ->where("event_date", ">", now()->toDateString())
                ->orderByDesc("event_date")
                ->get();
        $blog  =   Blog::latest()->take(3)->get();
        $saying = Saying::orderBy('sort', 'asc')->get();
        return view('front.index',compact('sliders','settings',
            'about','teacher','notices','gallery','events','blog','saying'));
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


    public  function gallerys($title = null)
    {
        $gallery = Gallery::all();
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view('front.gallery', compact('gallery','settings'));
    }

    public function event()
    {
        $today = Carbon::today()->toDateString();

        // First: Past events (latest first)
        $pastEvents = Event::where('event_date', '<', $today)
            ->orderBy('event_date', 'desc')
            ->get();

        // Then: Upcoming events (soonest first)
        $upcomingEvents = Event::where('event_date', '>=', $today)
            ->orderBy('event_date', 'asc')
            ->get();

        // Merge past events first, then upcoming
        $events = $pastEvents->merge($upcomingEvents);

        $settings = Setting::query()->pluck("value", "setting_name")->toArray();

        return view('front.event', compact('events', 'settings'));
    }


    public  function eventDetails ($event_name = null)
    {
        $event = Event::where('event_name', $event_name)->firstOrFail();
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view('front.eventDetails', compact('event','settings'));

    }


    public function blog(){
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        $blogs  =   Blog::all();
        return view('front.blog', compact('blogs','settings'));
    }

        public  function blogDetails ($title = null)
    {
        $blog = Blog::where('title', $title)->firstOrFail();
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view('front.blogDetails', compact('blog','settings'));

    }


    public function sayings(){


        $saying = Saying::where('status', 1)->orderBy('sort', 'asc')->get();
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view('front.saying', compact('saying','settings'));
    }

    public function sayingDetails($name = null){

        $saying = Saying::where('name', $name)->firstOrFail();
        $sayings = Saying::where('status', 1)->orderBy('sort', 'asc')->get();
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view('front.sayingDetails', compact('saying','sayings','settings'));

    }



          public function contactUS()
        {


            $settings = Setting::query()->pluck("value", "setting_name")->toArray();
            return view('front.contact',compact('settings',

                ));
        }

            public function admissionOnline()
            {


                 $class = SchoolClass::all();


                $settings = Setting::query()->pluck("value", "setting_name")->toArray();
                return view('front.admissionOnline',compact('settings', 'class'

                    ));
            }



            // public function students(Request $request)
            // {

            //     $student = Student::all();

            //      $query = Student::query();

            //     // Filter by class if selected
            //     if ($request->filled('class')) {
            //         $query->where('class', $request->input('class'));
            //     }

            //     // Filter by section if selected and not 'N/A'
            //     if ($request->filled('section') && $request->section !== 'N/A') {
            //         $query->where('section', $request->input('section'));
            //     }

            //     // Get filtered students with pagination or all
            //     $students = $query->get();
            //      $settings = Setting::query()->pluck("value", "setting_name")->toArray();
            //     return view('front.students',compact('settings','student'));
            // }

            public function students(Request $request)
{
    $query = Student::query();

    // Filter by class if selected
    if ($request->filled('class')) {
        $query->where('class', $request->input('class'));
    }

    // Filter by section if selected and not 'N/A'
    if ($request->filled('section') && $request->section !== 'N/A') {
        $query->where('section', $request->input('section'));
    }

    // Get filtered students (all or filtered)
    $student = $query->get();

    $settings = Setting::query()->pluck("value", "setting_name")->toArray();

    // Pass filtered students as $student to view
    return view('front.students', compact('settings', 'student'));
}




public function syllabui(){


        $syllabus = Syllabus::where('status', 1)->get();
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view('front.syllabui', compact('syllabus','settings'));
    }


    public function syllabuiDetails($title = null){
        $syllabus = Syllabus::where('title', $title)->firstOrFail();
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view('front.syllabuiDetails', compact('syllabus','settings'));
    }


}
