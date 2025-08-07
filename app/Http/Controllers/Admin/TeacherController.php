<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\Teacher;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    //

    private function uploadImage($image): string
        {
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/teacher'), $imageName);
            return $imageName;
        }


    public function index()
    {
        $teacher = Teacher::latest()->get();
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view('admin.teachers.index',compact('teacher','settings'));
    }

    public function create()
        {
            $settings = Setting::query()->pluck("value", "setting_name")->toArray();
            return view('admin.teachers.create',compact('settings'));

        }

    public function store(Request $request)
    {
        // Form Validation
        $request->validate([
            "name" => "required",
            "image" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "position" => "required",
            "phone" => "required",
        ]);

        try {
            $teacher = new Teacher();
            $teacher->fill([
                "name" => $request->input("name"),
                "position" => $request->input("position"),
                "experience" => $request->input("experience"),
                "phone" => $request->input("phone"),
                "facebook" => $request->input("facebook"),
                "twitter" => $request->input("twitter"),
                "linkedin" => $request->input("linkedin"),
                "instagram" => $request->input("instagram"),
                "description" => $request->input("description"),
                "status" => $request->input("status"),
            ]);

           if ($request->hasFile('image')) {
                $teacher->image = $this->uploadImage($request->file('image'));
            }


            $teacher->save();
        } catch (QueryException $exception) {
            return redirect()
                ->back()
                ->withInput()
                ->with("error", "QueryException code: " . $exception->getCode());
        }

        return redirect()->route('teacher.index')->with("success", "teacher has been inserted successfully.");
    }

       public function edit(Teacher $teacher)
        {
            $settings = Setting::query()->pluck("value", "setting_name")->toArray();
            return view('admin.teachers.edit',compact('teacher','settings'));

        }


        public function update(Request $request, Teacher $teacher)
            {
                // Validate input
                $request->validate([
                    "name" => "required",
                    "position" => "required",
                    "phone" => "required",
                    "image" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
                ]);

                try {
                    $teacher->fill([
                        "name" => $request->input("name"),
                        "position" => $request->input("position"),
                        "experience" => $request->input("experience"),
                        "phone" => $request->input("phone"),
                        "facebook" => $request->input("facebook"),
                        "twitter" => $request->input("twitter"),
                        "linkedin" => $request->input("linkedin"),
                        "instagram" => $request->input("instagram"),
                        "description" => $request->input("description"),
                        "status" => $request->input("status", 1),
                    ]);

                    if ($request->hasFile('image')) {
                        // Delete old image if exists
                        if ($teacher->image && file_exists(public_path('uploads/teachers/' . $teacher->image))) {
                            unlink(public_path('uploads/teachers/' . $teacher->image));
                        }

                        // Upload new image
                        $teacher->image = $this->uploadImage($request->file('image'));
                    }

                    $teacher->save();

                } catch (\Exception $e) {
                    return redirect()
                        ->back()
                        ->withInput()
                        ->with('error', 'Failed to update Teacher. Error: ' . $e->getMessage());
                }

                return redirect()->route('teacher.index')->with('success', 'Teacher updated successfully.');
            }


        public function destroy(Teacher $teacher)
        {
            try {
                // Remove image file if exists
                if ($teacher->image && file_exists(public_path('uploads/teachers/' . $teacher->image))) {
                    unlink(public_path('uploads/teachers/' . $teacher->image));
                }

                $teacher->delete();

            } catch (\Exception $e) {
                return redirect()
                    ->back()
                    ->with('error', 'Failed to delete Teacher. Error: ' . $e->getMessage());
            }

            return redirect()->route('teacher.index')->with('success', 'Teacher deleted successfully.');
        }


}
