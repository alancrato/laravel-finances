<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BillPay extends Model
{
    // Mass Assignment
    protected $fillable = [
        'name',
        'date_launch',
        'value',
        'category_id',
        'user_id'
    ];

    public function rules()
    {
        return [
            'name' => 'required|min:3|max:100',
            'date_launch' => 'required|date',
            'value' => 'required'
        ];
    }

    public function category()
    {
        return $this->belongsTo(CategoryCosts::class);
    }
}
