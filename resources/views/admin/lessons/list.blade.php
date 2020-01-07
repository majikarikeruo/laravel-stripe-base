@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        @include('admin.parts.sidebar')

        <div class="col-9">
            <h1>開催レッスン情報</h1>
            <a href="{{route('admin.lessons.new')}}" class="btn btn-primary">新規イベント登録</a>
            <div>
                @if(count($lessons)>0)

                    <div>
                        <ul class="list-group">
                            @foreach($lessons as $item)
                                <li class="list-group-item d-flex justify-content-between">
                                    <a href="/admin/lessons/{{$item["id"]}}">{{$item["title"]}}</a>


                                    <div class="d-flex justify-content-between">
                                        <a href="/admin/lessons/edit/{{$item["id"]}}">編集</a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @else
                    開催中のレッスンはありません。
                @endif

            </div>
        </div>
    </div>
</div>
@endsection
