<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

// Rules
use App\Http\Requests\Supports\Rules\AddettoRules;
use App\Http\Requests\Supports\Rules\ArticoloDettaglioRules;
use App\Http\Requests\Supports\Rules\ArticoloRules;
use App\Http\Requests\Supports\Rules\AttivitaRules;
use App\Http\Requests\Supports\Rules\CategoriaRules;
use App\Http\Requests\Supports\Rules\ClienteRules;
use App\Http\Requests\Supports\Rules\OrganizzazioneRules;
use App\Http\Requests\Supports\Rules\PagamentoRules;
use App\Http\Requests\Supports\Rules\RagioneSocialeRules;
use App\Http\Requests\Supports\Rules\TipologiaRules;
use App\Http\Requests\Supports\Rules\VenditaRules;

// Messages
use App\Http\Requests\Supports\Messages\AddettoMessages;
use App\Http\Requests\Supports\Messages\ArticoloDettaglioMessages;
use App\Http\Requests\Supports\Messages\ArticoloMessages;
use App\Http\Requests\Supports\Messages\AttivitaMessages;
use App\Http\Requests\Supports\Messages\CategoriaMessages;
use App\Http\Requests\Supports\Messages\ClienteMessages;
use App\Http\Requests\Supports\Messages\OrganizzazioneMessages;
use App\Http\Requests\Supports\Messages\PagamentoMessages;
use App\Http\Requests\Supports\Messages\RagioneSocialeMessages;
use App\Http\Requests\Supports\Messages\TipologiaMessages;
use App\Http\Requests\Supports\Messages\VenditaMessages;

class StoreVenditaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }


    // Sanitizzo i dati prima di validarli
    protected function prepareForValidation(): void
    {
        $articoli = collect($this->input('articoli', []))->map(function ($articolo) {
            return [
                'info' => [
                    'codice' => $articolo['info']['codice_prodotto'],
                    'descrizione' => $articolo['info']['descrizione_prodotto'],
                    'costo' => $articolo['info']['costo_acquisto'],
                ],
                'dettagli' => collect($articolo['dettagli'] ?? [])->map(function ($dettaglio) {
                    return
                        [
                            'tipologia_vendita' => $dettaglio['tipologia_vendita'],
                            'importo_credito' => $dettaglio['credito'],
                            'importo_anticipo' => $dettaglio['anticipo'],
                            'natura' => $dettaglio['iva_natura_iva'],
                            'aliquota_prezzo' => $dettaglio['iva_aliquota'],
                        ];
                })->toArray(),
            ];
        });

        $vendita = [
            'info' => [
                'codice_esterno' => $this->input('vendita_numero_vendita'),
                'stato' => $this->input('vendita_stato'),
                'numero_scontrino' => $this->input('vendita_numero_scontrino'),
                'codice_lotteria' => $this->input('vendita_codice_lotteria'),
                'data_inizio' => $this->input('vendita_data_inizio'),
                'data_fine' => $this->input('vendita_data_fine'),
                'data_scontrino' => $this->input('vendita_data_scontrino'),
                'totale' => $this->input('vendita_totale_importo_scontrino'),
            ],

            'pagamenti' => collect($this->input('vendita.pagamenti', []))->map(
                function ($pagamento) {
                    return
                        [
                            'contanti' => $pagamento['vendita_contanti'],
                            'pagamenti_elettronici' => $pagamento['vendita_pagamenti_elettronici'],
                            'bonifici' => $pagamento['vendita_bonifici'],
                            'assegni' => $pagamento['vendita_assegni'],
                            'buoni' => $pagamento['vendita_buoni'],
                            'coupon' => $pagamento['vendita_coupon'],
                            'altri_pagamenti' => $pagamento['vendita_altri_pagamenti'],
                            'non_scontrinato' => $pagamento['vendita_non_scontrinato'],
                            'non_riscosso' => $pagamento['vendita_non_riscosso'],
                        ];
                }
            )->toArray()
        ];

        $this->merge([

            'articoli' => $articoli->toArray(),

            'vendita' => $vendita,

            'ragione_sociale' => [
                'codice_esterno' => $this->input('ragione_sociale_codice_interno'),
                'azienda' => $this->input('ragione_sociale_nominativo'),
            ],

            'addetto' => [
                'codice_esterno' => $this->input('addetto_codice_esterno'),
            ],

            'categoria' => [
                'categoria' => $this->input('vendita_categoria'),
            ],

            'tipologia' => [
                'tipologia' => $this->input('vendita_tipologia'),
            ],

            'attivita' => [
                'codice_esterno' => $this->input('negozio_codice_interno'),
                'nominativo' => $this->input('negozio_nominativo'),
                'email' => $this->input('negozio_email'),
                'telefono' => $this->input('negozio_telefono'),
                'indirizzo' => $this->input('negozio_indirizzo'),
                'civico' => $this->input('negozio_civico'),
                'cap' => $this->input('negozio_cap'),
                'provincia' => $this->input('negozio_provincia'),
                'citta' => $this->input('negozio_citta'),
            ],

            'cliente' => [
                'codice_esterno' => $this->input('cliente_codice_interno'),
                'nominativo' => $this->input('cliente_nominativo'),
                'nome' => $this->input('cliente_nome'),
                'cognome' => $this->input('cliente_cognome'),
                'email' => $this->input('cliente_email'),
                'piva' => $this->input('cliente_piva'),
                'codice_fiscale' => $this->input('cliente_codice_fiscale'),
                'telefono1' => $this->input('cliente_telefono1'),
                'telefono2' => $this->input('cliente_telefono2'),
                'telefono3' => $this->input('cliente_telefono3'),
                'telefono4' => $this->input('cliente_telefono4'),
            ],
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return array_merge(

            ...[
                AddettoRules::rules(),
                ArticoloDettaglioRules::rules(),
                ArticoloRules::rules(),
                AttivitaRules::rules(),
                CategoriaRules::rules(),
                ClienteRules::rules(),
                OrganizzazioneRules::rules(),
                PagamentoRules::rules(),
                RagioneSocialeRules::rules(),
                TipologiaRules::rules(),
                VenditaRules::rules(),
            ]
        );
    }

    public function messages(): array
    {
        return array_merge(
            ...[
                AddettoMessages::messages(),
                ArticoloDettaglioMessages::messages(),
                ArticoloMessages::messages(),
                AttivitaMessages::messages(),
                CategoriaMessages::messages(),
                ClienteMessages::messages(),
                OrganizzazioneMessages::messages(),
                PagamentoMessages::messages(),
                RagioneSocialeMessages::messages(),
                TipologiaMessages::messages(),
                VenditaMessages::messages(),
            ]
        );
    }
}
