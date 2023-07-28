<?php

namespace App\Http\Controllers;

use App\Http\Requests\PrefectureRequest;
use App\Models\Prefecture;
use App\Services\PrefectureService;
use Illuminate\Http\Request;

class PrefectureController extends Controller
{
    public function index(Request $request)
    {
        $searcher = new PrefectureService($request);
        $data = $searcher->search();
        $prefectures = $data['prefectures'];
        $pagination = $data['pagination'];
        $serviceParams = $searcher->getServiceParams();

        return view('prefectures/index', compact('prefectures', 'pagination', 'serviceParams'));
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

    public function store(PrefectureRequest $request)
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

    public function update(PrefectureRequest $request, $id)
    {
        $prefecture = Prefecture::findOrFail($id);
        $prefecture->name = $request->name;
        $prefecture->capital = $request->capital;
        $prefecture->description = $request->description;
        $prefecture->population = $request->population;
        $prefecture->area = $request->area;
        $prefecture->visited = $request->visited;
        $prefecture->save();

        return redirect("/prefectures/{$prefecture->id}");
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
