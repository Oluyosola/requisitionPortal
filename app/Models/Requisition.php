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
    'description', 'quantity', 'user_id', 'req_id', 'unit_id'];
  

    public function category (){
        return $this->belongsTo(Category::class);
    }
    public function item (){
        return $this->belongsTo(Item::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function store (){
        return $this->hasOne(StoreApproval::class);
    }
    public function ic (){
        return $this->hasOne(IcApproval::class);
    }
    public function manager (){
        return $this->hasOne(ManagerApproval::class);
    }
    public function shTl(){
        return $this->hasOne(ShTlApproval::class);
    }
    public function quantityUnit (){
        return $this->belongsTo(QuantityUnit::class);
    }
    public static function boot()
{
    parent::boot();
    self::creating(function ($model) {
        $model->req_id = IdGenerator::generate(['table' => 'requisitions', 'field'=> 'req_id', 'length' => 10, 'prefix' =>date('REQ-')]);
    });
}
}
