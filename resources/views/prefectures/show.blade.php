<head>
    <title>{{ $prefecture->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<div class="container">
    <h1 class="mt-5">{{ $prefecture->name }}</h1>
    <div class="d-flex my-3">
        <a href="/prefectures/{{ $prefecture->id }}/edit" class="btn btn-outline-secondary me-3">編集</a>
        <a href="/prefectures" class="btn btn-outline-primary me-3">一覧画面</a>
        <a href="/prefectures/create" class="btn btn-outline-info me-3">新規作成</a>
    </div>
    <h2>詳細</h2>
    <form action="/prefectures/{{ $prefecture->id }}" method="post">
        <input type="hidden" name="_method" value="PUT" />
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <table class="table text-left">
            <tr>
                <th>県庁所在地</th>
                <td>{{ $prefecture->capital }}</td>
            </tr>
            <tr>
                <th>説明</th>
                <td>
                    <textarea name="description" class="form-control" rows="5" readonly>{{ $prefecture->description }}</textarea>
                </td>
            </tr>
            <tr>
                <th>人口</th>
                <td>{{ integer_prettify($prefecture->population) }}</td>
            </tr>
            <tr>
                <th>面積</th>
                <td>{{ integer_prettify($prefecture->area) }}</td>
            </tr>
            <tr>
                <th>人口密度</th>
                <td>{{ float_prettify($prefecture->population / $prefecture->area) }}</td>
            </tr>
            <tr>
                <th>訪問済み？</th>
                <td>
                @if ($prefecture->visited)
                <span class="badge bg-primary">🟢 訪問済</span>
                @else
                <span class="badge bg-danger">🟡 未訪問</span>
                @endif
                </td>
            </tr>
        </table>
    </form>
    <hr />
    <h2>食べ物</h2>
    @foreach ($prefecture->foods as $food)
    <div class="card my-3">
        <div class="card-body">
            <h5 class="card-title">{{ $food->name }}</h5>
            <p class="card-text">{{ $food->description }}</p>
        </div>
    </div>
    @endforeach
</div>
