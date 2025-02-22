<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        $auth = $request->session()->get('auth');
        $token = $auth['token'] ?? null;
        if (!$token)
        {
            return redirect()->route('login');
        }

        $response = Http::withToken($token)->timeout(30)->get('http://localhost:8000/api/v1/products/');

        $products = $response->successful() ? $response->json() : [];

        return view('products', compact('products'));
    }
}
