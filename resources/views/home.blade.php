@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ Auth::user()->name }}さん、こんにちは！</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <a href="">ユーザー情報</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{route('user.payment')}}">お支払い情報について</a>
                            </li>
                            <li class="list-group-item">
                                <form action="{{route('logout')}}" method="POST">
                                    @csrf
                                    <button id="btn-logout" class="btn btn-danger">ログアウト</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
