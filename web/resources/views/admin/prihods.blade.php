@extends('layouts.admin')

@section('content')
    <br>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Таблица прихода АЗС</font></font></h3>

                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-bordered text-nowrap">
                        <thead>
                        <tr>
                            <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">ID</font></font></th>
                            <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Инициатор</font></font></th>
                            <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Топливо</font></font></th>
                            <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Колличество</font></font></th>
                            <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Дата</font></font></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($prihods as $prihod)
                            <tr>
                                <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$prihod->id}}</font></font></td>
                                <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{\App\User::find($prihod->initiator_id)->name}}</font></font></td>
                                <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> @if($prihod->type == 1) A95 @elseif($prihod->type == 2) A92 @elseif($prihod->type == 3) ДТ @elseif($prihod->type == 4) ГАЗ @endif </font></font></td>
                                <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$prihod->sum}} л.</font></font></td>
                                <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$prihod->created_at}}</font></font></td>
                            </tr>
                        @endforeach


                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix">
                    {{$prihods->links()}}
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

@endsection
