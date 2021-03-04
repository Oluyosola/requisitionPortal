<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requisition extends Model
{
    use HasFactory;
    protected $fillable = ['item_id', 'category_id', 'description', 'quantity', 'user_id', 'status_id'];
   
}
