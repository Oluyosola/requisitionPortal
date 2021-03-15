<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportingLine extends Model
{
    use HasFactory;
    use HasFactory;
    protected $fillable = ['name', 'reporting_designation_id'];

    public function Users()
    {
        return $this->hasMany(User::class);
    }
    public function Reportingdesignation (){
        return $this->belongsTo(ReportingDesignation::class);
    }
}
