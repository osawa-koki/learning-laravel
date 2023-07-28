@extends('Layout')
@section('title', '# Home')

@section('content')
<div class="container my-5">
    <h1 class="mt-5">Learning Laravel</h1>
    <div class="d-flex my-3">
        <a class="text-decoration-none" href="{{ route('prefectures.index') }}">
            <div class="card me-3 mb-3">
                <div class="card-body">
                    <h5 class="card-title m-2">Prefecture</h5>
                </div>
            </div>
        </a>
        <a class="text-decoration-none" href="{{ route('foods.index') }}">
            <div class="card me-3 mb-3">
                <div class="card-body">
                    <h5 class="card-title m-2">Food</h5>
                </div>
            </div>
        </a>
    </div>
</div>
@endsection
