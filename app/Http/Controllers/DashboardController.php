<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Activity;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function index()
    {
        // Ambil semua aktivitas dari user yang sedang login, urutkan dari yang terbaru
        $activities = Activity::where('user_id', Auth::id())
                            ->latest()
                            ->get();

        $akademikCount = $activities->where('category_id', 1)->count();
        $nonakademikCount = $activities->where('category_id', 2)->count();
    
        return view('Pages.dashboard', compact('activities', 'akademikCount', 'nonakademikCount'));
    }
    
    //
}
