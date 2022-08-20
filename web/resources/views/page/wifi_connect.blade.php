@extends('layouts.admin')

@section('content')
<br>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Введите пароль от - {{$essid}}</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="post" action="{{route('setting.wifi_connect', [], false)}}">
            <div class="card-body">
                @csrf
                <input type="hidden" name="bssid" value="{{$bssid}}">
                <input type="hidden" name="essid" value="{{$essid}}">
                <div class="form-group">
                    <label for="exampleInputPassword1">Пароль</label>
                    <input type="password" name="psk" class="form-control" id="exampleInputPassword1" placeholder="Пароль">
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Подключиться</button>
            </div>
        </form>
    </div>

@endsection
