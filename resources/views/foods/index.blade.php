@extends('Layout')
@section('title', '食べ物一覧')

@section('content')
<div class="container my-5">
    <h1>食べ物一覧</h1>
    <nav>
        <ul class="pagination pagination-sm">
            @for ($i = 3; $i >= 1; $i--)
                @if ($pagination['currentPage'] - $i > 0)
                    <li class="page-item"><a class="page-link" href="{{ add_query_params(['page' => $pagination['currentPage'] - $i]) }}">{{ $pagination['currentPage'] - $i }}</a></li>
                @else
                   <li class="page-item disabled"><a class="page-link">-</a></li>
                @endif
            @endfor
            <li class="page-item mx-3 disabled"><a class="page-link" href="{{ add_query_params(['page' => $pagination['currentPage']]) }}">{{ $pagination['currentPage'] }}</a></li>
            @for ($i = 1; $i <= 3; $i++)
            @if ($pagination['currentPage'] + $i <= $pagination['totalPages'])
                <li class="page-item"><a class="page-link" href="{{ add_query_params(['page' => $pagination['currentPage'] + $i]) }}">{{ $pagination['currentPage'] + $i }}</a></li>
            @else
                <li class="page-item disabled"><a class="page-link">-</a></li>
            @endif
        @endfor
        </ul>
    </nav>
    <table class="table text-center">
        <tr>
            <th>
                <div class="d-flex justify-content-around align-items-center">
                    <span>ID</span>
                    <a href="{{ add_query_params(
                        [
                            'orderBy' => 'id',
                            'order' => 'asc',
                        ]
                    ) }}"><i class="bi bi-arrow-up-circle"></i></a>
                    <a href="{{ add_query_params(
                        [
                            'orderBy' => 'id',
                            'order' => 'desc',
                        ]
                    ) }}"><i class="bi bi-arrow-down-circle"></i></a>
                </div>
            </th>
            <th class="text-center">
                <div class="d-flex justify-content-around align-items-center">
                    <span>名前</span>
                    <a href="{{ add_query_params(
                        [
                            'orderBy' => 'name',
                            'order' => 'asc',
                        ]
                    ) }}"><i class="bi bi-arrow-up-circle"></i></a>
                    <a href="{{ add_query_params(
                        [
                            'orderBy' => 'name',
                            'order' => 'desc',
                        ]
                    ) }}"><i class="bi bi-arrow-down-circle"></i></a>
                </div>
            </th>
            <th class="text-center">
                <div class="d-flex justify-content-around align-items-center">
                    <span>説明</span>
                    <a href="{{ add_query_params(
                        [
                            'orderBy' => 'description',
                            'order' => 'asc',
                        ]
                    ) }}"><i class="bi bi-arrow-up-circle"></i></a>
                    <a href="{{ add_query_params(
                        [
                            'orderBy' => 'description',
                            'order' => 'desc',
                        ]
                    ) }}"><i class="bi bi-arrow-down-circle"></i></a>
                </div>
            </th>
            <th class="text-center">
                <div class="d-flex justify-content-around align-items-center">
                    <span>都道府県</span>
                    <a href="{{ add_query_params(
                        [
                            'orderBy' => 'prefecture',
                            'order' => 'asc',
                        ]
                    ) }}"><i class="bi bi-arrow-up-circle"></i></a>
                    <a href="{{ add_query_params(
                        [
                            'orderBy' => 'prefecture',
                            'order' => 'desc',
                        ]
                    ) }}"><i class="bi bi-arrow-down-circle"></i></a>
                </div>
            </th>
        </tr>
        @foreach($foods as $food)
        <tr>
            <td>{{ $food['id'] }}</td>
            <td><a class="text-left" href="{{ route('foods.show', $food['id']) }}">{{ $food['name'] }}</a></td>
            <td>{{ $food['description'] }}</td>
            <td>{{ $food['prefecture']['name'] }} ({{ $food['prefecture']['capital'] }})</td>
        </tr>
        @endforeach
    </table>
    <div><a href="{{ route('foods.create') }}" class="btn btn-outline-secondary">新規作成</a></div>
    <hr class="my-5" />
    <form action="{{ route('foods.index') }}" method="get" class="mt-5">
        <div class="d-flex">
            <button type="submit" class="btn btn-outline-secondary me-3">検索</button>
            <a href="{{ route('foods.index') }}" class="btn btn-secondary me-3">リセット</a>
        </div>
        <table class="table text-left mt-3">
            <tbody>
                <tr>
                    <th>名前で検索</th>
                    <td><input type="text" name="name" class="form-control" placeholder="都道府県名で検索" value="{{ $serviceParams['name'] }}" /></td>
                </tr>
                <tr>
                    <th>説明で検索</th>
                    <td><input type="text" name="description" class="form-control" placeholder="説明で検索" value="{{ $serviceParams['description'] }}" /></td>
                </tr>
                <tr>
                    <th>都道府県で検索</th>
                    <td>
                        <select name="prefecture_id" class="form-select">
                            <option value="">全て</option>
                            @foreach($prefectures as $prefecture)
                            <option value="{{ $prefecture['id'] }}" @if ($prefecture['id'] == $serviceParams['prefecture_id']) selected @endif>{{ $prefecture['name'] }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>
@endsection
