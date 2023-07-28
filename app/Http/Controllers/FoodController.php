<?php

namespace App\Http\Controllers;

use App\Http\Requests\FoodRequest;
use App\Models\Food;
use App\Models\Prefecture;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index(Request $request)
    {
        $foods = Food::all();

        return view('foods/index', compact('foods'));
    }

    public function show($id)
    {
        $food = Food::findOrFail($id);

        return view('foods/show', compact('food'));
    }

    public function create()
    {
        $prefectures = Prefecture::all();

        return view('foods/create', compact('prefectures'));
    }

    public function store(FoodRequest $request)
    {
        $food = new Food();
        $food->name = $request->name;
        $food->prefecture_id = $request->prefecture_id;
        $food->save();

        return redirect("/foods/{$food->id}");
    }

    public function edit($id)
    {
        $food = Food::findOrFail($id);
        $prefectures = Prefecture::all();

        return view('foods/edit', compact('food', 'prefectures'));
    }
}
