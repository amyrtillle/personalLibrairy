<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class exemplaires extends Model
{
    use HasFactory;
    protected $fillable = [
    'livre',
    'etat',
    'dispo',
    'retour',
];
}
