@extends('layouts.admin')

@section('content')
    <br>
    <div class="row">
        <div class="col-12">


            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">{{$psevdo}} - заправка</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('add_transaction', [], false)}}" method="post">
                        @csrf
                    <input type="hidden" value="{{$type}}" name="type" id="type_transaction">

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Остаток {{$psevdo}}</span>
                        </div>
                        <input type="number" class="form-control" value="{{$count}}" id="operator_count" disabled>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Стоимость</span>
                        </div>
                        <input type="number" class="form-control" value="{{$cost}}" id="operator_cost" disabled>
                    </div>


                    <div class="input-group input-group-lg mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Литры</span>
                        </div>
                        <input type="text" class="form-control" placeholder="1" value="1" id="operator_liter" name="liter">
                    </div>

                    <div class="input-group input-group-lg mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Сумма</span>
                        </div>
                        <input type="text" class="form-control" id="operator_sum" value="{{$cost}}">
                        <span class="input-group-append">
                    <button type="submit" class="btn btn-warning btn-flat">Готово</button>
                  </span>
                    </div>

                    </form>
                    <!-- /input-group -->
                </div>
                <!-- /.card-body -->
            </div>


            <!-- /.card -->
        </div>
    </div>



@endsection
