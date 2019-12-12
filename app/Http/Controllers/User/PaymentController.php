<?php

namespace App\Http\Controllers\User;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Payment;

class PaymentController extends Controller
{
    //
    public function getCurrentPayment(){
        $user = Auth::user(); //要するにUser情報を取得したい
        $defaultCard = Payment::getDefaultcard($user);

        return view('user.payment.index', compact('user', 'defaultCard'));

    }

    public function getPaymentForm(){
        $user = Auth::user(); //要するにUser情報を取得したい
        return view('user.payment.form');

    }


    public function storePaymentInfo(Request $request){
        /**
         * フロントエンドから送信されてきたtokenを取得
         * これがないと一切のカード登録が不可
         **/
        $token = $request->stripeToken;
        $user = Auth::user(); //要するにUser情報を取得したい
        $ret = null;

        /**
         * 当該ユーザーがtokenもっていない場合Stripe上でCustomer（顧客）を作る必要がある
         * これがないと一切のカード登録が不可
         **/
        if ($token) {

            /**
             *  フロントから登録が送られている場合は「初めてクレジットカードを登録するか否か」で
             *  処理内容が変わる。
             *
             * 「初めての登録」の場合は、Stripe上に「Customer（顧客」と呼ばれる単位の登録をして、その後に
             * クレジットカードの登録が必要なので、一連の処理を内包しているUserモデル内のsetCustomer関数を実行
             *
             * 「2回目以降」の登録（別のカードを登録など）の場合は、「Customer（顧客」を新しく登録してしまうと二重顧客登録になるため、
             *  既存のカード情報を取得→削除→新しいカード情報の登録という流れに。
             *
             **/

            if (!$user->stripe_id) {
                $result = Payment::setCustomer($token, $user);

                /* card error */
                if(!$result){
                    $errors = "カード登録に失敗しました。入力いただいた内容に相違がないかを確認いただき、問題ない場合は別のカードで登録を行ってみてください。";
                    return redirect('/user/payment/form')->with('errors', $errors);
                }

            } else {
                $defaultCard = Payment::getDefaultcard($user);
                if (isset($defaultCard['id'])) {
                    Payment::deleteCard($user);
                }

                $result = Payment::updateCustomer($token, $user);

                /* card error */
                if(!$result){
                    $errors = "カード登録に失敗しました。入力いただいた内容に相違がないかを確認いただき、問題ない場合は別のカードで登録を行ってみてください。";
                    return redirect('/user/payment/form')->with('errors', $errors);
                }

            }
        } else {
            return redirect('/user/payment/form')->with('errors', '申し訳ありません、通信状況の良い場所で再度ご登録をしていただくか、しばらく立ってから再度登録を行ってみてください。');
        }

        return redirect('/user/payment')->with("success", "カード情報の登録が完了しました。");
    }


    public function deletePaymentInfo(){
        $user = User::find(Auth::id());

        $result = Payment::deleteCard($user);

        if($result){
            return redirect('/user/payment')->with('success', 'カード情報の削除が完了しました。');
        }else{
            return redirect('/user/payment')->with('errors', 'カード情報の削除に失敗しました。恐れ入りますが、通信状況の良い場所で再度お試しいただくか、しばらく経ってから再度お試しください。');
        }
    }

}
