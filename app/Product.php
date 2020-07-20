<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function presentPrice() {
        return '€ '.($this->price / 100);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

}
