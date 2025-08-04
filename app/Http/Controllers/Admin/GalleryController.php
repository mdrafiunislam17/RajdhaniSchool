<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class GalleryController extends Controller
{
    //


    private function uploadImage($image): string
    {
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/gallery'), $imageName);
        return $imageName;
    }

    public function index()
    {
        $gallery = Gallery::all();
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view('admin.gallery.index',compact('gallery','settings'));
    }

    public function create()
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view('admin.gallery.create',compact('settings'));

    }


    public function store(Request $request)
    {
        // Form Validation
        $request->validate([
            "title" => "required",
            "image" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ]);

        try {
            $gallery = new Gallery();
            $gallery->fill([
                "title" => $request->input("title"),
                "image" => $request->input("image"),
                "youtube" => $request->input("youtube"),
                "status" => $request->input("status"),
            ]);

           if ($request->hasFile('image')) {
                $gallery->image = $this->uploadImage($request->file('image'));
            }


            $gallery->save();
        } catch (QueryException $exception) {
            return redirect()
                ->back()
                ->withInput()
                ->with("error", "QueryException code: " . $exception->getCode());
        }

        return redirect()->route('gallery.index')->with("success", "gallery has been inserted successfully.");
    }

       public function edit(Gallery $gallery)
        {
            $settings = Setting::query()->pluck("value", "setting_name")->toArray();
            return view('admin.gallery.edit',compact('gallery','settings'));

        }


        public function update(Request $request, Gallery $gallery)
{
    $request->validate([
        "title" => "required",
        "image" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
    ]);

    try {
        $gallery->fill([
            "title" => $request->input("title"),
            "youtube" => $request->input("youtube"),
            "status" => $request->input("status"),
        ]);

          if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($gallery->image && file_exists(public_path('uploads/gallery/' . $gallery->image))) {
                unlink(public_path('uploads/gallery/' . $gallery->image));
            }

            // Upload new image
            $gallery->image = $this->uploadImage($request->file('image'));
            }

        $gallery->save();

    } catch (\Exception $e) {
        return redirect()
            ->back()
            ->withInput()
            ->with('error', 'Failed to update gallery. Error: ' . $e->getMessage());
    }

    return redirect()->route('gallery.index')->with("success", "Gallery updated successfully.");
}


public function destroy(Gallery $gallery)
{
    try {
        if ($gallery->image && file_exists(public_path('uploads/gallery/' . $gallery->image))) {
                unlink(public_path('uploads/gallery/' . $gallery->image));
            }

        $gallery->delete();

    } catch (\Exception $e) {
        return redirect()
            ->back()
            ->with('error', 'Failed to delete gallery. Error: ' . $e->getMessage());
    }

    return redirect()->route('gallery.index')->with("success", "Gallery deleted successfully.");
}

}
