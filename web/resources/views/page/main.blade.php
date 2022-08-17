@extends('layouts.admin')

@section('content')
{{--    <br>--}}
{{--    <div class="row">--}}
{{--        <div class="col-12">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">--}}
{{--                    <h3 class="card-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Заправочные станции</font></font></h3>--}}
{{--                    <div class="card-tools">--}}
{{--                        <a href="{{route('add_azs', [], false)}}" class="btn btn-success float-sm-right"><i class="fas fa-plus"></i> Добавить заправку</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- /.card-header -->--}}
{{--                <div class="card-body table-responsive p-0">--}}
{{--                    <table class="table table-bordered text-nowrap">--}}
{{--                        <thead>--}}
{{--                        <tr>--}}
{{--                            <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">ID</font></font></th>--}}
{{--                            <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Название</font></font></th>--}}
{{--                            <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Адрес</font></font></th>--}}
{{--                            <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Остатки</font></font></th>--}}
{{--                            <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Цены</font></font></th>--}}
{{--                            <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Касса</font></font></th>--}}
{{--                            <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Подробнее</font></font></th>--}}
{{--                        </tr>--}}
{{--                        </thead>--}}
{{--                        <tbody>--}}
{{--                        @foreach($azs_list as $azs)--}}
{{--                            <tr>--}}
{{--                                <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$azs->id}}</font></font></td>--}}
{{--                                <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$azs->name}}</font></font></td>--}}
{{--                                <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$azs->adress}}</font></font></td>--}}
{{--                                <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">A95 - {{$azs->a_95}} л.<br>A92 - {{$azs->a_92}} л.<br>ДТ - {{$azs->a_dt}} л.<br>Газ - {{$azs->a_gas}} л.</font></font></td>--}}
{{--                                <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">A95 - {{$azs->a_95_cost}} грн/л.<br>A92 - {{$azs->a_92_cost}} грн/л.<br>ДТ - {{$azs->a_dt_cost}} грн/л.<br>Газ - {{$azs->a_gas_cost}} грн/л.</font></font></td>--}}
{{--                                <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$azs->wallet}} грн</font></font></td>--}}
{{--                                <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><a href="{{route('azs', ['id'=>$azs->id], false)}}" class="btn btn-info">Подробнее</a></font></font></td>--}}
{{--                            </tr>--}}
{{--                        @endforeach--}}


{{--                        </tbody>--}}
{{--                    </table>--}}
{{--                </div>--}}
{{--                <div class="card-footer clearfix">--}}
{{--                    {{$azs_list->links()}}--}}
{{--                </div>--}}
{{--                <!-- /.card-body -->--}}
{{--            </div>--}}
{{--            <!-- /.card -->--}}
{{--        </div>--}}
{{--    </div>--}}

@endsection
