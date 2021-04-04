<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesignationType extends Model
{
    use HasFactory;
    protected $fillable = ['name','designation_id'];

    public function Users()
    {
        return $this->hasMany(User::class);
    }
    public function Designations (){
        return $this->hasMany('App\Designation', 'designation_id');
    }
}
