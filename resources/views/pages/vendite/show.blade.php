@extends('layouts.main')

{{-- Font Awesome CDN --}}
@section('links')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
    <main>

        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-12 my-3 ">

                    {{-- Header Main --}}
                    <div class="text-center my-5">
                        <h2>Dettagli Vendita:
                            {{ $vendita->codice_esterno }}
                        </h2>

                        <div class="my-4">
                            <h5>
                                "{{ $vendita->attivita->ragioneSociale->organizzazione->subdir }}" -
                                "{{ $vendita->attivita->ragioneSociale->azienda }}" -
                                "{{ $vendita->attivita->nominativo }}"
                            </h5>
                        </div>
                    </div>

                    {{-- Tabella Articoli --}}
                    @include('pages.vendite.partials.articoli')

                    {{-- Tabella Addetto --}}
                    @include('pages.vendite.partials.addetto')

                    {{-- Bottone ritorno --}}
                    <div class="text-center">
                        <a href="{{ url()->previous() }}" class="btn btn-lg btn-primary mt-3">Indietro</a>
                    </div>

                </div>
            </div>
        </div>

    </main>
@endsection
