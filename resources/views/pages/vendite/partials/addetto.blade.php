                    <div class="col-12 my-4">

                        <table class="table table-bordered">
                            <thead>
                                <tr class="fw-bold fs-4 text-center">
                                    <th colspan="7" class="table-success">
                                        Addetto
                                    </th>
                                </tr>
                                <tr class="fw-bold fs-5 text-center table-light ">
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
                                    <td>{{ $vendita->addetto->codice_esterno }}</td>
                                    <td>{{ $vendita->addetto->ruolo }}</td>
                                    <td>{{ $vendita->addetto->nominativo }}</td>
                                    <td>{{ $vendita->addetto->nome }}</td>
                                    <td>{{ $vendita->addetto->cognome }}</td>
                                    <td>{{ $vendita->addetto->email }}</td>
                                    <td>{{ $vendita->addetto->numero_centralino }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
