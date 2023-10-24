<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class livres extends Model
{
    use HasFactory;
    protected $fillable = [
    'image',
    'titre',
    'auteur',
    'pages',
    'prix',
    'date_publication',
    'editeur',
    'isbn',
    'timestamps'
];
}
