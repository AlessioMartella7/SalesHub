<?php

namespace App\Imports;

use App\Models\OffertaEnergia;
use Maatwebsite\Excel\Concerns\ToModel;

class OfferteEnergiaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new OffertaEnergia([
            //
        ]);
    }
}
