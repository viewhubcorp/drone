@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Ваши транзакции</font></font></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">ID</font></font></th>
                            <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Транзакция</font></font></th>
                            <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Сумма</font></font></th>
                            <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Статус</font></font></th>
                            <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Создано</font></font></th>
                            <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Изменено</font></font></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($transactions as $out)
                            <tr>
                                <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$out->id}}</font></font></td>
                                <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$out->pay_identity}}</font></font></td>
                                <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$out->sum}}</font></font></td>
                                <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$out->status}}</font></font></td>
                                <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$out->created_at}}</font></font></td>
                                <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$out->updated_at}}</font></font></td>
                            </tr>
                        @endforeach


                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix">
                    {{$transactions->links()}}
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

@endsection
