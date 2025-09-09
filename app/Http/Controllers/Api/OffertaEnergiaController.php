<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\OffertaEnergia;
use Illuminate\Http\Request;

class OffertaEnergiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = OffertaEnergia::query();

        if (filled(request('codice_contratto'))) {
            $query->where('codice_contratto', request('codice_contratto'));
        }

        if (filled(request('codice_pdv'))) {
            $codici = explode(',', request('codice_pdv'));
            $query->whereIn('codice_pdv', $codici);
        }

        if (filled(request('codice_contratto')) || filled(request('codice_pdv'))){
            $offertaEnergia = $query->orderBy('id', 'asc')->get();
        } else {
            $offertaEnergia = $query->orderBy('id', 'asc')->paginate(200);
        }

        return response()->json($offertaEnergia, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function checkLastUpdatedDate(Request $request){

        $codici = $request->input('codici_pdv');

        if(!is_array($codici) || empty($codici)){
            return response()->json([
                'error' => 'Il campo codici_pdv è obbligatorio e deve essere un array.'
            ],422);
        }

        $ultimaDataAggiornata = OffertaEnergia::whereIn('codice_pdv', $codici)
        ->selectRaw('codice_pdv, MAX(updated_at) as updated_at')
        ->groupBy('codice_pdv')
        ->pluck('updated_at', 'codice_pdv');

        return response()->json([
            'updated_at' => $ultimaDataAggiornata
        ],200);
    }
}