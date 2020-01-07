<div class="col-3">
    <div class="mb-4">
        <ul class="list-group">
            <li class="list-group-item"><a href="{{route('admin.home')}}">管理画面Topへ</a></li>
        <li class="list-group-item"><a href="{{route('admin.apply.list')}}">申し込み状況確認</a></li>
        </ul>
    </div>

    <div class="mb-4">
        <h2 class="h5">顧客</h2>
        <ul class="list-group">
            <li class="list-group-item"><a href="{{route('admin.customer.list')}}">顧客情報</a></li>
        </ul>
    </div>


    <div class="mb-4">
        <h2 class="h5">レッスン日程・情報登録</h2>
        <ul class="list-group">
            <li class="list-group-item"><a href="{{route('admin.schedule')}}">レッスン日程登録</a></li>
            <li class="list-group-item"><a href="{{route('admin.lessons')}}">開催レッスン情報</a></li>
            <li class="list-group-item"><a href="{{route('admin.lessons.info')}}">レッスン共通情報</a></li>
            <li class="list-group-item"><a href="{{route('admin.places.list')}}">レッスン開催会場登録・編集</a></li>

        </ul>
    </div>

</div>
