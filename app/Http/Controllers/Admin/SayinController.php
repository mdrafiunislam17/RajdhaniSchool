<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Saying;
use App\Models\Setting;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class SayinController extends Controller
{
    //


    private function uploadImage($image): string
    {
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/saying'), $imageName);
        return $imageName;
    }


    public function index()
    {
        $saying = Saying::orderBy('sort', 'asc')->get();
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view('admin.saying.index',compact('saying','settings'));
    }

    public function create()
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view('admin.saying.create',compact('settings'));

    }

    public function store(Request $request)
    {
        // Form Validation
        $request->validate([
            "name" => "required",
            "image" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "position" => "required",
        ]);

        try {
            $saying = new Saying();
            $saying->fill([
                "name" => $request->input("name"),
                "position" => $request->input("position"),
                "description" => $request->input("description"),
                "status" => $request->input("status"),
                "sort" => $request->input("sort"),
            ]);

            if ($request->hasFile('image')) {
                $saying->image = $this->uploadImage($request->file('image'));
            }


            $saying->save();
        } catch (QueryException $exception) {
            return redirect()
                ->back()
                ->withInput()
                ->with("error", "QueryException code: " . $exception->getCode());
        }

        return redirect()->route('saying.index')->with("success", "saying has been inserted successfully.");
    }

    public function edit(Saying $saying)
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view('admin.saying.edit',compact('saying','settings'));

    }


    public function update(Request $request, Saying $saying)
    {
        // Validate input
        $request->validate([
            "name" => "required",
            "image" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ]);

        try {
            $saying->fill([
                "name" => $request->input("name"),
                "position" => $request->input("position"),
                "description" => $request->input("description"),
                "sort" => $request->input("sort"),
                "status" => $request->input("status", 1),
            ]);

            if ($request->hasFile('image')) {
                // Delete old image if exists
                if ($saying->image && file_exists(public_path('uploads/saying/' . $saying->image))) {
                    unlink(public_path('uploads/sayings/' . $saying->image));
                }

                // Upload new image
                $saying->image = $this->uploadImage($request->file('image'));
            }

            $saying->save();

        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Failed to update Saying. Error: ' . $e->getMessage());
        }

        return redirect()->route('saying.index')->with('success', 'Saying updated successfully.');
    }


    public function destroy(Saying $saying)
    {
        try {
            // Remove image file if exists
            if ($saying->image && file_exists(public_path('uploads/saying/' . $saying->image))) {
                unlink(public_path('uploads/saying/' . $saying->image));
            }

            $saying->delete();

        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Failed to delete Saying. Error: ' . $e->getMessage());
        }

        return redirect()->route('saying.index')->with('success', 'Saying deleted successfully.');
    }

}
