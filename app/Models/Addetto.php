<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addetto extends Model
{
    /** @use HasFactory<\Database\Factories\AddettoFactory> */
    use HasFactory;

    protected $table = 'addetti';
}
