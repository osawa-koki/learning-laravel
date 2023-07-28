@extends('Layout')
@section('title', $food->name)

@section('content')
<div class="container my-5">
    <h1 class="mt-5">{{ $food->name }}</h1>
    <div class="d-flex my-3">
        <a href="{{ route('foods.edit', $food->id) }}" class="btn btn-outline-secondary me-3">編集</a>
        <a href="{{ route('foods.index') }}" class="btn btn-outline-primary me-3">一覧画面</a>
        <a href="{{ route('foods.create') }}" class="btn btn-outline-info me-3">新規作成</a>
    </div>
    <h2>詳細</h2>
    <form action="/foods/{{ $food->id }}" method="post">
        <input type="hidden" name="_method" value="PUT" />
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <table class="table text-left">
            <tr>
                <th>説明</th>
                <td>
                    <textarea name="description" class="form-control" rows="5" readonly>{{ $food->description }}</textarea>
                </td>
            </tr>
            <tr>
                <th>都道府県</th>
                <td>
                    {{ $food['prefecture']->name }} ({{ $food['prefecture']->capital }})
                </td>
            </tr>
        </table>
    </form>
</div>
@endsection
