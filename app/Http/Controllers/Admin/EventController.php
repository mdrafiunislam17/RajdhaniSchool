<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\Event;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Exception;
class EventController extends Controller
{
    //



 private function uploadImage($image): string
{
    $imageName = time() . '.' . $image->getClientOriginalExtension();
    $image->move(public_path('uploads/event'), $imageName);
    return $imageName;
}

private function galleryImage($image): string
{
    $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
    $image->move(public_path('uploads/gallery'), $imageName);
    return $imageName;
}



    public function index()
    {
        $events = Event::latest()->get();
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view('admin.events.index', compact('events','settings'));
    }
    public function create()
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view('admin.events.create',compact('settings'));
    }

   public function store(Request $request)
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

        $galleryImages = [];
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $galleryImage) {
                $galleryImages[] = $this->galleryImage($galleryImage);
            }
        }

        $event->gallery = json_encode($galleryImages); // ✅ FIX: Store as JSON string

        $event->save();

        return redirect()->route('events.index')
            ->with('success', 'Event created successfully.');
    } catch (Exception $e) {
        Log::error('Event creation failed', [
            'error' => $e->getMessage(),
            'request' => $request->all(),
        ]);

        return redirect()->back()->withInput()->with('error', 'Error: ' . $e->getMessage());
    }
}



    public function edit(Event $event)
    {
          $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view('admin.events.edit', compact('event','settings'));
    }
    public function update(Request $request, Event $event)
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
        // Fill base attributes
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

        // Handle main image upload
        if ($request->hasFile('image')) {
            $oldImagePath = public_path('uploads/events/' . $event->image);
            if (!empty($event->image) && file_exists($oldImagePath)) {
                unlink($oldImagePath);
                Log::info("Old event image deleted: {$oldImagePath}");
            }

            $event->image = $this->uploadImage($request->file('image'));
        }

        // Handle gallery images
        $galleryImages = is_array(json_decode($event->gallery, true)) ? json_decode($event->gallery, true) : [];

        if ($request->hasFile('gallery')) {
            // Optionally: remove old gallery images here if required

            foreach ($request->file('gallery') as $galleryImage) {
                $galleryImages[] = $this->galleryImage($galleryImage);
            }
        }

        $event->gallery = json_encode($galleryImages); // Safe JSON storage

        $event->save();

        return redirect()->route('events.index')
            ->with('success', 'Event updated successfully.');

    } catch (Exception $e) {
        Log::error('Event update failed', [
            'event_id' => $event->id,
            'user_id' => auth()->id(),
            'error' => $e->getMessage(),
        ]);

        return redirect()->back()->withInput()->with('error', 'Error: ' . $e->getMessage());
    }
}

  public function destroy(Event $event)
{
    try {
        // Delete main image if exists
        if (!empty($event->image)) {
            $mainImagePath = public_path('uploads/events/' . $event->image);
            if (file_exists($mainImagePath)) {
                unlink($mainImagePath);
                Log::info("Main image deleted: {$mainImagePath}");
            }
        }

        // Delete gallery images if exist
        $galleryImages = is_array($event->gallery) ? $event->gallery : json_decode($event->gallery, true);
        if (!empty($galleryImages) && is_array($galleryImages)) {
            foreach ($galleryImages as $image) {
                $galleryImagePath = public_path('uploads/gallery/' . $image);
                if (file_exists($galleryImagePath)) {
                    unlink($galleryImagePath);
                    Log::info("Gallery image deleted: {$galleryImagePath}");
                }
            }
        }

        // Delete event record
        $event->delete();

        return redirect()->route('events.index')->with('success', 'Event deleted successfully.');

    } catch (\Exception $e) {
        Log::error('Event deletion failed', [
            'event_id' => $event->id,
            'user_id' => auth()->id(),
            'error' => $e->getMessage(),
        ]);

        return redirect()->back()->with('error', 'Error deleting event: ' . $e->getMessage());
    }
}

}
