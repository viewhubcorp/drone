@extends('layouts.admin')

@section('content')
    <br>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Таблица инкасации АЗС</font></font></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-bordered text-nowrap">
                        <thead>
                        <tr>
                            <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">ID</font></font></th>
                            <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Инициатор</font></font></th>
                            <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Сумма</font></font></th>
                            <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Дата</font></font></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($incasations as $incasation)
                            <tr>
                                <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$incasation->id}}</font></font></td>
                                <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{\App\User::find($incasation->initiator_id)->name}}</font></font></td>
                                <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$incasation->sum}} грн.</font></font></td>
                                <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$incasation->created_at}}</font></font></td>
                            </tr>
                        @endforeach


                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix">
                    {{$incasations->links()}}
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

@endsection
