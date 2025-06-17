<?php

namespace App\Http\Controllers;


use App\Models\Activity;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category; // Pastikan ini di-import

class ActivityController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        return view('activities.create', compact('categories'));
    }

public function store(Request $request)
{
    $request->validate([
        'user_id' => 'required',
        'category_id' => 'required|exists:categories,id',
        'title' => 'required|string',
        'description' => 'required|string',
        'date' => 'required|date',
    ]);

    $activity = Activity::create([
        'user_id' => $request->user_id,
        'category_id' => $request->category_id,
        'title' => $request->title,
        'description' => $request->description,
        'date' => $request->date,
        'status' => 'menunggu'
    ]);

    // Ambil nama kategori
    $categoryName = $activity->category->name;

    if ($categoryName === 'Akademik') {
        return redirect()->route('dokumen.akademik')->with('success', 'Kegiatan akademik berhasil ditambahkan.');
    } elseif ($categoryName === 'Nonakademik') {
        return redirect()->route('dokumen.nonakademik')->with('success', 'Kegiatan non-akademik berhasil ditambahkan.');
    }

    // Fallback kalau kategori tidak cocok
    return redirect('/')->with('success', 'Kegiatan berhasil ditambahkan.');
}
public function tambahKegiatanView(Request $request)
{
    $selectedCategory = $request->query('category'); // Ambil dari URL ?category=2

    // Ambil kategori untuk form
    $categories = Category::all();

    // Tampilkan data kegiatan user yang sedang login
    $activities = Activity::with(['category'])
        ->where('user_id', Auth::id())
        ->get();

    return view('tambahkegiatan', compact('activities', 'categories', 'selectedCategory'));
}



public function showByCategory(Request $request)
{
    $categoryId = $request->query('category');

    // Ambil kegiatan berdasarkan kategori
    $activities = Activity::with(['user', 'category'])
                    ->where('category_id', $categoryId)
                    ->orderBy('created_at', 'desc')
                    ->get();

    $category = Category::find($categoryId); // untuk ditampilkan di judul jika mau
    return view('data', compact('activities', 'category'));
}

public function approve($id)
{
    $activity = Activity::findOrFail($id);
    $activity->status = 'approved';
    $activity->save();

    return redirect()->back()->with('success', 'Kegiatan disetujui.');
}

public function reject($id)
{
    $activity = Activity::findOrFail($id);
    $activity->status = 'rejected';
    $activity->save();

    return redirect()->back()->with('success', 'Kegiatan ditolak.');
}

public function update(Request $request, $id)
{
    // Validasi input
    $request->validate([
        'status' => 'required|in:disetujui,ditolak',
    ]);

    // Temukan aktivitas berdasarkan ID
    $activity = Activity::findOrFail($id);

    // Perbarui status
    $activity->status = $request->status;
    $activity->save();

    // Redirect balik ke halaman admin
    return redirect()->route('admin.dashboard')->with('success', 'Status kegiatan diperbarui.');
}





}

