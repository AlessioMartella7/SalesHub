<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PowerBIController extends Controller
{
        public function getDatiUtente(): JsonResponse
    {
        $user = auth()->user();

        return response()->json([
            'email' => $user->email,
            'nome' => $user->name,
            'organizzazione' => $user->organizzazione->id,
            'dati' => 'dati simulati da aggiungere in risposta',
        ]);
    }
}