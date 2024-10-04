<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function recipes()
    {
        return $this->belongsToMany(Recipe::class, 'item_recipe')->withPivot('quantity');
    }
}
