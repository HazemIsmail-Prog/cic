<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Recipe extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function items()
    {
        return $this->belongsToMany(Item::class, 'item_recipe')->withPivot('quantity');
    }
}
