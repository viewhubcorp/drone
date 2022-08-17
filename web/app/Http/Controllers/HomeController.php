<?php

namespace App\Http\Controllers;

use App\Wallet\Validate;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function log()
    {
        return view('page.main');
    }

    public function panel(){
        return view('admin.pay_in');
    }

    public function payRedirect(Request $req){

        if(empty($req->get('sum')) || !(new Validate($req->get('sum')))->validate()){
            return redirect()->back()->withErrors(['msg' => 'Вы неверно ввели сумму взноса']);
        }else{

            $pay = new \App\WayForPay\WFP($req->get('sum'), 'USD');
            $pay_url = $pay->create();
            $pay_id = $pay->getId();
            if(isset($pay_url['invoiceUrl'])){
                $transaction = new \App\Transaction();
                $transaction->pay_identity = $pay_id;
                $transaction->user_id = auth()->user()->id;
                $transaction->sum = $req->get('sum');
                $transaction->save();

                return redirect($pay_url['invoiceUrl']);
            }else{
                return redirect()->back()->withErrors(['msg' => 'Ошибка платежного шлюза! Повторите позже']);
            }
        }
    }

    public function transactionsIn(Request $req){
        return view('admin.transactions', [
            'transactions'=>\App\Transaction::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->paginate(50)
        ]);
    }

    public function stat(){
        $my_wallet = auth()->user()->wallet;
        $all_wallets = 0;
        $users = \App\User::all();
        foreach($users as $user){
            $all_wallets = $all_wallets + $user->wallet;
        }
        $all_wallets_minus = $all_wallets - $my_wallet;
        $percent = 0;
        if($all_wallets > 0){
            $perc = $all_wallets / 100;
            $percent = $my_wallet / $perc;
        }

        return view('admin.stat', [
            'all_wallets'=>$all_wallets,
            'percent'=>$percent,
            'my_wallet'=>$my_wallet,
            'users'=>$users
        ]);
    }
}
