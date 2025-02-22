<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SalesController extends Controller
{
    public function index(Request $request, int $productId)
    {
        if (!$request->session()->has('auth'))
        {
            return redirect()->route('login');
        }

        $auth = $request->session()->get('auth');
        $token = $auth['token'];

        $response = Http::withToken($token)->get('https://0e71-2804-a58-8046-2740-942a-4cec-3124-132b.ngrok-free.app/api/v1/products/$productId');

        $products = $response->successful() ? $response->json() : $response;

        return view('sales', compact('products'));
    }
}
