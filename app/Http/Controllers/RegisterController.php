<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'judul' => 'Register',
            'active' => 'register'
        ]);
    }

    public function store (Request $request)
    {
        $validatedData = $request -> validate([
            'name' => 'required|max:255',
            'username' => ['required', 'max:255', 'min:5', 'unique:users'],
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|max:255|min:5'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect('/masuk')->with('berhasil', 'Registrasi berhasil!! Silahkan login');
    }
}
