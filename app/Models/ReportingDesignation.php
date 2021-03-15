<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportingDesignation extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function Users()
    {
        return $this->hasMany(User::class);
    }
    public function ReportingLines (){
        return $this->hasMany('App\ReportingLine', 'reporting_designation_id');
    }
}
