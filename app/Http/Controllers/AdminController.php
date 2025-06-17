<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $activities = Activity::with(['user', 'category'])->latest()->get();

        // Hitung jumlah akun mahasiswa
        $jumlahMahasiswa = User::where('role', 'user')->count(); // Pastikan kamu punya kolom 'role'

        return view('admin', compact('activities', 'jumlahMahasiswa'));
    }
}


