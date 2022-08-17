@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">



            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Новый взнос</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('pay', [], false)}}" method="post">
                    @csrf
                    <h5 class="mt-4 mb-2">Введите сумму взноса в долларах</h5>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                        </div>

                            <input type="number" name="sum" class="form-control">
                            <span class="input-group-append">
                                <button type="submit" class="btn btn-info">Оплатить</button>
                            </span>

                    </div>
                    </form>

                    <!-- /input-group -->

                    <p>Все транзакци можно отследить в - <code> Меню -> Транзакции</code></p>
                    <!-- /input-group -->
                </div>
                <!-- /.card-body -->
            </div>

        </div>
    </div>

@endsection
