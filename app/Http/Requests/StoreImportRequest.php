<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreImportRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'import_file' => [
                'required',
                'file',
                'mimes:xlsx,csv',
                'max:4096'
            ],
            'import_type' => [
                'required',
                'in:fissi,energia'
            ]
        ];
    }

    public function messages()
    {
        return [
            'import_file.required' => 'Il file di importazione è obbligatorio. Per favore carica un file.',
            'import_file.file' => 'Il file caricato non è valido. Assicurati di caricare un file.',
            'import_file.mimes' => 'Il file deve essere di tipo .xlsx o .csv. Per favore, carica un file valido.',
            'import_file.max' => 'Il file caricato è troppo grande. La dimensione massima consentita è 4 MB.',
        ];
    }
}
