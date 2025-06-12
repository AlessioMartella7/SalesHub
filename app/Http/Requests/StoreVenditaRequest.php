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
                VenditaRules::rules()
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
                VenditaMessages::messages()
            ]
        );
    }
}
