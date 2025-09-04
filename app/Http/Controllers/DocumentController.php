<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\Activity;
use App\Models\Category;

class DocumentController extends Controller
{
    // Dokumen Akademik
    public function akademik()
    {
        $documents = Document::with(['activity', 'category'])
            ->whereHas('category', function ($query) {
                $query->where('name', 'akademik'); // sesuaikan dengan nama kategori
            })
            ->latest()
            ->get();

        $activities = Activity::all();
        $categories = Category::all();

        return view('user.dokumenakademik', compact('documents', 'activities', 'categories'));
    }

    // Dokumen Non-Akademik
    public function nonakademik()
    {
        $documents = Document::with(['activity', 'category'])
            ->whereHas('category', function ($query) {
                $query->where('name', 'non-akademik'); // sesuaikan juga
            })
            ->latest()
            ->get();

        $activities = Activity::all();
        $categories = Category::all();

        return view('user.dokumennonakademik', compact('documents', 'activities', 'categories'));
    }

    // Menyimpan dokumen baru
    public function store(Request $request)
    {
        $request->validate([
            'activity_id' => 'required|exists:activities,id',
            'category_id' => 'required|exists:categories,id',
            'file' => 'required|file|mimes:pdf,jpg,png,docx|max:2048',
        ]);

        // Simpan file
        $fileName = $request->file('file')->store('documents', 'documents');

        // Simpan data ke database
        $document = Document::create([
            'activity_id' => $request->activity_id,
            'category_id' => $request->category_id,
            'file_name' => $fileName,
        ]);

        // Ambil nama kategori dari relasi
        $categoryName = $document->category->name;

        // Arahkan sesuai kategori
        if ($categoryName === 'akademik') {
            return redirect()->route('dokumen.akademik')->with('success', 'Dokumen akademik berhasil diunggah.');
        } elseif ($categoryName === 'non-akademik') {
            return redirect()->route('dokumen.nonakademik')->with('success', 'Dokumen non-akademik berhasil diunggah.');
        }

        // Arahkan ke dashboard jika tidak cocok
        return redirect()->route('dashboard')->with('success', 'Dokumen berhasil diunggah.');
    }
}
