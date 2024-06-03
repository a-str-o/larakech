<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use SoftDeletes;

    protected $table = 'contact';
    
    protected $fillable = [
        'cle',
        'organisation_id',
        'e_mail',
        'nom',
        'prenom',
        'telephone_fixe',
        'service',
        'fonction'
    ];

    public function organisation()
    {
        return $this->belongsTo(Organisation::class);
    }
}