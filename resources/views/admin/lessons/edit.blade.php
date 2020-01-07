@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        @include('admin.parts.sidebar')

        <div class="col-9">
            <h1>イベント情報更新</h1>
            <div>
                <form action="{{route('admin.lessons.update', ['id'=>$id])}}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="title">イベント名</label>
                    <input type="text" name="title" id="title" value="{{$lesson["title"]}}" class="form-control">
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
                        <select name="place" id="place" class="form-control">
                            @foreach($places as $place)
                                <option value="{{$place["id"]}}" @if($lesson["place"] === $place["id"]) selected @endif>{{$place["name"]}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="description">イベント内容紹介文</label>
                        <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{$lesson["description"]}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="notice">注意書き</label>
                        <textarea name="notice" id="notice" cols="30" rows="10" class="form-control">{{$lesson["notice"]}}</textarea>
                    </div>

                    <button id="register" name="submit" class="btn btn-primary">更新する</button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
