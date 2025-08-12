<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Syllabus;
use Illuminate\Validation\Rule;
class SyllabusController extends Controller
{
    //


    // Upload paths
    const IMAGE_PATH = 'uploads/syllabi/';
    const PDF_PATH = 'uploads/syllabi/pdf/';

    /**
     * Display a listing of syllabuss
     */
    public function index()
    {
        $syllabus = Syllabus::latest()->paginate(10);
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view('admin.syllabus.index', compact('syllabus', 'settings'));
    }

    /**
     * Show the form for creating a new syllabus
     */
    public function create()
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view('admin.syllabus.create', compact('settings'));
    }

    /**
     * Store a newly created syllabus
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "title" => "required|string|max:255|unique:syllabi,title",
            "description" => "nullable|string",
            "image" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "pdf" => "nullable|mimes:pdf|max:10000",
            "status" => "required",
        ]);

        try {
            $data = $request->only(['title', 'description', 'status']);

            if ($request->hasFile('image')) {
                $data['image'] = $this->uploadFile($request->file('image'), self::IMAGE_PATH);
            }

            if ($request->hasFile('pdf')) {
                $data['pdf'] = $this->uploadFile($request->file('pdf'), self::PDF_PATH);
            }

            Syllabus::create($data);

            return redirect()->route('syllabus.index')
                ->with("success", "syllabus created successfully.");

        } catch (\Exception $e) {
            return back()->withInput()
                ->with("error", "Error creating syllabus: " . $e->getMessage());
        }
    }

    /**
     * Show the form for editing the syllabus
     */
    public function edit(Syllabus $syllabus)
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view('admin.syllabus.edit', compact('syllabus', 'settings'));
    }

    /**
     * Update the specified syllabus
     */
    public function update(Request $request, Syllabus $syllabus)
    {
        $validated = $request->validate([
            "title" => [
                "required",
                "string",
                "max:255",
                Rule::unique('syllabi')->ignore($syllabus->id)
            ],
            "description" => "nullable|string",
            "image" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "pdf" => "nullable|mimes:pdf|max:10000",
            "status" => "required",
        ]);

        try {
            $data = $request->only(['title', 'description', 'status']);

            if ($request->hasFile('image')) {
                $this->deleteFile($syllabus->image, self::IMAGE_PATH);
                $data['image'] = $this->uploadFile($request->file('image'), self::IMAGE_PATH);
            }

            if ($request->hasFile('pdf')) {
                $this->deleteFile($syllabus->pdf, self::PDF_PATH);
                $data['pdf'] = $this->uploadFile($request->file('pdf'), self::PDF_PATH);
            }

            $syllabus->update($data);

            return redirect()->route('syllabus.index')
                ->with("success", "syllabus updated successfully.");

        } catch (\Exception $e) {
            return back()->withInput()
                ->with("error", "Error updating syllabus: " . $e->getMessage());
        }
    }

    /**
     * Remove the specified syllabus
     */
    public function destroy(Syllabus $syllabus)
    {
        try {
            $this->deleteFile($syllabus->image, self::IMAGE_PATH);
            $this->deleteFile($syllabus->pdf, self::PDF_PATH);

            $syllabus->delete();

            return redirect()->route('syllabus.index')
                ->with("success", "syllabus deleted successfully.");

        } catch (\Exception $e) {
            return back()->with("error", "Error deleting syllabus: " . $e->getMessage());
        }
    }

    /**
     * Upload file to specified path
     */
    private function uploadFile($file, string $path): string
    {
        $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path($path), $fileName);
        return $fileName;
    }

    /**
     * Delete file if exists
     */
    private function deleteFile(?string $fileName, string $path): void
    {
        if ($fileName && file_exists(public_path($path . $fileName))) {
            unlink(public_path($path . $fileName));
        }
    }
}
