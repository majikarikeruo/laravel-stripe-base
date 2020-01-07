@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3">
            <ul class="list-group">
                <li class="list-group-item"><a href="{{route('admin.lessons')}}">開催レッスン</a></li>
            </ul>
        </div>
        <div class="col-9">
            <h1>ようこそ！</h1>
            <div>

            </div>
        </div>
    </div>
</div>
@endsection
