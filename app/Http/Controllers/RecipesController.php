<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecipesController extends Controller
{
    public function showUser()
    {
        $recipe = Recipe::all();
        return view('welcome', ['recipe' => $recipe]);
    }
    public function index()
    {
        $recipe = Recipe::all();
        return view('dashboard.admin.index', ['recipe' => $recipe]);
    }

    public function create()
    {
        return view('dashboard.admin.create');
    }

    public function store(Request $request)
    {
        $img = $request->img;
        if($img){
            $extention = $img->getClientOriginalExtension();
            $imgName = $img->getClientOriginalName(). '.'.$extention;
            $img->move(public_path('/imgs'),$imgName);
        }
        Recipe::create([
            'img' => $request->img ? $imgName: '0.png',
            'name' => $request->name,
            'ingradients' => $request->ingradients,
            'time' => $request->time
        ]);
        return redirect()->route('index')->with('success', 'Recipe Added Successfully!');
    }

    // public function show(string $id)
    // {
    //     $recipe = Recipe::find($id);
    //     return view('recipes.show', ['recipe' => $recipe]);
    // }

    public function edit(string $id)
    {
        $recipe = Recipe::find($id);
        return view('dashboard.admin.edit', ['recipe' => $recipe]);
    }

    public function update(Request $request, string $id)
    {
        $recipe = Recipe::find($id);
        $recipe->update([
            'img' => $request->img ,
            'name' => $request->name,
            'ingradients' => $request->ingradients,
            'time'=>$request->time
        ]);
        return redirect()->route('index')->with('success', 'Recipe Updated Successfully!');
    }

    public function destroy(string $id)
    {
        $recipe = Recipe::find($id);
        $recipe->delete();
        return redirect()->route('index')->with('success', 'Recipe Deleted Successfully!');
    }
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate()
    {
        $validated = request()->validate(
            [
                'email'=>'required|email',
                'password'=>'required|min:8'
                
            ]
        );
        if (Auth::attempt($validated)){
            request()->session()->regenerate();
            return redirect()->route('index')->with('success','Logged in successfully!');
        }
        return redirect()->route('login')->withErrors([
            'password'=> 'Valid Email or Password'
            
        ]);
    }
    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('home')->with('success','Logged out successfully!');
    }
}
