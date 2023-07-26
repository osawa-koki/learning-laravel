<?php

namespace App\Http\Controllers;

use App\Models\Prefecture;
use Illuminate\Http\Request;

class PrefectureController extends Controller
{
    public function index()
    {
        $prefectures = Prefecture::all();

        return view('prefectures/index', compact('prefectures'));
    }

    public function show($id)
    {
        $prefecture = Prefecture::findOrFail($id);

        return view('prefectures/show', compact('prefecture'));
    }

    public function create()
    {
        return view('prefectures/create');
    }

    public function store(Request $request)
    {
        $book = new Prefecture();
        $book->name = $request->name;
        $book->capital = $request->capital;
        $book->description = $request->description;
        $book->population = $request->population;
        $book->area = $request->area;
        $book->visited = $request->visited;
        $book->save();

        return redirect("/prefectures/{$book->id}");
    }

    public function update(Request $request, $id)
    {
        $prefecture = Prefecture::findOrFail($id);
        $prefecture->description = $request->description;
        $prefecture->visited = $request->visited;
        $prefecture->save();

        return redirect('/prefectures');
    }

    public function edit($id)
    {
        // DBよりURIパラメータと同じIDを持つBookの情報を取得
        $prefecture = Prefecture::findOrFail($id);

        // 取得した値をビュー「book/edit」に渡す
        return view('prefectures/edit', compact('prefecture'));
    }

    public function destroy($id)
    {
        $prefecture = Prefecture::findOrFail($id);
        $prefecture->delete();

        return redirect('/prefectures');
    }
}
