<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreApproval extends Model
{
    use HasFactory;
    protected $fillable = ['requisition_id', 'is_approved', 'approval_comment', 'rejection_comment', 'store_id'];
    public function Users()
    {
        return $this->belongsToMany('App\Models\User', 'id');
    }
    public function requisition()
    {
        return $this->belongsTo('App\Models\Requisition', 'id');
    }
}
