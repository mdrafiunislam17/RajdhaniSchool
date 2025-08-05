<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\Student;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    private function uploadImage($image, $folder): string
    {
        $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/' . $folder), $imageName);
        return 'uploads/' . $folder . '/' . $imageName;
    }

    public function index()
    {
        $student = Student::all();
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view('admin.student.index', compact('student', 'settings'));
    }

    public function create()
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view('admin.student.create', compact('settings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            "class" => "required|string",
            "section" => "required|string",
            "first_name" => "required|string|max:255",
            "last_name" => "required|string|max:255",
            "gender" => "required|string|in:male,female,other",
            "shift" => "required|string|in:morning,day",
            "admission_date" => "required|date",
            "birthday" => "required|date",
            "student_photo" => "nullable|image|mimes:jpeg,png,jpg|max:2048",
            "guardian_photo" => "nullable|image|mimes:jpeg,png,jpg|max:2048",
        ]);

        try {
            $student = new Student();

            // Handle file uploads
            if ($request->hasFile('student_photo')) {
                $studentPhotoPath = $this->uploadImage($request->file('student_photo'), 'student_photo');
                $student->student_photo = $studentPhotoPath;
            }

            if ($request->hasFile('guardian_photo')) {
                $guardianPhotoPath = $this->uploadImage($request->file('guardian_photo'), 'guardian_photo');
                $student->guardian_photo = $guardianPhotoPath;
            }

            $student->fill([
                "class" => $request->input("class"),
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
                "student_group" => $request->input("student_group"),
                "section" => $request->input("section"),
                "status" => $request->input("status", 1),
            ]);

            $student->save();

            return redirect()->route('student.index')->with("success", "Student has been inserted successfully.");

        } catch (\Exception $exception) {
            return redirect()
                ->back()
                ->withInput()
                ->with("error", "Error: " . $exception->getMessage());
        }
    }

    public function edit(Student $student)
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view('admin.student.edit', compact('student', 'settings'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            "class" => "required|string",
            "section" => "required|string",
            "first_name" => "required|string|max:255",
            "last_name" => "required|string|max:255",
            "gender" => "required|string|in:male,female,other",
            "shift" => "required|string|in:morning,day",
            "admission_date" => "required|date",
            "birthday" => "required|date",
            "student_photo" => "nullable|image|mimes:jpeg,png,jpg|max:2048",
            "guardian_photo" => "nullable|image|mimes:jpeg,png,jpg|max:2048",
        ]);

        try {
            // Handle file uploads
            if ($request->hasFile('student_photo')) {
                // Delete old image if exists
                if ($student->student_photo && file_exists(public_path($student->student_photo))) {
                    unlink(public_path($student->student_photo));
                }
                $studentPhotoPath = $this->uploadImage($request->file('student_photo'), 'student_photo');
                $student->student_photo = $studentPhotoPath;
            }

            if ($request->hasFile('guardian_photo')) {
                // Delete old image if exists
                if ($student->guardian_photo && file_exists(public_path($student->guardian_photo))) {
                    unlink(public_path($student->guardian_photo));
                }
                $guardianPhotoPath = $this->uploadImage($request->file('guardian_photo'), 'guardian_photo');
                $student->guardian_photo = $guardianPhotoPath;
            }

            $student->fill([
                "class" => $request->input("class"),
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
                "student_group" => $request->input("student_group"),
                "section" => $request->input("section"),
                "status" => $request->input("status", 1),
            ]);

            $student->save();

            return redirect()->route('student.index')->with('success', 'Student has been updated successfully.');

        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Update failed: ' . $e->getMessage());
        }
    }

    public function show(Student $student)
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view('admin.student.show', compact('student', 'settings'));
    }

    public function destroy(Student $student)
    {
        try {
            // Delete associated images from storage
            if ($student->student_photo && file_exists(public_path($student->student_photo))) {
                unlink(public_path($student->student_photo));
            }

            if ($student->guardian_photo && file_exists(public_path($student->guardian_photo))) {
                unlink(public_path($student->guardian_photo));
            }

            $student->delete();
        } catch (\Exception $e) {
            return redirect()->back()->with("error", "Failed to delete Student: " . $e->getMessage());
        }

        return redirect()->route('student.index')->with("success", "Student record deleted successfully.");
    }
}
