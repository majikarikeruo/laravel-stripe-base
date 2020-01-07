@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        @include('admin.parts.sidebar')

        <div class="col-9">
            <h1>開催会場一覧</h1>
            <div>
                @if(count($places)>0)

                    <div>
                        <ul class="list-group">
                            @foreach($places as $place)
                                <li class="list-group-item d-flex justify-content-between">
                                    <a href="{{$place["url"]}}" target="blank">{{$place["name"]}}</a>
                                    <span>{{$place["access"]}}</span>
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
