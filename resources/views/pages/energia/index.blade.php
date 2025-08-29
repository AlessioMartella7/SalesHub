@extends('layouts.main')

@section('content')
    <main>
        <div class="container">
            <div class="text-center mt-5">
                <h1>Energia</h1>
            </div>

            {{-- FORM FILTRI --}}
            <form method="GET" action="{{ route('energia.index') }}" class="row g-3 my-4">
                <div class="col-md-3">
                    <label for="dealer_id" class="form-label fw-bold">Dealer ID</label>
                    <input id="dealer_id" type="text" name="dealer_id" class="form-control" placeholder="Dealer ID"
                        value="{{ request('dealer_id') }}">
                </div>
                <div class="col-md-3">
                    <label for="codice_contratto" class="form-label fw-bold">Codice Contratto</label>
                    <input id="codice_contratto" type="text" name="codice_contratto" class="form-control"
                        placeholder="Codice Contratto" value="{{ request('codice_contratto') }}">
                </div>
                <div class="col-md-3">
                    <label for="ragione_sociale" class="form-label fw-bold">Ragione Sociale</label>
                    <input id="ragione_sociale" type="text" name="ragione_sociale" class="form-control"
                        placeholder="Ragione Sociale" value="{{ request('ragione_sociale') }}">
                </div>
                <div class="col-md-3">
                    <label for="codice_pdv" class="form-label fw-bold">Codice PDV</label>
                    <input id="codice_pdv" type="text" name="codice_pdv" class="form-control" placeholder="Codice PDV"
                        value="{{ request('codice_pdv') }}">
                </div>
                <div class="col-md-3">
                    <label for="des_tipologia_commodity" class="form-label fw-bold">Tipologia Commodity</label>
                    <input id="des_tipologia_commodity" type="text" name="des_tipologia_commodity" class="form-control"
                        placeholder="Tipologia Commodity" value="{{ request('des_tipologia_commodity') }}">
                </div>
                <div class="col-md-3">
                    <label for="dt_from" class="form-label fw-bold">Acquisizione dal</label>
                    <input id="dt_from" type="date" name="dt_from" class="form-control"
                        value="{{ request('dt_from') }}">
                </div>
                <div class="col-md-3">
                    <label for="dt_to" class="form-label fw-bold">Acquisizione al</label>
                    <input id="dt_to" type="date" name="dt_to" class="form-control" value="{{ request('dt_to') }}">
                </div>
                <div class="col-md-3 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary me-2">Filtra</button>
                    <a href="{{ route('energia.index') }}" class="btn btn-secondary">Reset</a>
                </div>
            </form>

            {{-- Table to show imported data --}}
            <div class="col-12 my-4">
                <table class="table table-striped">
                    <thead>
                        @if ($energia->count() > 0)
                            <p>Totale record: {{ $energia->total() }}</p>
                            <tr class="fw-bold fs-5">
                                <th>Dealer ID</th>
                                <th>Codice Contratto</th>
                                <th>Ragione Sociale</th>
                                <th>Codice PDV</th>
                                <th>Tipologia Commodity</th>
                                <th>Data Acquisizione</th>
                                <th>Dettagli</th>
                            </tr>
                        @endif
                    </thead>
                    <tbody>
                        @forelse ($energia as $item)
                            <tr>
                                <td>{{ $item->dealer_id }}</td>
                                <td>{{ $item->codice_contratto }}</td>
                                <td>{{ $item->ragione_sociale }}</td>
                                <td>{{ $item->codice_pdv }}</td>
                                <td>{{ $item->des_tipologia_commodity }}</td>
                                <td>{{ $item->dt_acquisizione_pdc }}</td>
                                <td>
                                    <a href="{{ route('energia.show', ['energia' => $item->id]) }}"
                                        class="btn btn-info btn-sm">Mostra</a>
                                </td>
                            </tr>
                        @empty
                            <p class="fw-bold fs-2 text-center">Nessun dato è stato ancora caricato</p>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="col-12 my-3 d-flex justify-content-center">
                {{ $energia->appends(request()->query())->links() }}
            </div>
        </div>
    </main>
@endsection
