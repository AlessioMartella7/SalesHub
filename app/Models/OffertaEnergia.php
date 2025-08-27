<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OffertaEnergia extends Model
{
    protected $table = 'offerte_energia';

    protected $fillable = [
        'user_id',
        'dealer_id',
        'ragione_sociale',
        'codice_pdv',
        'codice_contratto',
        'num_item_in_pdc',
        'codice_contratto_esterno',
        'dt_creazione_pdc',
        'dt_acquisizione_pdc',
        'dt_annullamento_pdc',
        'dt_aggiornamento_oli',
        'dt_annullamento_oli',
        'dt_fine_ripensamento',
        'dt_firma_pdc',
        'dt_inserimento_oli',
        'dt_attivazione',
        'dt_cessazione',
        'dt_decorrenza',
        'des_categoria_uso_pdc_item',
        'des_causale_annullamento_oli',
        'des_metodo_pagamento_pdc_item',
        'dt_load',
        'des_causale_annullamento_pdc',
        'des_nome_listino_pdc_item',
        'des_stato_oli',
        'des_tipologia_commodity',
        'flg_acquisizione_pdc',
        'flg_annullamento_oli',
        'flg_annullamento_pdc',
        'flg_attivazione_asset',
        'flg_cessazione_asset',
        'flg_chiusura_oli',
        'flg_dual',
        'flg_fisso_voce_customer',
        'tipologia_prestazione',
    ];
}
