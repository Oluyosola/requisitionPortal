<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    
    use HasFactory;
    protected $fillable = ['name'];
    public function Items (){
        return $this->hasMany('App\Item', 'category_id');
    }
    public function Requisitions (){
        return $this->hasMany(Requisition::class);
    }
}
