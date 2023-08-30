<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Occurrence extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'refund',
        'item_id',
        'servant_id',
        'responsible_registration',
        'description',
        // 'input_date',
        // 'output_date',
    ];

    /**
     * Get the user associated with the Occurrence
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function item(): HasOne
    {
        return $this->hasOne(Item::class);
    }
    
    /**
     * Get the user associated with the Occurrence
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }
    
}
