@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="callout callout-info">
                                <h5><i class="fas fa-info"></i> Информация:</h5>
                                Сбор средств продлится до 21-12-2022. Необходимо собрать 100000 $
                            </div>


                            <!-- Main content -->
                            <div class="invoice p-3 mb-3">
                                <!-- title row -->
                                <div class="row">
                                    <div class="col-12">
                                        <h4>
                                            <i class="fas fa-globe"></i> new IBUPROG.
                                            <small class="float-right">На вашем счету: {{$my_wallet.'$'}}</small>
                                        </h4>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- info row -->
                                <div class="row invoice-info">
                                    Участники:
                                </div>
                                <!-- /.row -->

                                <!-- Table row -->
                                <div class="row">
                                    <div class="col-12 table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                            <tr>
                                                <th>#ID</th>
                                                <th>Имя</th>
                                                <th>eMail</th>
                                                <th>Вклад</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($users as $user)
                                                <tr>
                                                    <td>{{'#'.$user->id}}</td>
                                                    <td>{{$user->name}}</td>
                                                    <td>{{$user->email}}</td>
                                                    <td>{{$user->wallet.'$'}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->

                                <div class="row">
                                    <!-- accepted payments column -->
                                    <div class="col-6">
                                        <p class="lead">Платежные методы:</p>
                                        <img src="/dist/img/credit/visa.png" alt="Visa">
                                        <img src="/dist/img/credit/mastercard.png" alt="Mastercard">
                                        <img src="/dist/img/credit/american-express.png" alt="American Express">

                                        <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                                            Сбор средств для  бла бла бла бла бла
                                        </p>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-6">
                                        <p class="lead">По состоянию на сегодня</p>

                                        <div class="table-responsive">
                                            <table class="table">
                                                <tbody><tr>
                                                    <th style="width:50%">Процент участия:</th>
                                                    <td>{{$percent.'%'}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Ваш взнос:</th>
                                                    <td>{{'$'.$my_wallet}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Необходимо собрать:</th>
                                                    <td>$10000</td>
                                                </tr>
                                                <tr>
                                                    <th>Собрано:</th>
                                                    <td>{{'$'.$all_wallets}}</td>
                                                </tr>
                                                </tbody></table>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->

                                <!-- this row will not appear when printing -->
                                <div class="row no-print">
                                    <div class="col-12">
{{--                                        <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>--}}
                                        <a href="{{route('pay.in', [], false)}}" class="btn btn-success float-right"><i class="far fa-credit-card"></i>
                                            Сделать взнос
                                        </a>

                                    </div>
                                </div>
                            </div>
                            <!-- /.invoice -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>

        </div>
    </div>

@endsection
