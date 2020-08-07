<?php

namespace App;

use Nicolaslopezj\Searchable\SearchableTrait;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // trait for search
    use SearchableTrait;use SearchableTrait;

    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'products.name' => 10,
            'products.details' => 5,
            'products.description' => 3,
        ],
    ];


    protected $guarded = [];

    public function presentPrice() {
        return '€'.($this->price / 100);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function orders() {
        $this->belongsToMany('App\Order');
    }

}
