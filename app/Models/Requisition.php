<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class Requisition extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = ['item_id', 'category_id', 
    'description', 'quantity', 'user_id', 'status_id',
    'is_sh_tl_approved', 'is_clevel_approved',
    'sh_tl_approval_comment', 'manager_approval_comment', 
    'clevel_approval_comment', 'manager_id', 'sh_tl_id',
    'clevel_id', 'is_manager_approved', 
    'sh_tl_rejection_comment', 'manager_rejection_comment', 
    'clevel_rejection_comment', 'req_id', 'item_unit_id'];
  

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
    public function store (){
        return $this->hasOne(Store::class);
    }
    public function ic (){
        return $this->hasOne(Ic::class);
    }
    public function manager (){
        return $this->hasOne(Manager::class);
    }
    public function shTl (){
        return $this->hasOne(ShTl::class);
    }
    public function Approvals (){
        return $this->hasMany(Approval::class);
    }
    public function quantityUnit (){
        return $this->belongsTo('App\Models\QuantityUnit', 'item_unit_id');
    }
    public static function boot()
{
    parent::boot();
    self::creating(function ($model) {
        $model->req_id = IdGenerator::generate(['table' => 'requisitions', 'field'=> 'req_id', 'length' => 10, 'prefix' =>date('REQ-')]);
    });
}
}
