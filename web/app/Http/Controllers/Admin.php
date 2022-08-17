<?php

namespace App\Http\Controllers;

use App\Azs;
use App\Incasation;
use App\Log;
use App\Prihod;
use App\User;
use App\Wallet\Validate;
use App\Zaprav;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Admin extends Controller
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

    public function azs_list(Request $req){

        $log = new Log();
        $log->user_id = auth()->user()->id;
        $log->action = "Пользователь посетил страницу каталога заправок";
        $log->save();

        return view('admin.azs_list', [
            'azs_list'=>\App\Azs::orderBy('created_at', 'desc')->paginate(50)
        ]);
    }

    public function add_azs(Request $req){

        $log = new Log();
        $log->user_id = auth()->user()->id;
        $log->action = "Пользователь посетил страницу добавления новой заправки";
        $log->save();

        return view('admin.add_azs');
    }

    public function save_azs(Request $req){
        if(!$req->has('name') || $req->get('name') == '' || !$req->has('adress') || $req->get('adress') == ''){
            return redirect()->back()->withErrors(['msg' => 'Вы не ввели данные! Повторите еще раз']);
        }
        $azs = new Azs();
        $azs->name = $req->get('name');
        $azs->adress = $req->get('adress');
        $azs->save();

        $log = new Log();
        $log->user_id = auth()->user()->id;
        $log->action = "Пользователь добавил в каталог новую заправку (".$req->get('name')." - ".$req->get('adress').")";
        $log->save();

        return redirect()->route('azs_list');
    }

    public function user_list(Request $req){

        $log = new Log();
        $log->user_id = auth()->user()->id;
        $log->action = "Пользователь посетил страницу каталога персонала";
        $log->save();

        return view('admin.user_list', [
            'user_list'=>\App\User::orderBy('created_at', 'desc')->paginate(50)
        ]);
    }

    public function add_user(Request $req){
        $azs = Azs::all();

        $log = new Log();
        $log->user_id = auth()->user()->id;
        $log->action = "Пользователь посетил страницу добавления нового пользователя";
        $log->save();

        return view('admin.add_user', ['azs'=>$azs]);
    }

    public function save_user(Request $req){
        if(
            !$req->has('name') || $req->get('name') == ''
            || !$req->has('tel') || $req->get('tel') == ''
            || !$req->has('email') || $req->get('email') == ''
            || !$req->has('azs') || $req->get('azs') == ''
            || !$req->has('role') || $req->get('role') == ''
            || !$req->has('pass') || $req->get('pass') == ''
            || !$req->has('re_pass') || $req->get('re_pass') == ''
        ){
            return redirect()->back()->withErrors(['msg' => 'Вы не ввели данные! Повторите еще раз']);
        }

        if($req->get('pass') != $req->get('re_pass')){
            return redirect()->back()->withErrors(['msg' => 'Пароли не совпадают']);
        }

        $user = new User();
        $user->name = $req->get('name');
        $user->tel = $req->get('tel');
        $user->email = $req->get('email');
        $user->azs_id = $req->get('azs');
        $user->role = $req->get('role');
        $user->password = Hash::make($req->get('pass'));
        $user->save();

        $log = new Log();
        $log->user_id = auth()->user()->id;
        $log->action = "Пользователь добавил человека в каталог персонала (".$req->get('name')." - ".$req->get('tel').")";
        $log->save();

        return redirect()->route('user_list')->withErrors(['msg' => 'Вы добавили человека!']);
    }

    public function azs(Request $req, $id){
        $azs = Azs::find($id);
        $users = User::where('azs_id', $id)->get();
        $zapravs = Zaprav::where('azs_id', $id)->orderBy('created_at', 'desc')->paginate(50);

        $log = new Log();
        $log->user_id = auth()->user()->id;
        $log->action = "Пользователь посетил страницу АЗС (".$azs->name." - ".$azs->adress.")";
        $log->save();

        return view('admin.azs', ['azs'=>$azs, 'zapravs'=>$zapravs, 'users'=>$users]);
    }

    public function fuel_cost(Request $req, $id){
        $azs = Azs::find($id);
        $azs->a_95_cost = $req->get('a_95_cost');
        $azs->a_92_cost = $req->get('a_92_cost');
        $azs->a_dt_cost = $req->get('a_dt_cost');
        $azs->a_gas_cost = $req->get('a_gas_cost');
        $azs->save();

        $log = new Log();
        $log->user_id = auth()->user()->id;
        $log->action = "Пользователь сменил цены на топливо на АЗС (".$azs->name." - ".$azs->adress.") -> A95 ".$req->get('a_95_cost')."грн. -> A92 ".$req->get('a_92_cost')."грн. -> ДТ ".$req->get('a_dt_cost')."грн. -> ГАЗ ".$req->get('a_gas_cost')."грн.";
        $log->save();

        return redirect()->back()->withErrors(['msg' => 'Вы сменили цены на топливо']);
    }

    public function incasation(Request $req, $id){
        $azs = Azs::find($id);
        try {
            DB::beginTransaction();

            $azs->wallet = $azs->wallet - $req->get('sum');
            $azs->save();

            $incasation = new Incasation();
            $incasation->azs_id = $id;
            $incasation->initiator_id = auth()->user()->id;
            $incasation->sum = $req->get('sum');
            $incasation->save();

            $log = new Log();
            $log->user_id = auth()->user()->id;
            $log->action = "Пользователь инициировал инкасацию на АЗС (".$azs->name." - ".$azs->adress.") - Сумма ".$req->get('sum')."грн";
            $log->save();

            DB::commit();
            return redirect()->back()->withErrors(['msg' => 'Инкасация завершена']);
        } catch (\Exception $e){
            return redirect()->back()->withErrors(['msg' => 'ошибка создания транзакции']);
        }
    }

    public function prihod(Request $req, $id){
        $azs = Azs::find($id);
        try {
            DB::beginTransaction();

            if($req->get('type') == 1){
                $azs->a_95 = $azs->a_95 + $req->get('sum');
                $fuel = "A95";
            }
            if($req->get('type') == 2){
                $azs->a_92 = $azs->a_92 + $req->get('sum');
                $fuel = "A92";
            }
            if($req->get('type') == 3){
                $azs->a_dt = $azs->a_dt + $req->get('sum');
                $fuel = "ДТ";
            }
            if($req->get('type') == 4){
                $azs->a_gas = $azs->a_gas + $req->get('sum');
                $fuel = "ГАЗ";
            }

            $azs->save();

            $prihod = new Prihod();
            $prihod->azs_id = $id;
            $prihod->initiator_id = auth()->user()->id;
            $prihod->type = $req->get('type');
            $prihod->sum = $req->get('sum');
            $prihod->save();

            $log = new Log();
            $log->user_id = auth()->user()->id;
            $log->action = "Пользователь инициировал приход топлива на АЗС (".$azs->name." - ".$azs->adress.") -> ".$fuel." - ".$req->get('sum')."л.";
            $log->save();

            DB::commit();
            return redirect()->back()->withErrors(['msg' => 'Приход завершен успешно']);
        } catch (\Exception $e){
            return redirect()->back()->withErrors(['msg' => 'ошибка создания транзакции']);
        }
    }

    public function wallet(Request $req, $id){
        $azs = Azs::find($id);
        $azs->wallet = $req->get('sum');
        $azs->save();

        $log = new Log();
        $log->user_id = auth()->user()->id;
        $log->action = "Пользователь сменил остаток в кассе АЗС (".$azs->name." - ".$azs->adress.") -> ".$req->get('sum')." грн.";
        $log->save();

        return redirect()->back()->withErrors(['msg' => 'Вы сменили остаток в кассе']);
    }

    public function ostat(Request $req, $id){
        $azs = Azs::find($id);
        $azs->a_95 = $req->get('a_95');
        $azs->a_92 = $req->get('a_92');
        $azs->a_dt = $req->get('a_dt');
        $azs->a_gas = $req->get('a_gas');
        $azs->save();

        $log = new Log();
        $log->user_id = auth()->user()->id;
        $log->action = "Пользователь сменил остатки по топливу на АЗС (".$azs->name." - ".$azs->adress.") -> A95 ".$req->get('a_95')."л. -> A92 ".$req->get('a_92')."л. -> ДТ ".$req->get('a_dt')."л. -> ГАЗ ".$req->get('a_gas')."л.";
        $log->save();

        return redirect()->back()->withErrors(['msg' => 'Вы сменили остатки топлива']);
    }

    public function prihods(Request $req, $id){

        $azs = Azs::find($id);
        $log = new Log();
        $log->user_id = auth()->user()->id;
        $log->action = "Пользователь посетил страницу приходов АЗС (".$azs->name." - ".$azs->adress.")";
        $log->save();

        return view('admin.prihods', ['prihods'=>Prihod::where('azs_id', $id)->orderBy('created_at', 'desc')->paginate(50)]);
    }

    public function incasations(Request $req, $id){

        $azs = Azs::find($id);
        $log = new Log();
        $log->user_id = auth()->user()->id;
        $log->action = "Пользователь посетил страницу инкасаций АЗС (".$azs->name." - ".$azs->adress.")";
        $log->save();

        return view('admin.incasations', ['incasations'=>Incasation::where('azs_id', $id)->orderBy('created_at', 'desc')->paginate(50)]);
    }

    public function user(Request $req, $id){
        return view('admin.user', [
            'logs'=>Log::where('user_id', $id)->orderBy('created_at', 'desc')->paginate(50)
        ]);
    }

}
