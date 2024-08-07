<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Notifications\WelcomeEmailNotification;

class ReportRegistrationController extends Controller
{
    public function showRegistrationForm()
    {
        return view('pengaduan/register');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // Kirim email selamat datang
        Mail::to($user->email)->send(new WelcomeEmailNotification());

        return redirect()->route('login')->with('success', 'Akun berhasil dibuat. Silakan login.');
    }
}
