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
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $cliente = $this->input('cliente', []);
        $venditaInfo = $this->input('vendita.info', []);
        $venditaPagamenti = $this->input('vendita.pagamento', []);
        $ragioneSociale = $this->input('ragione_sociale', []);
        $attivita = $this->input('attivita', []);
        $addetto = $this->input('addetto', []);
        $articoli = $this->input('articoli', []);

        $this->merge([
            // Root-level fields
            'nominativo' => $cliente['cliente_nominativo'] ?? null,
            'azienda' => $ragioneSociale['nominativo'] ?? null,
            'partita_iva' => $ragioneSociale['partita_iva'] ?? null,
            'codice_fiscale' => $ragioneSociale['codice_fiscale'] ?? null,
            'cliente_tipo' => $cliente['cliente_tipo'] ?? null,

            // Cliente mapping
            'cliente' => [
                'cliente_tipo' => $cliente['cliente_tipo'] ?? null,
                'codice_esterno' => $cliente['cliente_codice_interno'] ?? null,
                'nominativo' => $cliente['cliente_nominativo'] ?? null,
                'nome' => $cliente['cliente_nome'] ?? null,
                'cognome' => $cliente['cliente_cognome'] ?? null,
                'email' => $cliente['cliente_email'] ?? null,
                'piva' => $cliente['cliente_piva'] ?? null,
                'codice_fiscale' => $cliente['cliente_codice_fiscale'] ?? null,
                'telefono1' => $cliente['cliente_telefono1'] ?? null,
                'telefono2' => $cliente['cliente_telefono2'] ?? null,
                'telefono3' => $cliente['cliente_telefono3'] ?? null,
                'telefono4' => $cliente['cliente_telefono4'] ?? null,
            ],

            // Vendita info mapping
            'vendita' => [
                'info' => [
                    'codice_esterno' => $venditaInfo['vendita_numero_vendita'] ?? null,
                    'stato' => $venditaInfo['vendita_stato'] ?? null,
                    'numero_scontrino' => $venditaInfo['vendita_numero_scontrino'] ?? null,
                    'codice_lotteria' => $venditaInfo['vendita_codice_lotteria'] ?? null,
                    'data_vendita' => $venditaInfo['data_attivazione'] ?? null,
                    'data_inizio' => $venditaInfo['vendita_data_inizio'] ?? null,
                    'data_fine' => $venditaInfo['vendita_data_fine'] ?? null,
                    'totale' => $venditaInfo['vendita_totale_importo_scontrino'] ?? null,
                    'totale_imponibile' => $venditaInfo['totale_imponibile'] ?? null,
                    'flg_scontrino' => $venditaInfo['flg_scontrino'] ?? null,
                ],
                'pagamento' => [
                    'importo_conto_operatore_contanti' => $venditaPagamenti['vendita_importo_conto_operatore_contanti'] ?? null,
                    'importo_conto_operatore_pos' => $venditaPagamenti['vendita_importo_conto_operatore_pos'] ?? null,
                ]
            ],

            // Ragione sociale
            'ragione_sociale' => [
                'codice_interno' => $ragioneSociale['codice_interno'] ?? null,
                'nominativo' => $ragioneSociale['nominativo'] ?? null,
                'partita_iva' => $ragioneSociale['partita_iva'] ?? null,
                'codice_fiscale' => $ragioneSociale['codice_fiscale'] ?? null,
                'email' => $ragioneSociale['email'] ?? null,
                'tel' => $ragioneSociale['tel'] ?? null,
            ],

            // Addetto
            'addetto' => [
                'codice_esterno' => $addetto['codice_esterno'] ?? null,
                'nominativo' => $addetto['nominativo'] ?? null,
            ],

            // Attività
            'attivita' => [
                'codice_interno' => $attivita['codice_interno'] ?? null,
                'nominativo' => $attivita['nominativo'] ?? null,
                'email' => $attivita['negozio_email'] ?? null,
                'telefono' => $attivita['negozio_telefono'] ?? null,
                'indirizzo' => $attivita['negozio_indirizzo'] ?? null,
                'civico' => $attivita['negozio_civico'] ?? null,
                'cap' => $attivita['negozio_cap'] ?? null,
                'provincia' => $attivita['negozio_provincia'] ?? null,
                'citta' => $attivita['negozio_citta'] ?? null,
            ],

            // Articoli lasciati invariati se già corretti
            'articoli' => $articoli,
        ]);
    }

    public function rules(): array
    {
        return array_merge(
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
            VenditaRules::rules()
        );
    }

    public function messages(): array
    {
        return array_merge(
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
            VenditaMessages::messages()
        );
    }
}
