<?php

namespace App\Http\Controllers;

use App\Models\Prefecture;

class PrefectureController extends Controller
{
    public function index()
    {
        $prefectures = Prefecture::all();

        return view('prefectures/index', compact('prefectures'));
    }

    public function create()
    {
        return view('prefectures/create');
    }

    public function edit($id)
    {
        // DBよりURIパラメータと同じIDを持つBookの情報を取得
        $prefecture = Prefecture::findOrFail($id);

        // 取得した値をビュー「book/edit」に渡す
        return view('prefectures/edit', compact('prefecture'));
    }
}
