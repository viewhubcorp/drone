@extends('layouts.admin')

@section('content')
    <br>
    <div class="row">
        <div class="col-12">


            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Добавить человека</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('save_user', [], false)}}" method="post">
                        @csrf

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Имя</span>
                        </div>
                        <input type="text" class="form-control" name="name" required>
                    </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Телефон</span>
                            </div>
                            <input type="text" class="form-control" name="tel" required>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">E-Mail</span>
                            </div>
                            <input type="email" class="form-control" name="email" required>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">АЗС</span>
                            </div>
                            <select class="custom-select rounded-0" name="azs" required>
                                @foreach($azs as $a)
                                    <option value="{{$a->id}}">{{$a->name}} ({{$a->adress}})</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Должность</span>
                            </div>
                            <select class="custom-select rounded-0" name="role" required>
                                <option value="1">Оператор</option>
                                <option value="2">Администратор</option>
                            </select>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Пароль</span>
                            </div>
                            <input type="password" class="form-control" name="pass">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Повторить пароль</span>
                            </div>
                            <input type="password" class="form-control" name="re_pass">
                        </div>

                        <button type="submit" class="btn btn-warning btn-flat">Готово</button>
                    </form>
                    <!-- /input-group -->
                </div>
                <!-- /.card-body -->
            </div>


            <!-- /.card -->
        </div>
    </div>



@endsection
