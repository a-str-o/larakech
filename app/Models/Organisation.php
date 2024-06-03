<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Organisation extends Model
{
    use SoftDeletes;

    protected $table = 'organisation';

    protected $fillable = [
        'cle',
        'nom',
        'adresse',
        'code_postal',
        'ville',
        'statut'
    ];
}