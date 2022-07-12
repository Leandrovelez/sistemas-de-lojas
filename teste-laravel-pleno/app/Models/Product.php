<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Product extends Model
{
    use HasFactory, Notifiable;
    
    /**
     * Get the store that owns the product.
     */
    public function store()
    {
        return $this->belongsTo(Store::class);
    }
  
     /**
     * Apply a currency mask.
     *
     * @param  integer  $value
     * @return string
     */
    public function getValueAttribute($value) {
        $value_formated = "R$ " . number_format($value, 2, ",", ".");
        return $value_formated;
    }

}
