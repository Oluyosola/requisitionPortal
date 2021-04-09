<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'category_id', 'quantity', 'quantity_unit_id'];
    
    
    public function Category (){
        return $this->belongsTo(Category::class);
    }
    public function Requisitions (){
        return $this->hasMany(Requisition::class);
    }
    public function quantityUnit (){
        return $this->belongsTo('App\Models\QuantityUnit', 'quantity_unit_id');
    }
}
