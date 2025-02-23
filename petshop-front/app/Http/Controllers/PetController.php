<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PetController extends Controller
{
    public function index(Request $request)
    {
        $auth = $request->session()->get('auth');
        $token = $auth['token'] ?? null;
        if (!$token)
        {
            return redirect()->route('login');
        }

        $response = Http::withToken($token)->timeout(30)->get(config('app.api_url') . '/api/v1/pets/?status=A');

        $pets = $response->successful() ? $response->json() : [];

        return view('pets', compact('pets'));
    }
}
