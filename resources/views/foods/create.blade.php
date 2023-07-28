@extends('Layout')
@section('title', '新規作成 (Food)')

@section('content')
<div class="container my-5">
    <h1 class="mt-5">新規作成 (Food)</h1>
    <div class="d-flex my-3">
        <a href="{{ route('foods.index') }}" class="btn btn-outline-primary me-3">一覧画面</a>
    </div>
    <form action="{{ route('foods.store') }}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <table class="table text-left">
            <tr>
                <th>名前</th>
                <td>
                    <input type="text" name="name" class="form-control" />
                </td>
            </tr>
            <tr>
                <th>説明</th>
                <td>
                    <textarea name="description" class="form-control" rows="5"></textarea>
                </td>
            </tr>
            <tr>
                <th>都道府県</th>
                <td>
                    <select name="prefecture_id" class="form-select">
                        <option value="">選択してください</option>
                        @foreach ($prefectures as $prefecture)
                        <option value="{{ $prefecture->id }}">{{ $prefecture->name }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
        </table>
        <div class="d-block">
            <button type="submit" class="btn btn-outline-secondary">作成</button>
        </div>
    </form>
</div>
@endsection
