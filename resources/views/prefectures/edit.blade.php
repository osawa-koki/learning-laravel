<head>
    <title>{{ $prefecture->name }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.ts'])
</head>
<div class="container my-5">
    <form action="/prefectures/{{ $prefecture->id }}" method="post">
        <input type="hidden" name="_method" value="PUT" />
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <h1 class="mt-5">
            <input type="text" name="name" class="form-control" value="{{ $prefecture->name }}" />
        </h1>
        <div class="d-flex my-3">
            <button type="submit" class="btn btn-outline-secondary me-3">更新</button>
            <a href="/prefectures" class="btn btn-outline-primary me-3">一覧画面</a>
            <a href="/prefectures/create" class="btn btn-outline-info me-3">新規作成</a>
        </div>
        <table class="table text-left">
            <tr>
                <th>県庁所在地</th>
                <td>
                    <input type="text" name="capital" class="form-control" value="{{ $prefecture->capital }}" />
                </td>
            </tr>
            <tr>
                <th>説明</th>
                <td>
                    <textarea name="description" class="form-control" rows="5">{{ $prefecture->description }}</textarea>
                </td>
            </tr>
            <tr>
                <th>人口</th>
                <td>
                    <input type="number" name="population" class="form-control" value="{{ $prefecture->population }}" />
                </td>
            </tr>
            <tr>
                <th>面積</th>
                <td>
                    <input type="number" name="area" class="form-control" value="{{ $prefecture->area }}" />
                </td>
            </tr>
            <tr>
                <th>人口密度</th>
                <td>{{ float_prettify($prefecture->population / $prefecture->area) }}</td>
            </tr>
            <tr>
                <th>訪問済み？</th>
                <td>
                    <input type="hidden" name="visited" value="0" />
                    <input type="checkbox" name="visited" value="1" {{ $prefecture->visited ? 'checked' : '' }} />
                </td>
            </tr>
        </table>
    </form>
    <form action="/prefectures/{{ $prefecture->id }}" method="post">
        <input type="hidden" name="_method" value="DELETE" />
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <button type="submit" class="btn btn-outline-danger w-100" onclick="return confirm('削除しますか？')">削除</button>
    </form>
    <hr />
    <h2>食べ物</h2>
    <form class="d-flex flex-wrap mt-3" action="/foods/{{ $prefecture->id }}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <input type="hidden" name="_method" value="DELETE" />
        @foreach ($prefecture->foods as $food)
        <div class="card me-3 mb-3">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-around">
                    <h5 class="card-title m-2">{{ $food->name }}</h5>
                    <!-- <i class="bi bi-trash3-fill text-danger" role="button"></i> -->
                    <button type="submit" class="btn btn-outline-danger" onclick="return confirm('削除しますか？')">
                        <i class="bi bi-trash3-fill"></i>
                    </button>
                </div>
                <p class="card-text">{{ $food->description }}</p>
            </div>
        </div>
        @endforeach
    </form>
</div>
