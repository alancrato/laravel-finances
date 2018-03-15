<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryCosts extends Model
{
    //Comment model push test
    protected $fillable = [
        'name'
    ];

    public function rules()
    {
        return [
          'name' => 'required|min:3|max:100'
        ];
    }
}
