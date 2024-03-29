<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Haruncpi\LaravelIdGenerator\IdGenerator;

class Item extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'category_id', 'quantity', 'reorder_quantity', 'quantity_unit_id', 'item_id'];
    
    
    public function category (){
        return $this->belongsTo(Category::class);
    }
    public function requisitions (){
        return $this->hasMany(Requisition::class);
    }
    public function quantityUnit (){
        return $this->belongsTo(QuantityUnit::class);
    }
    
}

