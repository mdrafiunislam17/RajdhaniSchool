<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Result;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ResultController extends Controller
{
    //

    // Upload paths
    const IMAGE_PATH = 'uploads/result/';
    const PDF_PATH = 'uploads/result/pdf/';

    /**
     * Display a listing of results
     */
    public function index()
    {
        $result = Result::latest()->paginate(10);
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view('admin.result.index', compact('result', 'settings'));
    }

    /**
     * Show the form for creating a new result
     */
    public function create()
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view('admin.result.create', compact('settings'));
    }

    /**
     * Store a newly created result
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "title" => "required|string|max:255|unique:results,title",
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

            Result::create($data);

            return redirect()->route('result.index')
                ->with("success", "Result created successfully.");

        } catch (\Exception $e) {
            return back()->withInput()
                ->with("error", "Error creating result: " . $e->getMessage());
        }
    }

    /**
     * Show the form for editing the result
     */
    public function edit(Result $result)
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view('admin.result.edit', compact('result', 'settings'));
    }

    /**
     * Update the specified result
     */
    public function update(Request $request, Result $result)
    {
        $validated = $request->validate([
            "title" => [
                "required",
                "string",
                "max:255",
                Rule::unique('results')->ignore($result->id)
            ],
            "description" => "nullable|string",
            "image" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "pdf" => "nullable|mimes:pdf|max:10000",
            "status" => "required",
        ]);

        try {
            $data = $request->only(['title', 'description', 'status']);

            if ($request->hasFile('image')) {
                $this->deleteFile($result->image, self::IMAGE_PATH);
                $data['image'] = $this->uploadFile($request->file('image'), self::IMAGE_PATH);
            }

            if ($request->hasFile('pdf')) {
                $this->deleteFile($result->pdf, self::PDF_PATH);
                $data['pdf'] = $this->uploadFile($request->file('pdf'), self::PDF_PATH);
            }

            $result->update($data);

            return redirect()->route('result.index')
                ->with("success", "Result updated successfully.");

        } catch (\Exception $e) {
            return back()->withInput()
                ->with("error", "Error updating result: " . $e->getMessage());
        }
    }

    /**
     * Remove the specified result
     */
    public function destroy(Result $result)
    {
        try {
            $this->deleteFile($result->image, self::IMAGE_PATH);
            $this->deleteFile($result->pdf, self::PDF_PATH);

            $result->delete();

            return redirect()->route('result.index')
                ->with("success", "Result deleted successfully.");

        } catch (\Exception $e) {
            return back()->with("error", "Error deleting result: " . $e->getMessage());
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
