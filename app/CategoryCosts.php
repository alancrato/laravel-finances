<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryCosts extends Model
{
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
