<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;
    protected $fillable = ['img', 'name', 'ingradients','time'];
    public function favorite(){
        return $this->hasMany(FavoriteRecipe::class);
    }
}
