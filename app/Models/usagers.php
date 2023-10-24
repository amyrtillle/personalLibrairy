<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class usagers extends Model
{
    use HasFactory;
    protected $fillable = [
    'nom',
    'prenom',
    'email',
    'identifiant',
    'passe',
    'blocage',
    'timestamps'
];
}