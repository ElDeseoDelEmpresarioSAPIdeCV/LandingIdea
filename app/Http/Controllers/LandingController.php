<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;

class LandingController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }

    public function index()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'nullable|string|max:15',
            'email' => 'required|email',
            'stage' => 'required'
        ]);

        Registration::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone ?? null,  // Si no se envía, será NULL
            'email' => $request->email,
            'stage' => $request->stage
        ]);

        return redirect()->back()->with('success', '¡Registro exitoso!');
    }
}
