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
}
