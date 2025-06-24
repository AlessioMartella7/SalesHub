@php
    $pagamento = $vendita->pagamento;
@endphp

<div class="col-12 my-4">

    <table class="table table-bordered border-dark">
        <thead>
            <tr class="fw-bold fs-4 text-center">
                <th colspan="12" class="table-secondary border-dark">
                    Pagamento
                </th>
            </tr>
            <tr class="fw-bold fs-5 text-center table-light border-dark">
                <th>Contanti</th>
                <th>Pagamenti Elettronici</th>
                <th>Bonifici</th>
                <th>Assegni</th>
                <th>Buoni</th>
                <th>Coupon</th>
                <th>Altri Pagamenti</th>
                <th>Non Scontrinato</th>
                <th>Non Scontrinato Pos</th>
                <th>Non Riscosso</th>
                <th>Importo Conto Operatore Contanti</th>
                <th>Importo Conto Operatore Pos</th>

            </tr>
        </thead>
        <tbody>
            <tr class="text-center">
                <td>{{ $pagamento->contanti }}</td>
                <td>{{ $pagamento->pagamenti_elettronici }}</td>
                <td>{{ $pagamento->bonifici }}</td>
                <td>{{ $pagamento->assegni }}</td>
                <td>{{ $pagamento->buoni }}</td>
                <td>{{ $pagamento->coupon }}</td>
                <td>{{ $pagamento->altri_pagamenti }}</td>
                <td>{{ $pagamento->non_scontrinato }}</td>
                <td>{{ $pagamento->non_scontrinato_pos }}</td>
                <td>{{ $pagamento->non_riscosso }}</td>
                <td>{{ $pagamento->importo_conto_operatore_contanti }}</td>
                <td>{{ $pagamento->importo_conto_operatore_pos }}</td>
            </tr>
        </tbody>
    </table>
</div>
