<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class GoogleTokenAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
                $authHeader = $request->header('Authorization');

        if (!$authHeader || !str_starts_with($authHeader, 'Bearer ')) {
            return response()->json(['error' => 'Token mancante'], 401);
        }

        $token = str_replace('Bearer ', '', $authHeader);

        $response = Http::withToken($token)
            ->get('https://www.googleapis.com/oauth2/v3/userinfo');

        // Log dell'intera risposta JSON di Google DA RIMUOVERE IN PRODUZIONE SOLO SCOPO TEST
        Log::debug('[PowerBI] User info da Google:', $response->json());

        if (!$response->successful()) {
            return response()->json(['error' => 'Token Google non valido'], 401);
        }

        $googleUser = $response->json();

        $user = User::where('google_id', $googleUser['sub'])->first();

        if (!$user) {
        // Se non lo trovo per google_id, provo a cercare per email
            $user = User::where('email', $googleUser['email'])->first();

            if ($user) {
            // Se trovato per email, salvo google_id
            $user->google_id = $googleUser['sub'];
            $user->save();
            } else {
            // Qui puoi decidere se creare un nuovo utente o bloccare la richiesta
            return response()->json(['error' => 'Utente non registrato nel sistema'], 403);
        }
    }
        // LOG DA RIMUOVERE IN PRODUZIONE SOLO SCOPO TEST
        Log::info('[PowerBI] Utente autenticato in Laravel:', [
            'id' => $user->id,
            'email' => $user->email,
            'google_id' => $user->google_id,
        ]);

        // Autentica l’utente per la durata della richiesta
        auth()->setUser($user);
        return $next($request);
    }
}
