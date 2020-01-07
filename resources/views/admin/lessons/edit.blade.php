@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        @include('admin.parts.sidebar')

        <div class="col-9">
            <h1>イベント情報更新</h1>
            <div>
                <form action="{{route('admin.update', ['id'=>$id])}}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="title">イベント名</label>
                    <input type="text" name="title" id="title" value="{{$lesson["title"]}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="description">イベント紹介文</label>
                        <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{$lesson["description"]}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="capacity">定員</label>
                        <input type="text" name="capacity" id="capacity" value="{{$lesson["capacity"]}}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="price">料金</label>
                        <input type="text" name="price" id="price" value="{{$lesson["price"]}}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="place">会場</label>
                        <input type="text" name="place" id="place" value="{{$lesson["place"]}}" class="form-control">
                    </div>


                    <div class="form-group">
                        <label for="notice">注意書き</label>
                        <textarea name="notice" id="notice" cols="30" rows="10" class="form-control">{{$lesson["notice"]}}</textarea>
                    </div>

                    <button id="register" name="submit" class="btn btn-primary">登録する</button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
