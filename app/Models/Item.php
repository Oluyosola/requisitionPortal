<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = ['item', 'category_id'];
    public function Category (){
        return $this->belongsTo(Category::class, 'foreign_key');
    }
}
