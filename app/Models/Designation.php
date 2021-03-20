<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    // public function Users(){
    //     return $this->hasMany(User::class);
    // }
    public function Users()
    {
        return $this->hasMany(User::class);
    }
}
