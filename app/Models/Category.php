<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public const CATEGORIES_COUNT = 5;
    public const TRAVEL_CATEGORY = 'travel';
    public const SPORT_CATEGORY = 'sport';
    public const IT_CATEGORY = 'it';
    public const FASHION_CATEGORY = 'fashion';
    public const FOOD_CATEGORY = 'food';

    public const CATEGORIES = [
        self::TRAVEL_CATEGORY,
        self::SPORT_CATEGORY,
        self::FASHION_CATEGORY,
        self::FOOD_CATEGORY,
        self::IT_CATEGORY,
    ];

    protected $table = 'categories';

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
