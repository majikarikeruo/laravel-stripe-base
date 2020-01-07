@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        @include('admin.parts.sidebar')

        <div class="col-9">
            <h1>日程登録</h1>
            <form action="{{route('admin.lessons.schedule.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">日程を登録したいイベントを選択</label>
                    <select name="lesson_id" id="lesson_id" class="form-control">
                        @foreach($lessons as $item)
                            <option value="{{$item["id"]}}">{{$item["title"]}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="">開催日程を入力</label>
                    <input type="date" class="form-control" name="date">
                </div>

                <div class="form-group">
                    <label for="">開始時間を入力</label>
                    <input type="time" class="form-control" name="start_time">
                </div>

                <div class="form-group">
                    <label for="">終了時間を入力</label>
                    <input type="time" class="form-control" name="end_time">
                </div>

                <button class="btn btn-primary">日程を登録</button>
            </form>
        </div>
    </div>
</div>

@endsection

