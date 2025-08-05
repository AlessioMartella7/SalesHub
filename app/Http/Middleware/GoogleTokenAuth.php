<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

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

        if (!$response->successful()) {
            return response()->json(['error' => 'Token Google non valido'], 401);
        }

        $googleUser = $response->json();

        $user = User::where('google_id', $googleUser['sub'])->first();

        if (!$user) {
            return response()->json(['error' => 'Utente non registrato nel sistema'], 403);
        }

        // Autentica l’utente per la durata della richiesta
        auth()->setUser($user);
        return $next($request);
    }
}