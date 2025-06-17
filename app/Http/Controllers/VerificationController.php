<?php

namespace App\Http\Controllers;

use App\Models\Verification;
use App\Models\Document;
use App\Models\User;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function create()
    {
        $documents = Document::all();
        $users = User::all();
        return view('verifications.create', compact('documents', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'document_id' => 'required|exists:documents,id',
            'verified_by' => 'required|exists:users,id',
            'status' => 'required|in:pending,approved,rejected',
        ]);

        Verification::create($request->all());

        return redirect()->route('verifications.create')->with('success', 'Verifikasi berhasil ditambahkan.');
    }
}
