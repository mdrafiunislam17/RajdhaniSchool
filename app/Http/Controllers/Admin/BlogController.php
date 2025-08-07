<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Setting;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class BlogController extends Controller
{


    private function uploadImage($image): string
    {
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/blog'), $imageName);
        return $imageName;
    }
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $blogs = Blog::latest()->get();
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view("admin.blogs.index", compact("blogs","settings"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {


        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view("admin.blogs.create",compact("settings"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {


        // Form Validation
        $request->validate([
            "title" => "required",
            "short_detail" => "required",
            "detail" => "required",
            "image" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "posted_by" => "required",
            "posted_on" => "required",
        ]);

        try {
            $blog = new Blog();
            $blog->fill([
                "title" => $request->input("title"),
                "short_detail" => $request->input("short_detail"),
                "detail" => $request->input("detail"),
                "posted_by" => $request->input("posted_by"),
                "posted_on" => $request->input("posted_on"),
                "status" => $request->input("status"),
            ]);

            if ($request->hasFile('image')) {
                $blog->image = $this->uploadImage($request->file('image'));
            }

            $blog->save();
        } catch (QueryException $exception) {
            return redirect()
                ->back()
                ->withInput()
                ->with("error", "QueryException code: " . $exception->getCode());
        }

        return redirect()->route('blogs.index')->with("success", "Blog has been inserted successfully.");
    }

    /**
     * Display the specified resource.
     *
     * @param Blog $blog
     * @return View
     */
//    public function show(Blog $blog): View
//    {
//        return view("admin.blogs.show", compact("blog"));
//    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Blog $blog
     * @return View
     */
    public function edit(Blog $blog): View
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view("admin.blogs.edit", compact("blog","settings"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Blog $blog
     * @return RedirectResponse
     */
    public function update(Request $request, Blog $blog): RedirectResponse
    {
        // Form Validation
        $request->validate([
            "title" => "required",
            "short_detail" => "required",
            "detail" => "required",
            "image" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "posted_by" => "required",
            "posted_on" => "required",
        ]);

        $oldImagePath = $blog->__get("image");

        try {
            $blog->fill([
                "title" => $request->input("title"),
                "short_detail" => $request->input("short_detail"),
                "detail" => $request->input("detail"),
                "posted_by" => $request->input("posted_by"),
                "posted_on" => $request->input("posted_on"),
                "status" => $request->input("status"),
            ]);

            if ($request->hasFile("image")) {
                $image = $request->file("image");
                $imageName = time() . "." . $image->getClientOriginalExtension();
                $image->storeAs("uploads/blog", $imageName);
                $blog->setAttribute("image", $imageName);

                if ($request->hasFile('image')) {
                    // Delete old image if exists
                    if ($blog->image && file_exists(public_path('uploads/blog/' . $blog->image))) {
                        unlink(public_path('uploads/blog/' . $blog->image));
                    }

                    // Upload new image
                    $blog->image = $this->uploadImage($request->file('image'));
                }
            }

            $blog->save();
        } catch (QueryException $exception) {
            return redirect()->back()->with("error", "QueryException code: " . $exception->getCode());
        }

        return redirect()->route('blogs.index')->with("success", "Blog has been updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Blog $blog
     * @return RedirectResponse
     */
    public function destroy(Blog $blog): RedirectResponse
    {
        try {
            if ($blog->image && file_exists(public_path('uploads/blog/' . $blog->image))) {
                unlink(public_path('uploads/blog/' . $blog->image));
            }

            $blog->delete();
        } catch (Exception $exception) {
            return redirect()->back()->with("error", $exception->getMessage());
        }

        return redirect()->back()->with("success", "Blog has been deleted successfully.");
    }
}
