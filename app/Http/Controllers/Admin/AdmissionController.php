<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admission;
use App\Models\SchoolClass;
use App\Models\Setting;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class AdmissionController extends Controller
{


    private function uploadImage($image): string
    {
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/student_photo'), $imageName);
        return $imageName;
    }

    private function uploadImage1($image): string
    {
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/guardian_photo'), $imageName);
        return $imageName;
    }

    public function index()
    {
        $admissions = Admission::latest()->get();
        $class = SchoolClass::all();
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view('admin.admission.index', compact('admissions', 'settings','class'));
    }

    public function create()
    {
        $class = SchoolClass::all();
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view('admin.admission.create', compact('settings','class'));
    }

    public function store(Request $request)
    {
        $request->validate([
            "class_id" => "required",
            "student_photo" => "nullable|image|mimes:jpeg,png,jpg",
            "guardian_photo" => "nullable|image|mimes:jpeg,png,jpg",
        ]);

        try {
            $admission = new Admission();
            $admission->fill([
                "class_id" => $request->input("class_id"),
                "first_name" => $request->input("first_name"),
                "last_name" => $request->input("last_name"),
                "gender" => $request->input("gender"),
                "shift" => $request->input("shift"),
                "admission_date" => $request->input("admission_date"),
                "birthday" => $request->input("birthday"),
                "blood_group" => $request->input("blood_group"),
                "student_phone" => $request->input("student_phone"),
                "student_email" => $request->input("student_email"),
                "religion" => $request->input("religion"),
                "present_address" => $request->input("present_address"),
                "permanent_address" => $request->input("permanent_address"),
                "city" => $request->input("city"),
                "state" => $request->input("state"),
                "school_name" => $request->input("school_name"),
                "guardian_name" => $request->input("guardian_name"),
                "guardian_phone" => $request->input("guardian_phone"),
            ]);

            if ($request->hasFile('student_photo')) {
                $admission->student_photo = $this->uploadImage($request->file('student_photo'));
            }

            if ($request->hasFile('guardian_photo')) {
                $admission->guardian_photo = $this->uploadImage1($request->file('guardian_photo'));
            }

            $admission->save();
        } catch (QueryException $exception) {
            return redirect()
                ->back()
                ->withInput()
                ->with("error", "QueryException code: " . $exception->getCode());
        }

        return redirect()->back()->with("success", "Admission has been inserted successfully.");
    }

    public function edit(Admission $admission)
    {
        $class = SchoolClass::all();
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view('admin.admission.edit', compact('admission', 'class','settings'));
    }

    public function update(Request $request, Admission $admission)
    {
        $request->validate([
            "class_id" => "required",
            "student_photo" => "nullable|image|mimes:jpeg,png,jpg",
            "guardian_photo" => "nullable|image|mimes:jpeg,png,jpg",
        ]);

        try {
            $admission->fill([
                "class_id" => $request->input("class_id"),
                "first_name" => $request->input("first_name"),
                "last_name" => $request->input("last_name"),
                "gender" => $request->input("gender"),
                "shift" => $request->input("shift"),
                "admission_date" => $request->input("admission_date"),
                "birthday" => $request->input("birthday"),
                "blood_group" => $request->input("blood_group"),
                "student_phone" => $request->input("student_phone"),
                "student_email" => $request->input("student_email"),
                "religion" => $request->input("religion"),
                "present_address" => $request->input("present_address"),
                "permanent_address" => $request->input("permanent_address"),
                "city" => $request->input("city"),
                "state" => $request->input("state"),
                "school_name" => $request->input("school_name"),
                "guardian_name" => $request->input("guardian_name"),
                "guardian_phone" => $request->input("guardian_phone"),
            ]);

            if ($request->hasFile('student_photo')) {
                $admission->student_photo = $this->uploadImage($request->file('student_photo'));
            }

            if ($request->hasFile('guardian_photo')) {
                $admission->guardian_photo = $this->uploadImage1($request->file('guardian_photo'));
            }

            $admission->save();
        } catch (QueryException $exception) {
            return redirect()
                ->back()
                ->withInput()
                ->with("error", "QueryException code: " . $exception->getCode());
        }

        return redirect()->back()->with("success", "Admission record updated successfully.");
    }


    public function show(Admission $admission)
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view('admin.admission.show', compact('admission', 'settings'));
    }



    public function destroy(Admission $admission)
    {
        try {
            // Optionally delete associated images from storage
            if ($admission->student_photo && file_exists(public_path('uploads/student_photo/' . $admission->student_photo))) {
                unlink(public_path('uploads/student_photo/' . $admission->student_photo));
            }

            if ($admission->guardian_photo && file_exists(public_path('uploads/guardian_photo/' . $admission->guardian_photo))) {
                unlink(public_path('uploads/guardian_photo/' . $admission->guardian_photo));
            }

            $admission->delete();
        } catch (\Exception $e) {
            return redirect()->back()->with("error", "Failed to delete admission: " . $e->getMessage());
        }

        return redirect()->route('admission.index')->with("success", "Admission record deleted successfully.");
    }

}
