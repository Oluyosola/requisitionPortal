<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportingManager extends Model
{
    use HasFactory;
    protected $fillable = ['reporting_manager'];
    
    public function Users(){
        return $this->hasMany(User::class);
    }
}
