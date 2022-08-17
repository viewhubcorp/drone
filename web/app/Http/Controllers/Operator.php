<?php

namespace App\Http\Controllers;

use App\Azs;
use App\Log;
use App\Wallet\Validate;
use App\Zaprav;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Operator extends Controller
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

    public function operator(Request $req){
        $azs = Azs::find(auth()->user()->azs_id);
        $zapravs = Zaprav::where('azs_id', auth()->user()->azs_id)->orderBy('created_at', 'desc')->paginate(50);

        $log = new Log();
        $log->user_id = auth()->user()->id;
        $log->action = "Пользователь открыл страницу пульта АЗС (".$azs->name." - ".$azs->adress.")";
        $log->save();

        return view('admin.azs_operator', ['azs'=>$azs, 'zapravs'=>$zapravs]);
    }

    public function transaction(Request $req, $type){
        if(!in_array($type, ['a95', 'a92', 'dt', 'gas'])){
            return abort('404');
        }
        $azs = Azs::find(auth()->user()->azs_id);
        if($type == 'a95'){
            $type_psevdo = 'A95';
            $count = $azs->a_95;
            $cost = $azs->a_95_cost;
        }
        if($type == 'a92'){
            $type_psevdo = 'A92';
            $count = $azs->a_92;
            $cost = $azs->a_92_cost;
        }
        if($type == 'dt'){
            $type_psevdo = 'ДТ';
            $count = $azs->a_dt;
            $cost = $azs->a_dt_cost;
        }
        if($type == 'gas'){
            $type_psevdo = 'ГАЗ';
            $count = $azs->a_gas;
            $cost = $azs->a_gas_cost;
        }

        $log = new Log();
        $log->user_id = auth()->user()->id;
        $log->action = "Пользователь открыл страницу создания транзакции АЗС (".$azs->name." - ".$azs->adress.")";
        $log->save();

        return view('admin.azs_transaction', [
            'type'=>$type,
            'psevdo'=>$type_psevdo,
            'count'=>$count,
            'cost'=>$cost,
        ]);
    }

    public function add_transaction(Request $req){
        $azs = Azs::find(auth()->user()->azs_id);

        if(!$req->has('liter')){
            return redirect()->back()->withErrors(['msg' => 'Вы не ввели колличество литров']);
        }

        $type = $req->get('type');
        if($type == 'a95'){
            $type_psevdo = 1;
            $cost = $azs->a_95_cost;
            if($azs->a_95 < $req->get('liter')){
                return redirect()->back()->withErrors(['msg' => 'В резервуаре недостаточно топлива для заправки']);
            }
        }
        if($type == 'a92'){
            $type_psevdo = 2;
            $cost = $azs->a_92_cost;
            if($azs->a_92 < $req->get('liter')){
                return redirect()->back()->withErrors(['msg' => 'В резервуаре недостаточно топлива для заправки']);
            }
        }
        if($type == 'dt'){
            $type_psevdo = 3;
            $cost = $azs->a_dt_cost;
            if($azs->a_dt < $req->get('liter')){
                return redirect()->back()->withErrors(['msg' => 'В резервуаре недостаточно топлива для заправки']);
            }
        }
        if($type == 'gas'){
            $type_psevdo = 4;
            $cost = $azs->a_gas_cost;
            if($azs->a_gas < $req->get('liter')){
                return redirect()->back()->withErrors(['msg' => 'В резервуаре недостаточно топлива для заправки']);
            }
        }

        try {
            DB::beginTransaction();
                $zaprav = new Zaprav();
                $zaprav->azs_id = $azs->id;
                $zaprav->initiator_id = auth()->user()->id;
                $zaprav->type = $type_psevdo;
                $zaprav->cost = $cost;
                $zaprav->liter = $req->get('liter');
                $zaprav->sum = $cost * $req->get('liter');
                $zaprav->save();

                $azs->wallet = $azs->wallet + ( $cost * $req->get('liter') );
                $azs->save();

            if($type == 'a95'){
                $azs->a_95 = $azs->a_95 - $req->get('liter');
                $azs->save();
            }
            if($type == 'a92'){
                $azs->a_92 = $azs->a_92 - $req->get('liter');
                $azs->save();
            }
            if($type == 'dt'){
                $azs->a_dt = $azs->a_dt - $req->get('liter');
                $azs->save();
            }
            if($type == 'gas'){
                $azs->a_gas = $azs->a_gas - $req->get('liter');
                $azs->save();
            }

            $log = new Log();
            $log->user_id = auth()->user()->id;
            $log->action = "Пользователь создал транзакцию. АЗС (".$azs->name." - ".$azs->adress.") -> ".$type." - ".$req->get('liter')." л.";
            $log->save();

            DB::commit();
            return redirect()->route('azs_operator')->withErrors(['msg' => 'Транзакция создана']);
        } catch (\Exception $e){
            return redirect()->back()->withErrors(['msg' => 'ошибка создания транзакции']);
        }

    }

    public function delete_transaction(Request $req, $id){
        $zaprav = Zaprav::find($id);
        if(is_null($zaprav) || $zaprav->initiator_id != auth()->user()->id){
            return redirect()->back()->withErrors(['msg' => 'Вы не можете откатить чужую транзакцию']);
        }
        $sm = $zaprav->liter;
        $type = $zaprav->type;
        $azs = Azs::find($zaprav->azs_id);
        try {
            DB::beginTransaction();

            if($type == 1){
                $azs->a_95 = $azs->a_95 + $zaprav->liter;
                $azs->wallet = $azs->wallet - $zaprav->sum;
                $azs->save();
                $zaprav->delete();
                $fuel = "A95";
            }
            if($type == 2){
                $azs->a_92 = $azs->a_92 + $zaprav->liter;
                $azs->wallet = $azs->wallet - $zaprav->sum;
                $azs->save();
                $zaprav->delete();
                $fuel = "A92";
            }
            if($type == 3){
                $azs->a_dt = $azs->a_dt + $zaprav->liter;
                $azs->wallet = $azs->wallet - $zaprav->sum;
                $azs->save();
                $zaprav->delete();
                $fuel = "ДТ";
            }
            if($type == 4){
                $azs->a_gas = $azs->a_gas + $zaprav->liter;
                $azs->wallet = $azs->wallet - $zaprav->sum;
                $azs->save();
                $zaprav->delete();
                $fuel = "ГАЗ";
            }

            $log = new Log();
            $log->user_id = auth()->user()->id;
            $log->action = "Пользователь ОТКАТИЛ транзакцию. АЗС (".$azs->name." - ".$azs->adress.") -> ".$fuel." - ".$sm." л.";
            $log->save();

            DB::commit();
            return redirect()->route('azs_operator')->withErrors(['msg' => 'Транзакция отменена']);
        } catch (\Exception $e){
            return redirect()->back()->withErrors(['msg' => 'ошибка nhfypfrwbb транзакции']);
        }
    }

}
