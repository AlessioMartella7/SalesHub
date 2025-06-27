@php
    $cliente = $vendita->cliente;
@endphp

<div class="col-12 my-4">
    <table class="table table-bordered border-dark">
        <thead>
            <tr class="fw-bold fs-4 text-center">
                <th colspan="16" class="table-secondary border-dark">
                    <h3>Cliente</h3>
                </th>
            </tr>
            <tr class="fw-bold fs-5 text-center table-light border-dark ">
                <th>Tipo</th>
                <th>Nominativo</th>
                <th>Nome</th>
                <th>Cognome</th>
                <th>Email</th>
                <th>Codice Fiscale</th>
                <th>Partita Iva</th>
                <th>Telefono 1</th>
                <th>Codice Wind</th>
                <th>Altro</th>
            </tr>
        </thead>
        <tbody>
            <tr class="text-center">
                <td>{{ $cliente->cliente_tipo }}</td>
                <td>{{ $cliente->nominativo }}</td>
                <td>{{ $cliente->nome }}</td>
                <td>{{ $cliente->cognome }}</td>
                <td>{{ $cliente->email }}</td>
                <td>{{ $cliente->codice_fiscale }}</td>
                <td>{{ $cliente->partita_iva ?? '-' }}</td>
                <td>{{ $cliente->tel1 ?? '-' }}</td>
                <td>{{ $cliente->codice_cliente_wind ?? '-' }}</td>
                <td>
                    <button class="btn btn-sm btn-outline-primary" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse">
                        <i class="fa fa-eye"></i>
                    </button>
                </td>
            </tr>

            {{-- Riga dei dettagli espandibile --}}
            <tr class="collapse" id="collapse">
                <td colspan="13" class="bg-light text-start">
                    <strong>Dettagli Aggiuntivi:</strong><br>
                    <ul class="mb-0">

                        <li><strong>Telefono 2:</strong>
                            {{ $cliente->tel2 ?? '-' }}
                        </li>

                        <li><strong>Telefono 3:</strong>
                            {{ $cliente->tel3 ?? '-' }}
                        </li>

                        <li><strong>Telefono 4:</strong>
                            {{ $cliente->tel4 ?? '-' }}
                        </li>

                        <li><strong>Codice Cliente Vodafone:</strong>
                            {{ $cliente->codice_cliente_vodafone ?? '-' }}
                        </li>

                        <li><strong>Codice Cliente Tim:</strong>
                            {{ $cliente->codice_cliente_tim ?? '-' }}
                        </li>

                        <li><strong>Codice Cliente Fastweb:</strong>
                            {{ $cliente->codice_cliente_fastweb ?? '-' }}
                        </li>

                        <li><strong>Codice Cliente Sky:</strong>
                            {{ $cliente->codice_cliente_sky ?? '-' }}
                        </li>
                    </ul>
                </td>
            </tr>
        </tbody>
    </table>
</div>
