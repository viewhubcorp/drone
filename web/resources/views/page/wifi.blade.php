@extends('layouts.admin')

@section('content')

    @if(!$wifi)

        <div class="row">
            <div class="col-12" style="height:85vh;">
                <div style=" width: 250px;
                height: 250px;
                position: absolute;
                top: 0;
                right: 0;
                bottom: 0;
                left: 0;
                margin: auto;">
                    <div class="callout callout-danger">
                        <center><i class="fas fa-wifi" style="font-size: 70pt;
    color: #6c757d;"></i></center>

                        <center><p>Wi-Fi отключен.</p>
                            <p><a href="{{route('setting.wifi_on', [], false)}}" class="btn btn-block bg-gradient-primary" style="text-decoration: auto; color: #fff">Включить</a></p></center>
                    </div>

                </div>
                <!-- /.card -->
            </div>
        </div>
    @else
    <section class="content">

        @if($wpa_supplicant)
            <br>
        <div class="callout callout-danger">
            <h5>Текущее подключение</h5>

            <p>{{$wpa_supplicant['essid']}} - {{$wpa_supplicant['bssid']}}</p>

            <p><b class="text-muted">@if($wpa_supplicant['essid'] == $check_connection) <span class="badge badge-success">ПОДКЛЮЧЕНО</span> @else Попытка подключения @endif</b></p>
            <p>
                <a href="{{route('setting.wifi_disconnect', [], false)}}" class="btn btn-block btn-secondary" style="text-decoration: auto; color: #fff">Отключиться от сети</a>

            </p>

        </div>
        @endif

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Доступные сети Wi-Fi</h3>

                <div class="card-tools">
                    <a href="{{route('setting.wifi_off', [], false)}}" class="btn btn-block bg-gradient-danger btn-xs" style="text-decoration: auto; color: #fff">Выключить Wi-Fi</a>
                </div>
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
                                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="{{ceil(100/70*$wifi['Quality'])}}" aria-valuemin="0" aria-valuemax="100" style="width: {{ceil(100/70*$wifi['Quality'])}}%">
                                        </div>
                                    </div>
                                    <small>
                                        {{ceil(100/70*$wifi['Quality'])}}%
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
                                    @if($wifi['now_connect'])
                                        <a class="btn btn-secondary btn-sm" href="{{route('setting.wifi_disconnect', [], false)}}">
                                            <i class="fas fa-wifi">
                                            </i>
                                            Отключиться
                                        </a>
                                    @else
                                        <a class="btn btn-primary btn-sm" href="{{route('setting.wifi_bssid', ['bssid'=>str_replace(":", "1", $wifi['Address']), false])}}">
                                            <i class="fas fa-wifi">
                                            </i>
                                            Подключиться
                                        </a>
                                    @endif

                                    @if($wifi['save_connect'])
                                    <a class="btn btn-danger btn-sm" href="{{route('setting.wifi_delete', ['bssid'=>str_replace(":", "1", $wifi['Address']), false])}}">
                                        <i class="fas fa-trash">
                                        </i>
                                        Забыть
                                    </a>
                                    @endif
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
    @endif
@endsection
