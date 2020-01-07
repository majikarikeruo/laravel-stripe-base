@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        @include('admin.parts.sidebar')

        <div class="col-9">
            <h1>顧客一覧</h1>
            <div>
                @if(count($customers)>0)

                    <div>
                        <ul class="list-group">
                            @foreach($customers as $customer)
                                <li class="list-group-item d-flex justify-content-between">
                                    <a href="#">{{$customer["name"]}}</a>
                                    <span>{{$customer["email"]}}</span>
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
