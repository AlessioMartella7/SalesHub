@extends('layouts.main')

@section('content')
    <main>
        <div class="container">
            <div class="text-center mt-5">
                <h1>Fissi</h1>
            </div>

            {{-- FORM FILTRI --}}
            <form method="GET" action="{{ route('fissi.index') }}" class="row g-3 my-4">

                <div class="col-md-3">
                    <label for="codice_contratto" class="form-label fw-bold">Codice contratto</label>
                    <input id="codice_contratto" type="text" name="codice_contratto" class="form-control"
                        placeholder="Codice Contratto" value="{{ request('codice_contratto') }}">
                </div>
                <div class="col-md-3">
                    <label for="codice_pdv" class="form-label fw-bold">Codice punto vendita</label>
                    <input id="codice_pdv" type="text" name="codice_pdv" class="form-control" placeholder="Codice PDV"
                        value="{{ request('codice_pdv') }}">
                </div>
                <div class="col-md-3">
                    <label for="dt_from" class="form-label fw-bold">Dal</label>
                    <input id="dt_from" type="date" name="dt_from" class="form-control"
                        value="{{ request('dt_from') }}">
                </div>
                <div class="col-md-3">
                    <label for="dt_to" class="form-label fw-bold">Al</label>
                    <input id="dt_to" type="date" name="dt_to" class="form-control" value="{{ request('dt_to') }}">
                </div>
                <div class="col-md-3">
                    <label for="stato" class="form-label fw-bold">Stato</label>
                    <select id="stato" name="stato" class="form-select">
                        <option value="">-- Stato --</option>
                        <option value="KO" {{ request('stato') == 'KO' ? 'selected' : '' }}>KO</option>
                        <option value="ATT" {{ request('stato') == 'ATT' ? 'selected' : '' }}>ATT</option>
                        <option value="WIP" {{ request('stato') == 'WIP' ? 'selected' : '' }}>WIP</option>

                    </select>
                </div>
                <div class="col-md-3 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary me-2">Filtra</button>
                    <a href="{{ route('fissi.index') }}" class="btn btn-secondary">Reset</a>
                </div>
            </form>

            {{-- Table to show imported data --}}
            <div class="col-12 my-4">
                <table class="table table-striped">
                    <thead>

                        {{-- Mostra l'intestazione della tabella solo se sono presenti dati --}}
                        @if ($fissi->count() > 0)
                            <p>Totale record: {{ $fissi->total() }}</p>
                            <tr class="fw-bold fs-5">
                                <th>Codice Contratto</th>
                                <th>Codice PDV</th>
                                <th>Data Acquisizione</th>
                                <th>Stato</th>
                                <th>Tipo KO</th>
                                <th>Dettagli</th>
                            </tr>
                        @endif
                    </thead>
                    <tbody>
                        @forelse ($fissi as $fisso)
                            <tr>
                                <td>{{ $fisso->codice_contratto }}</td>
                                <td>{{ $fisso->codice_pdv }}</td>
                                <td>{{ $fisso->dt_acquisizione }}</td>
                                <td>{{ $fisso->stato }}</td>
                                <td>{{ $fisso->tipo_ko }}</td>
                                <td>
                                    <a href="{{ route('fissi.show', ['fisso' => $fisso->id]) }}"
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
                {{ $fissi->appends(request()->query())->links() }}
            </div>
        </div>
    </main>
@endsection
