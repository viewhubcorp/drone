@extends('layouts.admin')

@section('content')
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Доступные сети Wi-Fi</h3>

{{--                <div class="card-tools">--}}
{{--                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">--}}
{{--                        <i class="fas fa-minus"></i>--}}
{{--                    </button>--}}
{{--                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">--}}
{{--                        <i class="fas fa-times"></i>--}}
{{--                    </button>--}}
{{--                </div>--}}
            </div>
            <div class="card-body p-0" style="display: block;">
                <table class="table table-striped projects">
                    <thead>
                    <tr>
                        <th>
                            #
                        </th>
                        <th>
                            ESSID / MAC
                        </th>
                        <th>
                            Инфо
                        </th>
                        <th>
                            Качество сигнала
                        </th>
                        <th class="text-center">
                            Пароль
                        </th>
                        <th>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($network as $number => $wifi)
                            <tr>
                                <td>
                                    {{$number}}
                                </td>
                                <td>
                                    <a>
                                        <b>{{$wifi['ESSID']}}</b>
                                    </a>
                                    <br>
                                    <small>
                                        {{$wifi['Address']}}
                                    </small>
                                </td>
                                <td>
                                    <small>
                                        {{$wifi['Frequency']}}
                                    </small>
                                    <br>
                                    <small>
                                        {{$wifi['Signal level']}}
                                    </small>
                                </td>
                                <td class="project_progress">
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="{{ceil(70/100*$wifi['Quality'])}}" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                        </div>
                                    </div>
                                    <small>
                                        {{ceil(70/100*$wifi['Quality'])}}%
                                    </small>
                                </td>
                                <td class="project-state">
                                    @if($wifi['Encryption key'] == 'on')
                                        <span class="badge badge-success">Есть</span>
                                    @else
                                        <span class="badge badge-danger">Нет</span>
                                    @endif
                                </td>
                                <td class="project-actions text-right">
                                    <a class="btn btn-primary btn-sm" href="#">
                                        <i class="fas fa-wifi">
                                        </i>
                                        Подключиться
                                    </a>
                                    <a class="btn btn-danger btn-sm" href="#">
                                        <i class="fas fa-trash">
                                        </i>
                                        Забыть
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
@endsection
