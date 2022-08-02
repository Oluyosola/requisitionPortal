<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesignationType extends Model
{
    use HasFactory;
    protected $fillable = ['name','designation_id'];

    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function Designation(){
        return $this->belongsTo(Designation::class);
    }
}
