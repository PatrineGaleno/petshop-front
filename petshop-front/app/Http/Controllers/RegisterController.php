<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RegisterController extends Controller
{
    public function index(Request $request)
    {
        return view("register");
    }

    public function store(Request $request)
    {
        $data = [
            'username' => $request->username,
            'password' => $request->password,
            'email' => $request->email,
            'first_name' => $request->firstName,
            'last_name' => $request->lastName,
            'phone' => $request->phone,
            'address' => $request->address,
        ];

        
        $response = Http::timeout(30)->post('http://localhost:8000/api/v1/users/', $data);
        
        if (($response->status() != 200) && ($response->status() != 201))
        {
            $error = $response->json()['detail'] ?? $response->json()['message'] ?? 'Erro desconhecido';
            return redirect()->back()->withErrors(['message' => $error]);
        }

        return redirect()->route('login')->with('message', 'Conta criada com sucesso.');
    }
}
