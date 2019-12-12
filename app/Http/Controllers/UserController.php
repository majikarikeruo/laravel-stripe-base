<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Payment;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function getUserInfo(){
        $user = Auth::user();
        $defaultCard = Payment::getDefaultcard($user);

        return view('user.index', compact('user', 'defaultCard'));
    }

    public function becomePaidMember(Request $request){

        \Stripe\Stripe::setApiKey(\Config::get('payment.stripe_secret_key'));

        try {
            $user = User::find(Auth::id());
            $chargeOject = [
                'amount'      => 500,
                'currency'    => 'jpy',
                'description' => 'ユーザー：'.$user->name."、有料会員課金分",
                'customer'      => $user->stripe_id,
            ];

            $charge = \Stripe\Charge::create($chargeOject);

        } catch (\Stripe\Exception\CardException $e) {
            $body = $e->getJsonBody();
            $errors  = $body['error'];

            return redirect('/user/info')->with('errors', "決済に失敗しました。しばらく経ってから再度お試しください。");
        }

        $user->status = 1;
        $user->save();

        return redirect('/user/info')->with('success', "有料会員登録が完了しました。");
    }


    public function cancelPaidMember(Request $request){

        $user = User::find(Auth::id());
        $user->status = 0;
        $user->save();

        return redirect('/user/info')->with('success', "有料会員解約が完了しました。");

    }
}
