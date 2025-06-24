@php
    $addetto = $vendita->addetto;
@endphp

<div class="col-12 my-4">

    <table class="table table-bordered border-dark">
        <thead>
            <tr class="fw-bold fs-4 text-center">
                <th colspan="7" class="table-secondary border-dark">
                    Addetto
                </th>
            </tr>
            <tr class="fw-bold fs-5 text-center table-light border-dark">
                <th>Codice Addetto</th>
                <th>Ruolo</th>
                <th>Nominativo</th>
                <th>Nome</th>
                <th>Cognome</th>
                <th>Email</th>
                <th>Numero Centralino</th>

            </tr>
        </thead>
        <tbody>
            <tr class="text-center">
                <td>{{ $addetto->codice_esterno }}</td>
                <td>{{ $addetto->ruolo }}</td>
                <td>{{ $addetto->nominativo }}</td>
                <td>{{ $addetto->nome }}</td>
                <td>{{ $addetto->cognome }}</td>
                <td>{{ $addetto->email }}</td>
                <td>{{ $addetto->numero_centralino ?? '-' }}</td>
            </tr>
        </tbody>
    </table>
</div>
