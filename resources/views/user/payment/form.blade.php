@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('errors'))
                <div class="alert alert-danger" role="alert">
                    {{ session('errors') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">クレジットカード登録</div>

                <div class="card-body">
                    <form action="{{route('user.payment.store')}}" class="card-form" id="form_payment" method="POST">
                        @csrf
                        <div class="form-group">
                           <label for="name">カード番号</label>
                           <div id="cardNumber"></div>
                        </div>

                        <div class="form-group">
                           <label for="name">セキュリティコード</label>
                           <div id="securityCode"></div>
                        </div>

                        <div class="form-group">
                           <label for="name">有効期限</label>
                           <div id="expiration"></div>
                        </div>

                        <div class="form-group">
                           <label for="name">カード名義</label>
                           <input type="text" name="cardName" id="cardName" class="form-control" value="" placeholder="カード名義を入力">
                        </div>
                        <div class="form-group">
                           <button type="submit" id="create_token" class="btn btn-primary">カードを登録する</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
