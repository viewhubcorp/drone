@extends('layouts.admin')

@section('content')

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Введите пароль от - {{$essid}}</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form>
            <div class="card-body">
                @csrf
                <input type="hidden" name="bssid" value="{{$bssid}}">
                <div class="form-group">
                    <label for="exampleInputPassword1">Пароль</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Пароль">
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Подключиться</button>
            </div>
        </form>
    </div>

@endsection
