<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Requisition extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = ['item_id', 'category_id', 'description', 'quantity', 'user_id', 'status_id','is_shth_approved', 'is_clevel_approved',
      'sh_tl_comment', 'manager_comment', 'clevel_comment', 'manager_id', 'sh_tl_id', 'clevel_id', 'is_manager_approved' ];
  
    public function Category (){
        return $this->belongsTo('App\Models\Category', 'category_id');
    }
    public function Status (){
        return $this->belongsTo('App\Models\Status', 'status_id');
    }
    public function Item (){
        return $this->belongsTo('App\Models\Item', 'item_id');
    }
    public function User(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }
    public function Approvals (){
        return $this->hasMany(Approval::class);
    }
}
