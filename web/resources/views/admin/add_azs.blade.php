@extends('layouts.admin')

@section('content')
    <br>
    <div class="row">
        <div class="col-12">


            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Создать заправку</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('save_azs', [], false)}}" method="post">
                        @csrf

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Название</span>
                        </div>
                        <input type="text" class="form-control" name="name">
                    </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Адресс</span>
                            </div>
                            <input type="text" class="form-control" name="adress">
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
