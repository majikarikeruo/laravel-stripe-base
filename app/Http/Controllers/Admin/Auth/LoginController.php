<?php
namespace App\Http\Controllers\Admin\Auth;
use App\Http\Controllers\Admin\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    use AuthenticatesUsers;
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/home';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // ログイン画面
    public function showLoginForm()
    {
        return view('admin.auth.login'); //管理者ログインページのテンプレート
    }
    protected function guard()
    {
        return \Auth::guard('admin'); //管理者認証のguardを指定
    }
    public function logout(Request $request){
        $this->guard()->logout();
        $request->session()->invalidate();
        return $this->loggedOut($request) ?: redirect('/admin/login');  // ログアウト後のリダイレクト先
    }
}
