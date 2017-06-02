@extends('layouts.main')
@section('content')

<div class="row">
    <div class="col-md-6 col-md-offset-3">

        <div class="list-group">
            @foreach($categories as $category)
                <a href="/elements/{{$category->id}}" class="list-group-item">
                    {{$category->name}}
                </a>
            @endforeach
        </div>

    </div>
</div>
@endsection