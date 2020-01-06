<form action="{{route('admin.logout')}}" method="POST">
    @csrf
    <button id="btn-logout" class="btn btn-danger">ログアウト</button>
</form>
