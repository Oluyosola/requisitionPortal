<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'unit_id',
        'designation_id',
        'designation_type_id',
        'reporting_designation_id',
        'reporting_designation_type_id',
        
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function requisitions(){
        return $this->hasMany(Requisition::class);
    }
    public function stores(){
        return $this->hasMany(StoreApproval::class);
    }
    public function ics(){
        return $this->hasMany(IcApproval::class);
    }
    public function managers(){
        return $this->hasMany(ManagerApproval::class);
    }
    public function shTls(){
        return $this->hasMany(ShTlApproval::class);
    }
    public function unit(){
        return $this->belongsTo(Unit::class);
    }
    public function designation()
    {
        return $this->belongsTo(Designation::class);
    }
    public function designationType()
    {
        return $this->belongsTo(DesignationType::class);
    }
    
}
