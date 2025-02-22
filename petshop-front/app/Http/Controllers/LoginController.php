<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        if ($request->session()->has('auth'))
        {
            return redirect()->route('products');
        }

        return view('login');
    }

    public function store(Request $request)
    {
        $data = [
            'username' => $request->username,
            'password'=> $request->password
        ];

        $response = Http::timeout(30)->post('https://0e71-2804-a58-8046-2740-942a-4cec-3124-132b.ngrok-free.app/api/v1/auth/token/', $data);
        
        if (($response->status() != 200) && ($response->status() != 201))
        {
            $error = $response->json()['detail'] ?? $response->json()['message'] ?? 'Erro desconhecido';
            return redirect()->back()->withErrors(['message' => $error]);
        }

        session(['auth' => $response->json()]);
        return redirect()->route('products');
    }
}
