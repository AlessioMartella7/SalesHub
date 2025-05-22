<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RagioneSociale extends Model
{
    /** @use HasFactory<\Database\Factories\RagioneSocialeFactory> */
    use HasFactory;

    protected $table = 'ragioni_sociali';
}
