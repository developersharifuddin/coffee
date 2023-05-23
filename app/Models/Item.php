<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
   
    public function subitem()
    {
     return $this->hasMany('App\Models\Subitem');
      }

    public function usercarts()
    {
     return $this->hasMany('App\Models\Usercart');
      }

    public function orders()
    {
     return $this->hasMany('App\Models\Order');
      }

    public function userorders()
    {
      return $this->hasMany('App\Models\Userorder');
    }

    public function carts()
    {
      return $this->hasMany('App\Models\Cart');
    }
}
