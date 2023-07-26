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
            <td>{{ $prefecture->description }}</td>
            <td>{{ $prefecture->population }}</td>
            <td>{{ $prefecture->area }}</td>
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
</div>
