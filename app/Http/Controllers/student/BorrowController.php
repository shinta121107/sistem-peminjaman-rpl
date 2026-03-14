<?php

namespace App\Http\Controllers\student;

use App\Models\Borrow;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BorrowController extends Controller
{
    /**
     * Menampilkan list peminjaman milik student yang sedang login.
     */
    public function index()
    {
        $student = Auth::guard('student')->user();
        $borrows = Borrow::with(['item', 'officer', 'return'])
            ->where('student_id', $student->id)
            ->latest()
            ->get();

        return view('student.borrows.index', compact('borrows'));
    }

    /**
     * Menampilkan detail peminjaman (hanya milik student yang login).
     */
    public function show(Borrow $borrow)
    {
        $student = Auth::guard('student')->user();

        if ($borrow->student_id !== $student->id) {
            abort(403, 'Unauthorized action.');
        }

        $borrow->load(['item', 'officer', 'return']);

        return view('student.borrows.show', compact('borrow'));
    }
}
