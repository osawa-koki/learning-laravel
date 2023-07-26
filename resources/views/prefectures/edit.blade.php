<head>
    <title>{{ $prefecture->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<div class="container">
    <h1 class="mt-5">{{ $prefecture->name }}</h1>
    <div class="d-flex my-3">
        <a href="/prefectures" class="btn btn-outline-primary me-3">一覧画面</a>
        <a href="/prefectures/create" class="btn btn-outline-info me-3">新規作成</a>
    </div>
    <form action="/prefectures/{{ $prefecture->id }}" method="post">
        <input type="hidden" name="_method" value="PUT">
        <table class="table text-left">
            <tr>
                <th>県庁所在地</th>
                <td>{{ $prefecture->capital }}</td>
            </tr>
            <tr>
                <th>説明</th>
                <td>
                    <textarea name="description" class="form-control" rows="5">{{ $prefecture->description }}</textarea>
                </td>
            </tr>
            <tr>
                <th>人口</th>
                <td>{{ $prefecture->population }}</td>
            </tr>
            <tr>
                <th>面積</th>
                <td>{{ $prefecture->area }}</td>
            </tr>
            <tr>
                <th>人口密度</th>
                <td>{{ $prefecture->population / $prefecture->area }}</td>
            </tr>
            <tr>
                <th>訪問済み？</th>
                <td>
                    <input type="checkbox" name="visited" value="1" {{ $prefecture->visited ? 'checked' : '' }} />
                </td>
            </tr>
        </table>
        <div class="d-block">
            <button type="submit" class="btn btn-outline-secondary">更新</button>
        </div>
    </form>
</div>
