<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuantityUnit extends Model
{
    use HasFactory;
    protected $fillable = ['name'];


    public function item (){
        return $this->hasMany(Item::class);
    }
    public function requisitions(){
        return $this->hasMany(Requisition::class);
    }
}
