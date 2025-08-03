<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SchoolClass;
use App\Models\Setting;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class classController extends Controller
{
    //

     public function index()
    {
        $schoolClass = SchoolClass::all();
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view('admin.class.index',compact('schoolClass','settings'));
    }


     public function create()
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view('admin.class.create',compact('settings'));

    }

    public function store(Request $request)
    {
        // Form Validation
        $request->validate([
            "name" => "required",
        ]);

        try {
            $schoolClass = new SchoolClass();
            $schoolClass->fill([
                "name" => $request->input("name"),
                "status" => $request->input("status"),
            ]);




            $schoolClass->save();
        } catch (QueryException $exception) {
            return redirect()
                ->back()
                ->withInput()
                ->with("error", "QueryException code: " . $exception->getCode());
        }

        return redirect()->route('class.index')->with("success", "teacher has been inserted successfully.");
    }


    public function edit(SchoolClass $class)
        {
            $settings = Setting::query()->pluck("value", "setting_name")->toArray();
            return view('admin.class.edit',compact('class','settings'));

        }


        public function update(Request $request, SchoolClass $class)
            {
                // Validate input
                $request->validate([
                    "name" => "required",
                ]);

                try {
                    $class->fill([
                        "name" => $request->input("name"),
                        "status" => $request->input("status", 1),
                    ]);



                    $class->save();

                } catch (\Exception $e) {
                    return redirect()
                        ->back()
                        ->withInput()
                        ->with('error', 'Failed to update Class. Error: ' . $e->getMessage());
                }

                return redirect()->route('class.index')->with('success', 'Class updated successfully.');
            }


        public function destroy(SchoolClass $class)
        {
            try {
                // Remove image file if exists
                // if ($teacher->image && file_exists(public_path('uploads/teachers/' . $teacher->image))) {
                //     unlink(public_path('uploads/teachers/' . $teacher->image));
                // }

                $class->delete();

            } catch (\Exception $e) {
                return redirect()
                    ->back()
                    ->with('error', 'Failed to delete Class. Error: ' . $e->getMessage());
            }

            return redirect()->route('class.index')->with('success', 'Class deleted successfully.');
        }
}
