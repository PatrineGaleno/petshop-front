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

        $response = Http::withToken($token)->timeout(30)->get('https://0e71-2804-a58-8046-2740-942a-4cec-3124-132b.ngrok-free.app/api/v1/products/');

        $products = $response->successful() ? $response->json() : $response;

        return view('products', compact('products'));
    }
}
