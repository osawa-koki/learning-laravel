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
        $searcher = new FoodService($request);
        $data = $searcher->search();
        $foods = $data['foods'];
        $pagination = $data['pagination'];
        $serviceParams = $searcher->getServiceParams();

        return view('foods/index', compact('foods', 'pagination', 'serviceParams'));
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
        $food->description = $request->description;
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

    public function update(FoodRequest $request, $id)
    {
        $food = Food::findOrFail($id);
        $food->name = $request->name;
        $food->description = $request->description;
        $food->prefecture_id = $request->prefecture_id;
        $food->save();

        return redirect("/foods/{$food->id}");
    }

    public function destroy($id)
    {
        $food = Food::findOrFail($id);
        $food->delete();

        return redirect('/foods');
    }
}
