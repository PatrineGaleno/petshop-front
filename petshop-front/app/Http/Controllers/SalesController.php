<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SalesController extends Controller
{
    public function create(Request $request, int $productId)
    {
        $auth = $request->session()->get('auth');
        $token = $auth['token'] ?? null;
        if (!$token)
        {
            return redirect()->route('login');
        }

        $response = Http::withToken($token)->get("http://localhost:8000/api/v1/products/$productId/");

        if (($response->status() != 200) && ($response->status() != 201))
        {
            return redirect()->route('products');
        }

        $product = $response->json();

        return view('create-sale', compact('product'));
    }

    public function store(Request $request)
    {
        $auth = $request->session()->get('auth');
        $token = $auth['token'] ?? null;
        if (!$token)
        {
            return redirect()->route('login');
        }

        $data = [
            'product_id' => $request->productId,
            'bought_quantity' => $request->boughtQuantity,
            'payment_form' => $request->paymentForm,
        ];

        
        $response = Http::withToken($token)->post('http://localhost:8000/api/v1/sales/', $data);
        
        if (($response->status() != 200) && ($response->status() != 201))
        {
            $error = $response->json()['detail'] ?? $response->json()['message'] ?? 'Erro desconhecido';
            return redirect()->back()->withErrors(['message' => $error]);
        }

        return redirect()->route('products');
    }
}
