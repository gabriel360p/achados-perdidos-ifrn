<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Iten extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'more', 
        'place',
        'categorie',
        'refound',
        // 'place_id',
        // 'categorie_id',
    ];
}
