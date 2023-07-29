@extends('Layout')
@section('title', '都道府県一覧')

@section('content')
<div class="container my-5">
    <h1>都道府県一覧</h1>
    <nav>
        <ul class="pagination pagination-sm">
            @for ($i = 3; $i >= 1; $i--)
                @if ($pagination['currentPage'] - $i > 0)
                    <li class="page-item"><a class="page-link" href="{{ add_query_params(['page' => $pagination['currentPage'] - $i]) }}">{{ $pagination['currentPage'] - $i }}</a></li>
                @else
                   <li class="page-item disabled"><a class="page-link">-</a></li>
                @endif
            @endfor
            <li class="page-item mx-3 disabled"><a class="page-link" href="{{ add_query_params(['page' => $pagination['currentPage']]) }}">{{ $pagination['currentPage'] }}</a></li>
            @for ($i = 1; $i <= 3; $i++)
            @if ($pagination['currentPage'] + $i <= $pagination['totalPages'])
                <li class="page-item"><a class="page-link" href="{{ add_query_params(['page' => $pagination['currentPage'] + $i]) }}">{{ $pagination['currentPage'] + $i }}</a></li>
            @else
                <li class="page-item disabled"><a class="page-link">-</a></li>
            @endif
        @endfor
        </ul>
    </nav>
    <table class="table text-center">
        <tr>
            <th>
                <div class="d-flex justify-content-around align-items-center">
                    <span>ID</span>
                    <a href="{{ add_query_params(
                        [
                            'orderBy' => 'id',
                            'order' => 'asc',
                        ]
                    ) }}"><i class="bi bi-arrow-up-circle"></i></a>
                    <a href="{{ add_query_params(
                        [
                            'orderBy' => 'id',
                            'order' => 'desc',
                        ]
                    ) }}"><i class="bi bi-arrow-down-circle"></i></a>
                </div>
            </th>
            <th class="text-center">
                <div class="d-flex justify-content-around align-items-center">
                    <span>都道府県名</span>
                    <a href="{{ add_query_params(
                        [
                            'orderBy' => 'name',
                            'order' => 'asc',
                        ]
                    ) }}"><i class="bi bi-arrow-up-circle"></i></a>
                    <a href="{{ add_query_params(
                        [
                            'orderBy' => 'name',
                            'order' => 'desc',
                        ]
                    ) }}"><i class="bi bi-arrow-down-circle"></i></a>
                </div>
            </th>
            <th class="text-center">
                <div class="d-flex justify-content-around align-items-center">
                    <span>県庁所在地</span>
                    <a href="{{ add_query_params(
                        [
                            'orderBy' => 'capital',
                            'order' => 'asc',
                        ]
                    ) }}"><i class="bi bi-arrow-up-circle"></i></a>
                    <a href="{{ add_query_params(
                        [
                            'orderBy' => 'capital',
                            'order' => 'desc',
                        ]
                    ) }}"><i class="bi bi-arrow-down-circle"></i></a>
                </div>
            </th>
            <th class="text-center">
                <div class="d-flex justify-content-around align-items-center">
                    <span>説明</span>
                    <a href="{{ add_query_params(
                        [
                            'orderBy' => 'description',
                            'order' => 'asc',
                        ]
                    ) }}"><i class="bi bi-arrow-up-circle"></i></a>
                    <a href="{{ add_query_params(
                        [
                            'orderBy' => 'description',
                            'order' => 'desc',
                        ]
                    ) }}"><i class="bi bi-arrow-down-circle"></i></a>
                </div>
            </th>
            <th class="text-center">
                <div class="d-flex justify-content-around align-items-center">
                    <span>人口</span>
                    <a href="{{ add_query_params(
                        [
                            'orderBy' => 'population',
                            'order' => 'asc',
                        ]
                    ) }}"><i class="bi bi-arrow-up-circle"></i></a>
                    <a href="{{ add_query_params(
                        [
                            'orderBy' => 'population',
                            'order' => 'desc',
                        ]
                    ) }}"><i class="bi bi-arrow-down-circle"></i></a>
                </div>
            </th>
            <th class="text-center">
                <div class="d-flex justify-content-around align-items-center">
                    <span>面積</span>
                    <a href="{{ add_query_params(
                        [
                            'orderBy' => 'area',
                            'order' => 'asc',
                        ]
                    ) }}"><i class="bi bi-arrow-up-circle"></i></a>
                    <a href="{{ add_query_params(
                        [
                            'orderBy' => 'area',
                            'order' => 'desc',
                        ]
                    ) }}"><i class="bi bi-arrow-down-circle"></i></a>
                </div>
            </th>
            <th class="text-center">
                <div class="d-flex justify-content-around align-items-center">
                    <span>人口密度</span>
                    <a href="{{ add_query_params(
                        [
                            'orderBy' => 'population_density',
                            'order' => 'asc',
                        ]
                    ) }}"><i class="bi bi-arrow-up-circle"></i></a>
                    <a href="{{ add_query_params(
                        [
                            'orderBy' => 'population_density',
                            'order' => 'desc',
                        ]
                    ) }}"><i class="bi bi-arrow-down-circle"></i></a>
                </div>
            </th>
            <th class="text-center">
                <div class="d-flex justify-content-around align-items-center">
                    <span>訪問済み？</span>
                    <a href="{{ add_query_params(
                        [
                            'orderBy' => 'visited',
                            'order' => 'asc',
                        ]
                    ) }}"><i class="bi bi-arrow-up-circle"></i></a>
                    <a href="{{ add_query_params(
                        [
                            'orderBy' => 'visited',
                            'order' => 'desc',
                        ]
                    ) }}"><i class="bi bi-arrow-down-circle"></i></a>
                </div>
            </th>
        </tr>
        @foreach($prefectures as $prefecture)
        <tr>
            <td>{{ $prefecture['id'] }}</td>
            <td><a href="/prefectures/{{ $prefecture['id'] }}">{{ $prefecture['name'] }}</a></td>
            <td>{{ $prefecture['capital'] }}</td>
            <td>{{ description_shorten($prefecture['description']) }}</td>
            <td>{{ integer_prettify($prefecture['population'] )}}</td>
            <td>{{ integer_prettify($prefecture['area']) }}</td>
            <td>{{ float_prettify($prefecture['population'] / $prefecture['area']) }}</td>
            <td>
                @if ($prefecture['visited'])
                <span class="badge bg-primary">🟢 訪問済</span>
                @else
                <span class="badge bg-danger">🟡 未訪問</span>
                @endif
            </td>
        </tr>
        @endforeach
    </table>
    <div><a href="{{ route('prefectures.create') }}" class="btn btn-outline-secondary">新規作成</a></div>
    <hr class="my-5" />
    <form action="{{ route('prefectures.index') }}" method="get" class="mt-5">
        <div class="d-flex">
            <button type="submit" class="btn btn-outline-secondary me-3">検索</button>
            <a href="{{ route('prefectures.index') }}" class="btn btn-secondary me-3">リセット</a>
        </div>
        <table class="table text-left mt-3">
            <tbody>
                <tr>
                    <th>都道府県名で検索</th>
                    <td><input type="text" name="name" class="form-control" placeholder="都道府県名で検索" value="{{ $serviceParams['name'] }}" /></td>
                </tr>
                <tr>
                    <th>県庁所在地で検索</th>
                    <td><input type="text" name="capital" class="form-control" placeholder="県庁所在地で検索" value="{{ $serviceParams['capital'] }}" /></td>
                </tr>
                <tr>
                    <th>説明で検索</th>
                    <td><input type="text" name="description" class="form-control" placeholder="説明で検索" value="{{ $serviceParams['description'] }}" /></td>
                </tr>
                <tr>
                    <th>人口で検索 (最低)</th>
                    <td>
                        <input type="range" name="populationMin" class="form-range" min="0" max="15000000" step="100" value="{{ $serviceParams['populationMin'] }}" oninput="document.getElementById('search-population-min').textContent = window.integerPrettify(this.value);" />
                        <span id="search-population-min">{{ integer_prettify($serviceParams['populationMin']) }}</span>
                    </td>
                </tr>
                <tr>
                    <th>人口で検索 (最高)</th>
                    <td>
                        <input type="range" name="populationMax" class="form-range" min="0" max="15000000" step="100" oninput="document.getElementById('search-population-max').textContent = window.integerPrettify(this.value);" value="{{ $serviceParams['populationMax'] }}" />
                        <span id="search-population-max">{{ integer_prettify($serviceParams['populationMax']) }}</span>
                    </td>
                </tr>
                <tr>
                    <th>面積で検索 (最低)</th>
                    <td>
                        <input type="range" name="areaMin" class="form-range" min="0" max="100000" step="100" oninput="document.getElementById('search-area-min').textContent = window.integerPrettify(this.value);" value="{{ $serviceParams['areaMin'] }}" />
                        <span id="search-area-min">{{ integer_prettify($serviceParams['areaMin']) }}</span>
                    </td>
                </tr>
                <tr>
                    <th>面積で検索 (最高)</th>
                    <td>
                        <input type="range" name="areaMax" class="form-range" min="0" max="100000" step="100" oninput="document.getElementById('search-area-max').textContent = window.integerPrettify(this.value);" value="{{ $serviceParams['areaMax'] }}" />
                        <span id="search-area-max">{{ integer_prettify($serviceParams['areaMax']) }}</span>
                    </td>
                </tr>
                <tr>
                    <th>人口密度で検索 (最低)</th>
                    <td>
                        <input type="range" name="populationDensityMin" class="form-range" min="0" max="300" step="10" oninput="document.getElementById('search-population-density-min').textContent = this.value;" value="{{ $serviceParams['populationDensityMin'] }}" />
                        <span id="search-population-density-min">{{ float_prettify($serviceParams['populationDensityMin']) }}</span>
                    </td>
                </tr>
                <tr>
                    <th>人口密度で検索 (最高)</th>
                    <td>
                        <input type="range" name="populationDensityMax" class="form-range" min="0" max="300" step="10" oninput="document.getElementById('search-population-density-max').textContent = this.value;" value="{{ $serviceParams['populationDensityMax'] }}" />
                        <span id="search-population-density-max">{{ float_prettify($serviceParams['populationDensityMax']) }}</span>
                    </td>
                </tr>
                <tr>
                    <th>訪問済み？</th>
                    <td>
                        <select name="visited" class="form-select">
                            <option value="">指定なし</option>
                            <option value="1" @if ($serviceParams['visited'] === true) selected @endif>訪問済み</option>
                            <option value="0" @if ($serviceParams['visited'] === false) selected @endif>未訪問</option>
                        </select>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>
@endsection
