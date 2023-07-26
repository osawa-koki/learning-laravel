<head>
    <title>新規作成</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<div class="container">
    <h1 class="mt-5">新規作成</h1>
    <div class="d-flex my-3">
        <a href="/prefectures" class="btn btn-outline-primary me-3">一覧画面</a>
    </div>
    <form action="/prefectures" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <table class="table text-left">
            <tr>
                <th>名前</th>
                <td>
                    <input type="text" name="name" class="form-control" />
                </td>
            </tr>
            <tr>
                <th>県庁所在地</th>
                <td>
                    <input type="text" name="capital" class="form-control" />
                </td>
            </tr>
            <tr>
                <th>説明</th>
                <td>
                    <textarea name="description" class="form-control" rows="5"></textarea>
                </td>
            </tr>
            <tr>
                <th>人口</th>
                <td>
                    <input type="number" name="population" class="form-control" />
                </td>
            </tr>
            <tr>
                <th>面積</th>
                <td>
                    <input type="number" name="area" class="form-control" />
                </td>
            </tr>
            <tr>
                <th>訪問済み？</th>
                <td>
                    <input type="checkbox" name="visited" />
                </td>
            </tr>
        </table>
        <div class="d-block">
            <button type="submit" class="btn btn-outline-secondary">作成</button>
        </div>
    </form>
</div>
