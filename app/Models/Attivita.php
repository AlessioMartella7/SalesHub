<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attivita extends Model
{
    /** @use HasFactory<\Database\Factories\AttivitaFactory> */
    use HasFactory;

    protected $table = 'attivita';
}
