<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FavoriteResource;
use App\Http\Resources\RecipeResource;
use App\Models\FavoriteRecipe;
use App\Models\Recipe;
use Illuminate\Http\Request;

class FavoriteRecipeController extends Controller
{

    public function indexAll()
    {
        $recipe = Recipe::all();
        return response()->json(['message' => 'success', 'data' => RecipeResource::collection($recipe)]);
    }
    public function index($device_id)
    {
        $favoriteRecipe = FavoriteRecipe::with('Recipe')->where('device_id',$device_id)->get();
        return response()->json(['message' => 'success', 'data' => FavoriteResource::collection($favoriteRecipe)]);
    }

    public function store(Request $request)
    {
        FavoriteRecipe::create([
            'device_id' => $request->device_id,
            'recipe_id' => $request->recipe_id,
        ]);
        return response()->json(['message' => 'success']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $favoriteRecipe = FavoriteRecipe::find($id);
        return response()->json(['message' => 'Added success', 'data' => $favoriteRecipe]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }
    public function update(Request $request, string $id)
    {
        $favoriteRecipe = FavoriteRecipe::find($id);
        $favoriteRecipe->update($request->all());
        return response()->json(['message' => 'Updated success', 'data' => $favoriteRecipe]);
    }

    public function destroy(string $id)
    {
        $favoriteRecipe = FavoriteRecipe::find($id);
        $favoriteRecipe->delete();
        return response()->json(['message' => 'Deleted success']);
    }
}
