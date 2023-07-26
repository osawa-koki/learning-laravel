<head>
    <title>都道府県一覧</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<div class="container ops-main">
    <h1>都道府県一覧</h1>
    <table class="table text-center">
        <tr>
            <th class="text-center">名前</th>
            <th class="text-center">県庁所在地</th>
            <th class="text-center">説明</th>
            <th class="text-center">人口</th>
            <th class="text-center">面積</th>
            <th class="text-center">訪問済み</th>
        </tr>
        @foreach($prefectures as $prefecture)
        <tr>
            <td><a href="/prefectures/{{ $prefecture->id }}/edit">{{ $prefecture->name }}</a></td>
            <td>{{ $prefecture->capital }}</td>
            <td>{{ $prefecture->description }}</td>
            <td>{{ $prefecture->population }}</td>
            <td>{{ $prefecture->area }}</td>
            <td>{{ $prefecture->visited }}</td>
        </tr>
        @endforeach
    </table>
    <div><a href="/prefectures/create" class="btn btn-default">新規作成</a></div>
</div>
