<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuantityUnit extends Model
{
    use HasFactory;
    protected $fillable = ['name'];


    // public function Quantity(){
    //     return $this->hasOne(Qauntity::class);
    // }
    public function Requisitions(){
        return $this->hasOne(Requisition::class);
    }
}
