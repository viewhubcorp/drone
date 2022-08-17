@extends('layouts.admin')

@section('content')
    <br>
    <h1>Заправка - {{$azs->name}} ({{$azs->adress}})</h1>
    <h3>Касса - {{$azs->wallet}} грн</h3>

    <div class="callout callout-danger">
        <h5>Персонал</h5>

        @foreach($users as $user)
            <p>{{$user->name}} - {{$user->tel}} ->  @if($user->role == 1)Оператор@elseif($user->role == 2)Администратор@endif </p>
        @endforeach
    </div>

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


            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Стоимость топлива</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('fuel_cost', ['id'=>$azs->id], false)}}" method="post">
                        @csrf
                        <h5 class="mt-4 mb-2">A95</h5>
                        <input type="number" name="a_95_cost" class="form-control" value="{{$azs->a_95_cost}}">

                        <h5 class="mt-4 mb-2">A92</h5>
                        <input type="number" name="a_92_cost" class="form-control" value="{{$azs->a_92_cost}}">

                        <h5 class="mt-4 mb-2">ДТ</h5>
                        <input type="number" name="a_dt_cost" class="form-control" value="{{$azs->a_dt_cost}}">

                        <h5 class="mt-4 mb-2">ГАЗ</h5>
                        <input type="number" name="a_gas_cost" class="form-control" value="{{$azs->a_gas_cost}}">

                        <br>
                        <p>Укажите стоимость за литр топлива - <code> Используйте точку чтоб указать десятые и сотые</code></p>

                        <button type="submit" class="btn btn-success float-right">
                            Сохранить
                        </button>

                    </form>

                    <!-- /input-group -->


                    <!-- /input-group -->
                </div>
                <!-- /.card-body -->
            </div>

            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Инкасация</h3>
                    <div class="card-tools">
                        <a href="{{route('incasations', ['id'=>$azs->id], false)}}" class="btn btn-danger float-sm-right">Инкасации данной АЗС</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('incasation', ['id'=>$azs->id], false)}}" method="post">
                        @csrf
                        <h5 class="mt-4 mb-2">Сумма</h5>
                        <input type="number" name="sum" class="form-control">

                        <br>
                        <p>Укажите сумму которую вы хотите изъять из кассы - <code> сумма не должна превышать сумму в кассе</code></p>

                        <button type="submit" class="btn btn-success float-right">
                            Изъять
                        </button>

                    </form>

                    <!-- /input-group -->


                    <!-- /input-group -->
                </div>
                <!-- /.card-body -->
            </div>

            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Приход</h3>
                    <div class="card-tools">
                        <a href="{{route('prihods', ['id'=>$azs->id], false)}}" class="btn btn-danger float-sm-right">Приходы данной АЗС</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('prihod', ['id'=>$azs->id], false)}}" method="post">
                        @csrf
                        <h5 class="mt-4 mb-2">Топливо</h5>
                        <select class="custom-select rounded-0" name="type" required>
                            <option value="1">A95</option>
                            <option value="2">A92</option>
                            <option value="3">ДТ</option>
                            <option value="4">ГАЗ</option>
                        </select>

                        <h5 class="mt-4 mb-2">Литры</h5>
                        <input type="number" name="sum" class="form-control" required>

                        <br>
                        <p>Поставка топлива на заправку</p>

                        <button type="submit" class="btn btn-success float-right">
                            Готово
                        </button>

                    </form>

                    <!-- /input-group -->


                    <!-- /input-group -->
                </div>
                <!-- /.card-body -->
            </div>

            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Касса</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('wallet', ['id'=>$azs->id], false)}}" method="post">
                        @csrf
                        <h5 class="mt-4 mb-2">Сумма</h5>
                        <input type="number" name="sum" class="form-control" value="{{$azs->wallet}}">

                        <br>
                        <p>Вы можете изменить остаток в кассе - <code> Не рекомендуется менять остаток в кассе, так-как это может нарушить отчетность</code></p>

                        <button type="submit" class="btn btn-success float-right">
                            Изменить
                        </button>

                    </form>

                    <!-- /input-group -->


                    <!-- /input-group -->
                </div>
                <!-- /.card-body -->
            </div>

            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Остатки</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('ostat', ['id'=>$azs->id], false)}}" method="post">
                        @csrf
                        <h5 class="mt-4 mb-2">A95</h5>
                        <input type="number" name="a_95" class="form-control" value="{{$azs->a_95}}">

                        <h5 class="mt-4 mb-2">A92</h5>
                        <input type="number" name="a_92" class="form-control" value="{{$azs->a_92}}">

                        <h5 class="mt-4 mb-2">ДТ</h5>
                        <input type="number" name="a_dt" class="form-control" value="{{$azs->a_dt}}">

                        <h5 class="mt-4 mb-2">ГАЗ</h5>
                        <input type="number" name="a_gas" class="form-control" value="{{$azs->a_gas}}">

                        <br>
                        <p>Вы можете изменить остатки топлива - <code> Не рекомендуется менять остатки по топливу, так-как это может нарушить отчетность</code></p>

                        <button type="submit" class="btn btn-success float-right">
                            Сохранить
                        </button>

                    </form>

                    <!-- /input-group -->


                    <!-- /input-group -->
                </div>
                <!-- /.card-body -->
            </div>

        </div>


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
