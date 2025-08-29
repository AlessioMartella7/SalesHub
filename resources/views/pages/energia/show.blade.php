@extends('layouts.main')

@section('content')
    <main>
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-12 my-3 w-75">
                    <div class="text-center my-5">
                        <h2>Dettagli Energia</h2>
                    </div>

                    {{-- Card Dettagli --}}
                    <div class="card shadow-sm">
                        <div class="card-header fw-bold fs-5">
                            Contratto - {{ $energia->codice_contratto }}
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <strong>Dealer ID:</strong> {{ $energia->dealer_id }}
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Ragione Sociale:</strong> {{ $energia->ragione_sociale }}
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Codice PDV:</strong> {{ $energia->codice_pdv }}
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Num. Item in PDC:</strong> {{ $energia->num_item_in_pdc }}
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Codice Contratto Esterno:</strong> {{ $energia->codice_contratto_esterno }}
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Data Creazione PDC:</strong> {{ $energia->dt_creazione_pdc }}
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Data Acquisizione PDC:</strong> {{ $energia->dt_acquisizione_pdc }}
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Data Annullamento PDC:</strong> {{ $energia->dt_annullamento_pdc }}
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Data Aggiornamento OLI:</strong> {{ $energia->dt_aggiornamento_oli }}
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Data Annullamento OLI:</strong> {{ $energia->dt_annullamento_oli }}
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Data Fine Ripensamento:</strong> {{ $energia->dt_fine_ripensamento }}
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Data Firma PDC:</strong> {{ $energia->dt_firma_pdc }}
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Data Inserimento OLI:</strong> {{ $energia->dt_inserimento_oli }}
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Data Attivazione:</strong> {{ $energia->dt_attivazione }}
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Data Cessazione:</strong> {{ $energia->dt_cessazione }}
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Data Decorrenza:</strong> {{ $energia->dt_decorrenza }}
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Categoria Uso PDC Item:</strong> {{ $energia->des_categoria_uso_pdc_item }}
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Causale Annullamento OLI:</strong> {{ $energia->des_causale_annullamento_oli }}
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Metodo Pagamento PDC Item:</strong>
                                    {{ $energia->des_metodo_pagamento_pdc_item }}
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Data Load:</strong> {{ $energia->dt_load }}
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Causale Annullamento PDC:</strong> {{ $energia->des_causale_annullamento_pdc }}
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Nome Listino PDC Item:</strong> {{ $energia->des_nome_listino_pdc_item }}
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Stato OLI:</strong> {{ $energia->des_stato_oli }}
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Tipologia Commodity:</strong> {{ $energia->des_tipologia_commodity }}
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Flg Acquisizione PDC:</strong> {{ $energia->flg_acquisizione_pdc }}
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Flg Annullamento OLI:</strong> {{ $energia->flg_annullamento_oli }}
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Flg Annullamento PDC:</strong> {{ $energia->flg_annullamento_pdc }}
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Flg Attivazione Asset:</strong> {{ $energia->flg_attivazione_asset }}
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Flg Cessazione Asset:</strong> {{ $energia->flg_cessazione_asset }}
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Flg Chiusura OLI:</strong> {{ $energia->flg_chiusura_oli }}
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Flg Dual:</strong> {{ $energia->flg_dual }}
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Flg Fisso Voce Customer:</strong> {{ $energia->flg_fisso_voce_customer }}
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Tipologia Prestazione:</strong> {{ $energia->tipologia_prestazione }}
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Bottone ritorno --}}
                    <div class="text-center">
                        <a href="{{ url()->previous() }}" class="btn btn-lg btn-primary mt-3">Indietro</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
