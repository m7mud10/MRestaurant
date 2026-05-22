<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoriteRecipe extends Model
{
    use HasFactory;
    protected $fillable = ['device_id', 'recipe_id'];
    public function recipe(){
        return $this->belongsTo(Recipe::class);
    }
}
