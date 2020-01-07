@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        @include('admin.parts.sidebar')

        <div class="col-9">
            <h1>申し込み状況確認</h1>
            <div>
                @if(count($schedules)>0)

                <div>
                    <ul class="list-group">
                        @foreach($schedules as $schedule)
                            <li class="list-group-item d-flex justify-content-between">
                                <span>{{$schedule["email"]}}</span>
                                <span>{{$schedule["email"]}}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @else
                開催会場の登録はありません。
            @endif
            </div>
        </div>
    </div>
</div>
@endsection
