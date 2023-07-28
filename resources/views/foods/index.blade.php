@extends('Layout')
@section('title', '食べ物一覧')

@section('content')
<div class="container my-5">
    <h1>食べ物一覧</h1>
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
</div>
@endsection
