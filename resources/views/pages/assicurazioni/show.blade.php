@extends('layouts.main')

@section('content')
    <main>
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-12 my-3 w-50">
                    <div class="text-center my-5">
                        <h2>Dettagli Assicurazione</h2>
                    </div>

                    {{-- Card Dettagli --}}
                    <div class="card shadow-sm">
                        <div class="card-header fw-bold fs-5">
                            Contratto - {{ $assicurazione->codice_contratto }}
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <strong>Codice PDV: </strong> {{ $assicurazione->codice_pdv }}
                            </div>
                            <div class="mb-3">
                                <strong>Venditore: </strong> {{ $assicurazione->venditore }}
                            </div>
                            <div class="mb-3">
                                <strong>Attivato: </strong> {{ $assicurazione->attivato }}
                            </div>
                            <div class="mb-3">
                                <strong>Metodo Pagamento: </strong> {{ $assicurazione->metodo_pagamento }}
                            </div>
                            <div class="mb-3">
                                <strong>Data Primo Pagamento: </strong> {{ $assicurazione->dt_primo_pagamento }}
                            </div>
                            <div class="mb-3">
                                <strong>Esito Carrello: </strong>
                                {{ empty($assicurazione->esito_carrello) ? 'N/A' : $assicurazione->esito_carrello }}
                            </div>
                            <div class="mb-3">
                                <strong>Causale Cancellazione: </strong>
                                {{ empty($assicurazione->causale_cancellazione) ? 'N/A' : $assicurazione->esito_carrello }}
                            </div>
                        </div>
                    </div>

                    {{-- Bottone ritorno --}}
                    <div class="text-center">
                        <a href="{{ url()->previous() }}" class="btn btn-lg btn-primary mt-3">Indietro</a>
                    </div>

                </div>
            </div>
        </div>
    </main>
@endsection
