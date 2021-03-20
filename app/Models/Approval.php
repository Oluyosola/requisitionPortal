<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Approval extends Model
{
    use HasFactory;
    protected $fillable = ['is_sh_tl_approved', 'is_clevel_approved',
    'sh_tl_comment', 'manager_comment', 'clevel_comment', 'manager_id', 'sh_tl_id', 'clevel_id', 'is_manager_approved', 'requisition_id'];

    public function Requisition()
    {
        return $this->belongsTo(Requisition::class);
    }
    public function Users()
    {
        return $this->belongsToMany('App\Models\User', 'sh_tl_id', 'clevel_id','manager_id' );
    }
}
