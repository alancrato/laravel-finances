<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BillReceive extends Model
{
    // Mass Assignment
    protected $fillable = [
        'name',
        'date_launch',
        'value',
        'user_id'
    ];
}
