@extends('layouts.admin')

@section('content')
    <br>
    <h1>Заправка - {{$azs->name}} ({{$azs->adress}})</h1>
    <h3>Касса - {{$azs->wallet}} грн</h3>
    <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->

                <div class="small-box bg-info">

                    <div class="inner">
                        <a href="{{route('azs_transaction', ['type'=>'a95'], false)}}" style="color:#FFFFFF">
                            <h3>А95</h3>

                        <p>{{$azs->a_95_cost}} грн/л.</p>
                        </a>
                    </div>

                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{route('azs_transaction', ['type'=>'a95'], false)}}" class="small-box-footer">Остаток:
                        {{$azs->a_95}} л. <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <a href="{{route('azs_transaction', ['type'=>'a92'], false)}}" style="color:#FFFFFF">
                        <h3>А92</h3>

                        <p>{{$azs->a_92_cost}} грн/л.</p>
                        </a>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="{{route('azs_transaction', ['type'=>'a92'], false)}}" class="small-box-footer">Остаток:
                        {{$azs->a_92}} л.  <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <a href="{{route('azs_transaction', ['type'=>'dt'], false)}}" style="color:#000000">
                        <h3>ДТ</h3>

                        <p>{{$azs->a_dt_cost}} грн/л.</p>
                        </a>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{route('azs_transaction', ['type'=>'dt'], false)}}" class="small-box-footer">Остаток:
                        {{$azs->a_dt}} л. <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <a href="{{route('azs_transaction', ['type'=>'gas'], false)}}" style="color:#FFFFFF">
                        <h3>ГАЗ</h3>

                        <p>{{$azs->a_gas_cost}} грн/л.</p>
                        </a>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="{{route('azs_transaction', ['type'=>'gas'], false)}}" class="small-box-footer">Остаток:
                        {{$azs->a_gas}} л.  <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Транзакции</font></font></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-bordered text-nowrap">
                        <thead>
                        <tr>
                            <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">ID</font></font></th>
                            <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Инициатор</font></font></th>
                            <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Топливо</font></font></th>
                            <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Стоимость</font></font></th>
                            <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Литры</font></font></th>
                            <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Сумма</font></font></th>
                            <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Время</font></font></th>
                            <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Действия</font></font></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($zapravs as $azs)
                            <tr>
                                <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$azs->id}}</font></font></td>
                                <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{\App\User::find($azs->initiator_id)->name}}</font></font></td>
                                <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> @if($azs->type == 1) A95 @elseif($azs->type == 2) A92 @elseif($azs->type == 3) ДТ @elseif($azs->type == 4) ГАЗ @endif </font></font></td>
                                <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$azs->cost}} грн/л</font></font></td>
                                <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$azs->liter}} л</font></font></td>
                                <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$azs->sum}} грн</font></font></td>
                                <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$azs->created_at}}</font></font></td>
                                <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><a href="{{route('delete_transaction', ['id'=>$azs->id], false)}}" class="btn btn-danger">Отменить</a></font></font></td>
                            </tr>
                        @endforeach


                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix">
{{--                    {{$azs_list->links()}}--}}
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

@endsection
