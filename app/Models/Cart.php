<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    public function item()
    {
        return $this->belongsTo('App\Models\Item');
    }

     public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
