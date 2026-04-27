<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Book extends Model {
    protected $fillable = [
        'book_name',
        'book_description',
        'category',
        'author',
        "price",
        'book_img'
    ];
    public function review(): HasMany
    {
        return $this->hasMany(Review::class);
    }

}
