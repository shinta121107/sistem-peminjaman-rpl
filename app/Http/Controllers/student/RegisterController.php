<?php

namespace App\Http\Controllers\student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function show()
    {
        return view('auth.register-student');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:students,email',
            'password' => 'required|min:6|confirmed',
            'nis'      => 'required|unique:students,nis',
            'class'    => 'required|string|max:50',
            'phone'    => 'required|string|max:20',
        ]);

        Student::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => Hash::make($validated['password']),
            'nis'      => $validated['nis'],
            'class'    => $validated['class'],
            'phone'    => $validated['phone'],
        ]);

        return redirect()->route('student.login')
            ->with('success','Registrasi berhasil, silakan login');
    }
}
