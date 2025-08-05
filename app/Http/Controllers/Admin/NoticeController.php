<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notice;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class NoticeController extends Controller
{
    // Upload paths
    const IMAGE_PATH = 'uploads/notice/';
    const PDF_PATH = 'uploads/pdf/';

    /**
     * Display a listing of notices
     */
    public function index()
    {
        $notice = Notice::latest()->paginate(10);
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view('admin.notice.index', compact('notice', 'settings'));
    }

    /**
     * Show the form for creating a new notice
     */
    public function create()
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view('admin.notice.create', compact('settings'));
    }

    /**
     * Store a newly created notice
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "title" => "required|string|max:255|unique:notices,title",
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

            Notice::create($data);

            return redirect()->route('notice.index')
                ->with("success", "Notice created successfully.");

        } catch (\Exception $e) {
            return back()->withInput()
                ->with("error", "Error creating notice: " . $e->getMessage());
        }
    }

    /**
     * Show the form for editing the notice
     */
    public function edit(Notice $notice)
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view('admin.notice.edit', compact('notice', 'settings'));
    }

    /**
     * Update the specified notice
     */
    public function update(Request $request, Notice $notice)
    {
        $validated = $request->validate([
            "title" => [
                "required",
                "string",
                "max:255",
                Rule::unique('notices')->ignore($notice->id)
            ],
            "description" => "nullable|string",
            "image" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "pdf" => "nullable|mimes:pdf|max:10000",
            "status" => "required",
        ]);

        try {
            $data = $request->only(['title', 'description', 'status']);

            if ($request->hasFile('image')) {
                $this->deleteFile($notice->image, self::IMAGE_PATH);
                $data['image'] = $this->uploadFile($request->file('image'), self::IMAGE_PATH);
            }

            if ($request->hasFile('pdf')) {
                $this->deleteFile($notice->pdf, self::PDF_PATH);
                $data['pdf'] = $this->uploadFile($request->file('pdf'), self::PDF_PATH);
            }

            $notice->update($data);

            return redirect()->route('notice.index')
                ->with("success", "Notice updated successfully.");

        } catch (\Exception $e) {
            return back()->withInput()
                ->with("error", "Error updating notice: " . $e->getMessage());
        }
    }

    /**
     * Remove the specified notice
     */
    public function destroy(Notice $notice)
    {
        try {
            $this->deleteFile($notice->image, self::IMAGE_PATH);
            $this->deleteFile($notice->pdf, self::PDF_PATH);

            $notice->delete();

            return redirect()->route('notice.index')
                ->with("success", "Notice deleted successfully.");

        } catch (\Exception $e) {
            return back()->with("error", "Error deleting notice: " . $e->getMessage());
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
