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
                                @if($defaultCard)
                                    @if($user->status === 0)
                                        <p>500円お支払いいただくことで、有料会員になることができます。</p>
                                        <form action="{{route('user.paid')}}" method="POST">
                                            @csrf
                                            <button id="" class="btn btn-primary">有料会員登録する</button>
                                        </form>
                                    @elseif($user->status === 1)
                                        <p>下記ボタンを押すことで、有料会員を解約することができます。一度解約すると、再度有料会員になる際、再度500円がかかりますので、ご注意ください。</p>
                                        <form action="{{route('user.cancel')}}" method="POST">
                                            @csrf
                                            <button id="" class="btn btn-danger">有料会員を解約する</button>
                                        </form>
                                    @endif
                                @else
                                    <p>有料会員登録をするためには、カード登録を行っていただく必要があります。</p>
                                    <p><a href="{{route('user.payment.form')}}">カード登録画面へ</a></p>
                                @endif

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
