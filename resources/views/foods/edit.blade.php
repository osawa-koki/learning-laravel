@extends('Layout')
@section('title', $food->name)

@section('content')
<div class="container my-5">
    <form action="{{ route('foods.update', $food->id) }}" method="post">
        <input type="hidden" name="_method" value="PUT" />
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <h1 class="mt-5">
            <input type="text" name="name" class="form-control" value="{{ $food->name }}" />
        </h1>
        <div class="d-flex my-3">
            <button type="submit" class="btn btn-outline-secondary me-3">更新</button>
            <a href="{{ route('foods.index') }}" class="btn btn-outline-primary me-3">一覧画面</a>
            <a href="{{ route('foods.create') }}" class="btn btn-outline-info me-3">新規作成</a>
        </div>
        <table class="table text-left">
            <tr>
                <th>説明</th>
                <td>
                    <textarea name="description" class="form-control" rows="5">{{ $food->description }}</textarea>
                </td>
            </tr>
            <tr>
                <th>都道府県</th>
                <td>
                    <select name="prefecture_id" class="form-select">
                        @foreach ($prefectures as $prefecture)
                        <option value="{{ $prefecture->id }}" @if ($prefecture->id === $food->prefecture_id) selected @endif>
                            {{ $prefecture->name }} ({{ $prefecture->capital }})
                        </option>
                        @endforeach
                    </select>
                </td>
            </tr>
        </table>
    </form>
    <form action="{{ route('foods.delete', $food->id) }}" method="post">
        <input type="hidden" name="_method" value="DELETE" />
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <button type="submit" class="btn btn-outline-danger w-100" onclick="return confirm('削除しますか？')">削除</button>
    </form>
</div>
@endsection
