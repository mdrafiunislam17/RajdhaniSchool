<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Database\QueryException;

class ReviewController extends Controller
{
    // review


    private function uploadImage($image): string
        {
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/review'), $imageName);
            return $imageName;
        }


    public function index()
    {
        $review = Review::latest()->get();
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view('admin.review.index',compact('review','settings'));
    }

    public function create()
        {
            $settings = Setting::query()->pluck("value", "setting_name")->toArray();
            return view('admin.review.create',compact('settings'));

        }

    public function store(Request $request)
    {
        // Form Validation
        $request->validate([
            "name" => "required",
            "image" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",

        ]);

        try {
            $review = new Review();
            $review->fill([
                "name" => $request->input("name"),
                "email" => $request->input("email"),
                "message" => $request->input("message"),
                "rating" => $request->input("rating"),
            ]);

           if ($request->hasFile('image')) {
                $review->image = $this->uploadImage($request->file('image'));
            }


            $review->save();
        } catch (QueryException $exception) {
            return redirect()
                ->back()
                ->withInput()
                ->with("error", "QueryException code: " . $exception->getCode());
        }

        return redirect()->route('review.index')->with("success", "review has been inserted successfully.");
    }

       public function edit(Review $review)
        {
            $settings = Setting::query()->pluck("value", "setting_name")->toArray();
            return view('admin.review.edit',compact('review','settings'));

        }


        public function update(Request $request, Review $review)
            {
                // Validate input
                $request->validate([
                    "name" => "required",
                    "image" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
                ]);

                try {
                    $review->fill([
                             "name" => $request->input("name"),
                            "email" => $request->input("email"),
                            "message" => $request->input("message"),
                            "rating" => $request->input("rating"),
                    ]);

                    if ($request->hasFile('image')) {
                        // Delete old image if exists
                        if ($review->image && file_exists(public_path('uploads/reviews/' . $review->image))) {
                            unlink(public_path('uploads/reviews/' . $review->image));
                        }

                        // Upload new image
                        $review->image = $this->uploadImage($request->file('image'));
                    }

                    $review->save();

                } catch (\Exception $e) {
                    return redirect()
                        ->back()
                        ->withInput()
                        ->with('error', 'Failed to update review. Error: ' . $e->getMessage());
                }

                return redirect()->route('review.index')->with('success', 'review updated successfully.');
            }


    public function show(Review $review)
        {
            $settings = Setting::query()->pluck("value", "setting_name")->toArray();
            return view('admin.review.show',compact('review','settings'));

        }


        public function destroy(Review $review)
        {
            try {
                // Remove image file if exists
                if ($review->image && file_exists(public_path('uploads/reviews/' . $review->image))) {
                    unlink(public_path('uploads/reviews/' . $review->image));
                }

                $review->delete();

            } catch (\Exception $e) {
                return redirect()
                    ->back()
                    ->with('error', 'Failed to delete review. Error: ' . $e->getMessage());
            }

            return redirect()->route('review.index')->with('success', 'review deleted successfully.');
        }
}
