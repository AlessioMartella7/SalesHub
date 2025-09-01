@extends('layouts.main', [
    'title' => 'Vendite',
    'description' => 'Gestione delle vendite',
    'breadcrumbs' => [['label' => 'Vendite', 'url' => route('vendite.index')]],
])

{{-- Font Awesome CDN --}}
@section('links')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
    <main>
        <div class="container">
            <div class="text-center mt-5">
                <h1>Vendite</h1>
            </div>

            {{-- FORM FILTRI --}}
            <form method="GET" action="{{ route('vendite.index') }}" class="row g-3 my-4">
                <div class="col-md-3">
                    <label class="form-label fw-bold">Organizzazione</label>
                    <input type="text" name="organizzazione" class="form-control" placeholder="Organizzazione"
                        value="{{ request('organizzazione') }}">
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-bold">Ragione Sociale</label>
                    <input type="text" name="ragione_sociale" class="form-control" placeholder="Ragione Sociale"
                        value="{{ request('ragione_sociale') }}">
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-bold">Attività</label>
                    <input type="text" name="attivita" class="form-control" placeholder="Attività"
                        value="{{ request('attivita') }}">
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-bold">Codice Vendita</label>
                    <input type="text" name="codice_esterno" class="form-control" placeholder="Codice Vendita"
                        value="{{ request('codice_esterno') }}">
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-bold">Cliente</label>
                    <input type="text" name="cliente" class="form-control" placeholder="Codice Esterno Cliente"
                        value="{{ request('cliente') }}">
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-bold">Addetto (Codice Esterno)</label>
                    <input type="text" name="addetto" class="form-control" placeholder="Codice Esterno Addetto"
                        value="{{ request('addetto') }}">
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-bold">flg Scontrino</label>
                    <input type="text" name="flg_scontrino" class="form-control" placeholder="Flg Scontrino"
                        value="{{ request('flg_scontrino') }}">
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-bold">Numero Scontrino</label>
                    <input type="text" name="numero_scontrino" class="form-control" placeholder="Numero Scontrino"
                        value="{{ request('numero_scontrino') }}">
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-bold">Data Scontrino</label>
                    <input type="date" name="data_scontrino" class="form-control"
                        value="{{ request('data_scontrino') }}">
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-bold">Data Vendita</label>
                    <input type="date" name="data_vendita" class="form-control" value="{{ request('data_vendita') }}">
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-bold">Dal</label>
                    <input type="date" name="dt_from" class="form-control" value="{{ request('dt_from') }}">
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-bold">Al</label>
                    <input type="date" name="dt_to" class="form-control" value="{{ request('dt_to') }}">
                </div>
                <div class="col-md-3 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary me-2">Filtra</button>
                    <a href="{{ route('vendite.index') }}" class="btn btn-secondary">Reset</a>
                </div>
            </form>

            {{-- Table --}}
            <div class="col-12 my-4">
                <table class="table table-striped table-light table-bordered border-dark">
                    <thead>
                        @if ($vendite->count() > 0)
                            <p>Totale record: {{ $vendite->total() }}</p>
                            <tr class="fw-bold fs-5 text-center align-middle">
                                <th>Organizzazione</th>
                                <th>Attività</th>
                                <th>Codice Vendita</th>
                                <th>Codice Cliente</th>
                                <th>Flg Scontrino</th>
                                <th>Numero Scontrino</th>
                                <th>Data Vendita</th>
                                <th>Data Fine</th>
                                <th>Stato</th>
                                <th>Totale</th>
                                <th>Dettagli</th>
                            </tr>
                        @endif
                    </thead>
                    <tbody>
                        @forelse ($vendite as $vendita)
                            <tr class="text-center align-middle">
                                <td>{{ $vendita->organizzazione->subdir ?? '-' }}</td>
                                <td>{{ $vendita->attivita->nominativo ?? '-' }}</td>
                                <td>{{ $vendita->codice_esterno }}</td>
                                <td>{{ $vendita->cliente->codice_esterno ?? '-' }}</td>
                                <td>{{ $vendita->flg_scontrino ?? '-' }}</td>
                                <td>{{ $vendita->numero_scontrino ?? '-' }}</td>
                                <td>{{ $vendita->data_fine ?? '-' }}</td>
                                <td>{{ $vendita->data_vendita }}</td>
                                <td>{{ $vendita->stato }}</td>
                                <td>{{ $vendita->totale }}€</td>
                                <td>
                                    <a href="{{ route('vendite.show', ['vendita' => $vendita->id]) }}"
                                        title="Mostra Dettagli">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <p class="fw-bold fs-2 text-center">Nessun dato è stato ancora caricato</p>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="col-12 my-3 d-flex justify-content-center">
                {{ $vendite->appends(request()->query())->links() }}
            </div>
        </div>
    </main>
@endsection
