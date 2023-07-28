<?php

namespace App\Http\Controllers;

use App\Http\Requests\FoodRequest;
use App\Models\Food;
use App\Models\Prefecture;
use App\Services\FoodService;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index(Request $request)
    {
        $foods = Food::all();
        return view('foods/index', compact('foods'));
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
}
