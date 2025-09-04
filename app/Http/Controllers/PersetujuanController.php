<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use Illuminate\Support\Facades\Auth;

class PersetujuanController extends Controller
{
    public function index()
    {
        $activities = Activity::with(['user', 'category'])->get();
        $activities = Activity::where('user_id', Auth::id())->get();
        return view('user.persetujuanadmin', compact('activities'));
    }
}

