<head>
    <title>都道府県一覧</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
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
            <th class="text-center">訪問済み？</th>
        </tr>
        @foreach($prefectures as $prefecture)
        <tr>
            <td><a href="/prefectures/{{ $prefecture->id }}">{{ $prefecture->name }}</a></td>
            <td>{{ $prefecture->capital }}</td>
            <td>{{ description_shorten($prefecture->description) }}</td>
            <td>{{ integer_prettify($prefecture->population )}}</td>
            <td>{{ integer_prettify($prefecture->area) }}</td>
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
        <table class="table text-left">
            <tbody>
                <tr>
                    <th>都道府県名で検索</th>
                    <td><input type="text" name="name" class="form-control" placeholder="都道府県名で検索" /></td>
                </tr>
                <tr>
                    <th>県庁所在地で検索</th>
                    <td><input type="text" name="capital" class="form-control" placeholder="県庁所在地で検索" /></td>
                </tr>
                <tr>
                    <th>説明で検索</th>
                    <td><input type="text" name="description" class="form-control" placeholder="説明で検索" /></td>
                </tr>
                <tr>
                    <th>人口で検索 (最低)</th>
                    <td>
                        <input type="range" name="population" class="form-range" min="0" max="10000000" step="100000" value="0" oninput="document.getElementById('search-population-min').textContent = this.value;" />
                        <span id="search-population-min">0</span>
                    </td>
                </tr>
                <tr>
                    <th>人口で検索 (最高)</th>
                    <td>
                        <input type="range" name="population" class="form-range" min="0" max="10000000" step="100000" value="10000000" oninput="document.getElementById('search-population-max').textContent = this.value;" />
                        <span id="search-population-max">10000000</span>
                    </td>
                </tr>
                <tr>
                    <th>面積で検索 (最低)</th>
                    <td>
                        <input type="range" name="area" class="form-range" min="0" max="10000000" step="100000" value="0" oninput="document.getElementById('search-area-min').textContent = this.value;" />
                        <span id="search-area-min">0</span>
                    </td>
                </tr>
                <tr>
                    <th>面積で検索 (最高)</th>
                    <td>
                        <input type="range" name="area" class="form-range" min="0" max="10000000" step="100000" value="10000000" oninput="document.getElementById('search-area-max').textContent = this.value;" />
                        <span id="search-area-max">10000000</span>
                    </td>
                </tr>
                <tr>
                    <th>人口密度で検索 (最低)</th>
                    <td>
                        <input type="range" name="population_density" class="form-range" min="0" max="10000000" step="100000" value="0" oninput="document.getElementById('search-population-density-min').textContent = this.value;" />
                        <span id="search-population-density-min">0</span>
                    </td>
                </tr>
                <tr>
                    <th>人口密度で検索 (最高)</th>
                    <td>
                        <input type="range" name="population_density" class="form-range" min="0" max="10000000" step="100000" value="10000000" oninput="document.getElementById('search-population-density-max').textContent = this.value;" />
                        <span id="search-population-density-max">10000000</span>
                    </td>
                </tr>
                <tr>
                    <th>訪問済み？</th>
                    <td>
                        <input type="hidden" name="visited" value="0" />
                        <input type="checkbox" name="visited" value="1" />
                    </td>
                </tr>
            </tbody>
        </table>
        <button type="submit" class="btn btn-outline-secondary">検索</button>
    </form>
</div>
