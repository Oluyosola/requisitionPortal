<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManagerApproval extends Model
{
    use HasFactory;
    protected $fillable = ['requisition_id', 'is_approved', 'approval_comment', 'rejection_comment', 'manager_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function requisition()
    {
        return $this->belongsTo(Requisition::class);
    }
}
