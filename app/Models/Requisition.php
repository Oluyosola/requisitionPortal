<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requisition extends Model
{
    use HasFactory;
    protected $fillable = ['item_id', 'category_id', 'description', 'quantity', 'user_id', 'status_id', 'is_shth_approved', 'is_clevel-approved', 'is_manager_pproved'];
  
    public function Category (){
        return $this->belongsTo('App\Models\Category', 'category_id');
    }
    public function Status (){
        return $this->belongsTo('App\Models\Status', 'status_id');
    }
    public function Item (){
        return $this->belongsTo('App\Models\Item', 'item_id');
    }
    public function User (){
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
