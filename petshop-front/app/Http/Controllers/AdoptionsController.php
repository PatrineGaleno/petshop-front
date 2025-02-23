<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AdoptionsController extends Controller
{
    public function create(Request $request, int $petId)
    {
        $auth = $request->session()->get('auth');
        $token = $auth['token'] ?? null;
        if (!$token)
        {
            return redirect()->route('login');
        }

        $response = Http::withToken($token)->get(config('app.api_url') . "/api/v1/pets/$petId/");

        if (($response->status() != 200) && ($response->status() != 201))
        {
            return redirect()->route('pets');
        }

        $pet = $response->json();

        return view('create-adoption', compact('pet'));
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
            'pet_id' => $request->petId,
        ];

        
        $response = Http::withToken($token)->post(config('app.api_url') . '/api/v1/adoptions/', $data);
        
        if (($response->status() != 200) && ($response->status() != 201))
        {
            $error = $response->json()['detail'] ?? $response->json()['message'] ?? 'Erro desconhecido';
            return redirect()->back()->withErrors(['message' => $error]);
        }

        return redirect()->route('pets')->with('message', 'A sua solicitação está sendo processada. Aguarde um administrador analisá-la.');
    }

    public function history(Request $request)
    {
        $auth = $request->session()->get('auth');
        $token = $auth['token'] ?? null;
        if (!$token)
        {
            return redirect()->route('login');
        }

        $userId = $auth['user']['id'];

        $response = Http::withToken($token)->get(config('app.api_url') . "/api/v1/adoptions/?customer_id=$userId");

        if (($response->status() != 200) && ($response->status() != 201))
        {
            return redirect()->route('pets');
        }

        $adoptions = $response->json();

        return view('adoptions-history', compact('adoptions'));
    }
}
