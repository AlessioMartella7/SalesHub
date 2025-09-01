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

                        <div class="my-4 fs-5 fw-bold">
                            "{{ $vendita->organizzazione->subdir }}" -
                            "{{ $vendita->ragioneSociale->azienda }}" -
                            "{{ $vendita->attivita->nominativo }}"
                        </div>
                    </div>

                    <div class="col-12 my-4">
                        <table class="table table-bordered border-dark">
                            <thead>
                                <tr class="fw-bold fs-4 text-center ">
                                    <th colspan="6" class="table-secondary border-dark">
                                        <h3>Dettagli</h3>
                                    </th>
                                </tr>
                                <tr class="fw-bold fs-5 text-center table-light border-dark ">
                                    <th>Data Inizio</th>
                                    <th>Data Fine</th>
                                    <th>Data Scontrino</th>
                                    <th>Codice Lotteria</th>
                                    <th>Totale Imponibile</th>
                                    <th>Totale</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-center">
                                    <td>{{ $vendita->data_inizio }}</td>
                                    <td>{{ $vendita->data_fine }}</td>
                                    <td>{{ $vendita->data_scontrino ?? '-' }}</td>
                                    <td>{{ $vendita->codice_lotteria ?? '-' }}</td>
                                    <td>{{ $vendita->totale_imponibile }} €</td>
                                    <td>{{ $vendita->totale }} €</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    {{-- Tabella Articoli --}}
                    @include('pages.vendite.partials.articoli')

                    {{-- Tabella Addetto --}}
                    @include('pages.vendite.partials.addetto')

                    {{-- Tabella Cliente --}}
                    @include('pages.vendite.partials.cliente')

                    {{-- Tabella Pagamento --}}
                    @include('pages.vendite.partials.pagamento')

                    {{-- Bottone ritorno --}}
                    <div class="text-center">
                        <a href="{{ url()->previous() }}" class="btn btn-lg btn-primary mt-3">Indietro</a>
                    </div>

                </div>
            </div>
        </div>

    </main>
@endsection
