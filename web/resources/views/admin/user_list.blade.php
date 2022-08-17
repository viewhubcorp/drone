@extends('layouts.admin')

@section('content')
    <br>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Персонал</font></font></h3>
                    <div class="card-tools">
                        <a href="{{route('add_user', [], false)}}" class="btn btn-success float-sm-right"><i class="fas fa-plus"></i> Добавить человека</a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-bordered text-nowrap">
                        <thead>
                        <tr>
                            <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">ID</font></font></th>
                            <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Имя</font></font></th>
                            <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Номер телефона</font></font></th>
                            <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Должность</font></font></th>
                            <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">АЗС</font></font></th>
                            <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Подробнее</font></font></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($user_list as $user)
                            <tr>
                                <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$user->id}}</font></font></td>
                                <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$user->name}}</font></font></td>
                                <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$user->tel}}</font></font></td>
                                <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">@if($user->role == 1)Оператор@elseif($user->role == 2)Администратор@endif</font></font></td>
                                <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> @if(!is_null($user->azs_id)) {{\App\Azs::find($user->azs_id)->name}} @endif </font></font></td>
                                <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><a href="{{route('user', ['id'=>$user->id], false)}}" class="btn btn-info">Подробнее</a></font></font></td>
                            </tr>
                        @endforeach


                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix">
                    {{$user_list->links()}}
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

@endsection
