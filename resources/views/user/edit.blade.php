@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ Auth::user()->name }}さんの情報</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('errors'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('errors') }}
                        </div>
                    @endif


                    <div class="form-group">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <span>お名前：</span>
                                <span>{{$user->name}}</span>
                            </li>
                            <li class="list-group-item">
                                <span>会員種別：</span>
                                @if($user->status === 0)
                                    <span>無料会員</span>
                                @elseif($user->status === 1)
                                    <span>有料会員</span>
                                @endif
                            </li>
                            <li class="list-group-item">
                                <form action="" method="POST">
                                    <span>興味のある分野：</span>
                                    <div>
                                        @foreach($interests as $item)
                                            <label for="">
                                                <input type="checkbox" value="{{$item["id"]}}" name="interests[]">{{$item["name"]}}
                                            </label>
                                        @endforeach

                                    </div>
                                </form>
                            </li>
                        </ul>
                    </div>

                    <p><a href="{{route('home')}}">メニューページに戻る</a></p>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
