<head>
    <title>都道府県一覧</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.ts'])
</head>
<div class="container mt-5">
    <h1>都道府県一覧</h1>
    <table class="table text-center">
        <tr>
            <th class="text-center">名前</th>
            <th class="text-center">県庁所在地</th>
            <th class="text-center">説明</th>
            <th class="text-center">人口</th>
            <th class="text-center">面積</th>
            <th class="text-center">人口密度</th>
            <th class="text-center">訪問済み？</th>
        </tr>
        @foreach($prefectures as $prefecture)
        <tr>
            <td><a href="/prefectures/{{ $prefecture->id }}">{{ $prefecture->name }}</a></td>
            <td>{{ $prefecture->capital }}</td>
            <td>{{ description_shorten($prefecture->description) }}</td>
            <td>{{ integer_prettify($prefecture->population )}}</td>
            <td>{{ integer_prettify($prefecture->area) }}</td>
            <td>{{ float_prettify($prefecture->population / $prefecture->area) }}</td>
            <td>
                @if ($prefecture->visited)
                <span class="badge bg-primary">🟢 訪問済</span>
                @else
                <span class="badge bg-danger">🟡 未訪問</span>
                @endif
            </td>
        </tr>
        @endforeach
    </table>
    <div><a href="/prefectures/create" class="btn btn-outline-secondary">新規作成</a></div>
    <hr class="my-5" />
    <form action="/prefectures" method="get" class="mt-5">
        <div class="d-flex">
            <button type="submit" class="btn btn-outline-secondary me-3">検索</button>
            <a href="/prefectures" class="btn btn-secondary me-3">リセット</a>
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
                        <input type="range" name="populationMin" class="form-range" min="0" max="10000000" step="100" value="{{ $serviceParams['populationMin'] }}" oninput="document.getElementById('search-population-min').textContent = window.integerPrettify(this.value);" />
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
