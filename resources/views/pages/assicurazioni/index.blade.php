@extends('layouts.main')

@section('content')
    <main>
        <div class="container">
            <div class="text-center mt-5">
                <h1>Assicurazioni</h1>
            </div>

            {{-- FORM FILTRI --}}
            <form method="GET" action="{{ route('assicurazioni.index') }}" class="row g-3 my-4">
                <div class="col-md-3">
                    <label for="codice_pdv" class="form-label fw-bold">Codice PDV</label>
                    <input id="codice_pdv" type="text" name="codice_pdv" class="form-control" placeholder="Codice PDV"
                        value="{{ request('codice_pdv') }}">
                </div>
                <div class="col-md-3">
                    <label for="codice_contratto" class="form-label fw-bold">Codice Contratto</label>
                    <input id="codice_contratto" type="text" name="codice_contratto" class="form-control"
                        placeholder="Codice Contratto" value="{{ request('codice_contratto') }}">
                </div>
                <div class="col-md-3">
                    <label for="pacchetto" class="form-label fw-bold">Pacchetto</label>
                    <input id="pacchetto" type="text" name="pacchetto" class="form-control" placeholder="Pacchetto"
                        value="{{ request('pacchetto') }}">
                </div>
                <div class="col-md-3">
                    <label for="categoria" class="form-label fw-bold">Categoria</label>
                    <input id="categoria" type="text" name="categoria" class="form-control" placeholder="Categoria"
                        value="{{ request('categoria') }}">
                </div>
                <div class="col-md-3">
                    <label for="stato_contratto" class="form-label fw-bold">Stato Contratto</label>
                    <input id="stato_contratto" type="text" name="stato_contratto" class="form-control"
                        placeholder="Stato Contratto" value="{{ request('stato_contratto') }}">
                </div>
                <div class="col-md-3">
                    <label for="dt_from" class="form-label fw-bold">Inserimento dal</label>
                    <input id="dt_from" type="date" name="dt_from" class="form-control"
                        value="{{ request('dt_from') }}">
                </div>
                <div class="col-md-3">
                    <label for="dt_to" class="form-label fw-bold">Inserimento al</label>
                    <input id="dt_to" type="date" name="dt_to" class="form-control" value="{{ request('dt_to') }}">
                </div>
                <div class="col-md-3 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary me-2">Filtra</button>
                    <a href="{{ route('assicurazioni.index') }}" class="btn btn-secondary">Reset</a>
                </div>
            </form>

            {{-- Table to show imported data --}}
            <div class="col-12 my-4">
                <table class="table table-striped">
                    <thead>
                        @if ($assicurazioni->count() > 0)
                            <p>Totale record: {{ $assicurazioni->total() }}</p>
                            <tr class="fw-bold fs-5">
                                <th>Codice PDV</th>
                                <th>Codice Contratto</th>
                                <th>ID Carrello</th>
                                <th>Stato Contratto</th>
                                <th>Categoria</th>
                                <th>Pacchetto</th>
                                <th>Data Inserimento</th>
                                <th>Data Cancellazione</th>
                                <th>Dettagli</th>
                            </tr>
                        @endif
                    </thead>
                    <tbody>
                        @forelse ($assicurazioni as $item)
                            <tr>
                                <td>{{ $item->codice_pdv }}</td>
                                <td>{{ $item->codice_contratto }}</td>
                                <td>{{ $item->id_carrello }}</td>
                                <td>{{ $item->stato_contratto }}</td>
                                <td>{{ $item->categoria }}</td>
                                <td>{{ $item->pacchetto }}</td>
                                <td>{{ $item->dt_inserimento }}</td>
                                <td>{{ $item->dt_cancellazione }}</td>

                                <td>
                                    <a href="{{ route('assicurazioni.show', ['assicurazione' => $item->id]) }}"
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
                {{ $assicurazioni->appends(request()->query())->links() }}
            </div>
        </div>
    </main>
@endsection
