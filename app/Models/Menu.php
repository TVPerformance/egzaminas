<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    public function menuRest(){
        return $this->belongsTo(Rest::class, 'rest_id', 'id');
    }
}
