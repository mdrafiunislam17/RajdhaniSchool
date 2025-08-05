<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Setting;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class EventController extends Controller
{
    private function uploadImage($image, $folder = 'uploads/event'): string
    {
        $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path($folder), $imageName);
        return $imageName;
    }

    public function index(): View
    {
        $events = Event::all();
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view("admin.events.index", compact("events", "settings"));
    }

    public function create(): View
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view("admin.events.create", compact('settings'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            "event_name" => "required",
            "location" => "required",
            "event_date" => "required|date",
            "start_time" => "required",
            "end_time" => "required",
            "email" => "nullable|email",
            "phone" => "nullable",
            "short_description" => "required",
            "description" => "required",
            "image" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "gallery.*" => "nullable|image|mimes:jpeg,png,jpg,gif|max:2048",
        ]);

        try {
            $event = new Event();
            $event->fill([
                "event_name" => $request->input("event_name"),
                "location" => $request->input("location"),
                "event_date" => $request->input("event_date"),
                "start_time" => $request->input("start_time"),
                "end_time" => $request->input("end_time"),
                "email" => $request->input("email"),
                "phone" => $request->input("phone"),
                "location_map" => $request->input("location_map"),
                "short_description" => $request->input("short_description"),
                "description" => $request->input("description"),
                "status" => $request->input("status"),
            ]);

            if ($request->hasFile('image')) {
                $event->image = $this->uploadImage($request->file('image'));
            }

            if ($request->hasFile("gallery")) {
                $gallery = [];
                foreach ($request->file("gallery") as $image) {
                    $imageName = $this->uploadImage($image);
                    $gallery[] = $imageName;
                }
                $event->gallery = json_encode($gallery);
            }

            $event->save();
        } catch (QueryException $exception) {
            return redirect()
                ->back()
                ->withInput()
                ->with("error", "QueryException code: " . $exception->getCode());
        }

        return redirect()->route('events.index')->with("success", "Event has been inserted successfully.");
    }

    public function edit(Event $event): View
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view("admin.events.edit", compact("event", "settings"));
    }

    public function update(Request $request, Event $event): RedirectResponse
    {
        $request->validate([
            "event_name" => "required",
            "location" => "required",
            "event_date" => "required|date",
            "start_time" => "required",
            "end_time" => "required",
            "email" => "nullable|email",
            "phone" => "nullable",
            "short_description" => "required",
            "description" => "required",
            "image" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "gallery.*" => "nullable|image|mimes:jpeg,png,jpg,gif|max:2048",
        ]);

        try {
            $event->fill([
                "event_name" => $request->input("event_name"),
                "location" => $request->input("location"),
                "event_date" => $request->input("event_date"),
                "start_time" => $request->input("start_time"),
                "end_time" => $request->input("end_time"),
                "email" => $request->input("email"),
                "phone" => $request->input("phone"),
                "location_map" => $request->input("location_map"),
                "short_description" => $request->input("short_description"),
                "description" => $request->input("description"),
                "status" => $request->input("status"),
            ]);

            if ($request->hasFile('image')) {
                if ($event->image && file_exists(public_path('uploads/event/' . $event->image))) {
                    unlink(public_path('uploads/event/' . $event->image));
                }
                $event->image = $this->uploadImage($request->file('image'));
            }

            // Handle gallery update
            $oldGallery = json_decode($event->gallery ?? '[]');
            $hiddenGallery = $request->input("hidden_gallery", []);
            $toDelete = array_diff($oldGallery, $hiddenGallery);

            foreach ($toDelete as $img) {
                $path = public_path('uploads/event/' . $img);
                if (file_exists($path)) {
                    unlink($path);
                }
            }

            $newGallery = $hiddenGallery;

            if ($request->hasFile("gallery")) {
                foreach ($request->file("gallery") as $image) {
                    $imageName = $this->uploadImage($image);
                    $newGallery[] = $imageName;
                }
            }

            if (!empty($newGallery)) {
                $event->gallery = json_encode($newGallery);
            }

            $event->save();
        } catch (QueryException $exception) {
            return redirect()->back()->with("error", "QueryException code: " . $exception->getCode());
        }

        return redirect()->route('events.index')->with("success", "Event has been updated successfully.");
    }

    public function destroy(Event $event): RedirectResponse
    {
        try {
            if ($event->image && file_exists(public_path('uploads/event/' . $event->image))) {
                unlink(public_path('uploads/event/' . $event->image));
            }

            $gallery = json_decode($event->gallery ?? '[]');
            foreach ($gallery as $img) {
                $path = public_path('uploads/event/' . $img);
                if (file_exists($path)) {
                    unlink($path);
                }
            }

            $event->delete();
        } catch (Exception $exception) {
            return redirect()->back()->with("error", $exception->getMessage());
        }

        return redirect()->back()->with("success", "Event has been deleted successfully.");
    }
}
