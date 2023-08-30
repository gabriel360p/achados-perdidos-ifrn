<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'place_id',
        'categorie_id',
    ];

    /**
     * Get the user associated with the Item
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function place(): HasOne
    {
        return $this->hasOne(Place::class);
    }

    /**
     * Get the user associated with the Item
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function categorie(): HasOne
    {
        return $this->hasOne(Categorie::class);
    }
}