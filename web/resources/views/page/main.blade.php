@extends('layouts.admin')

@section('content')
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
                    <p><a href="" class="btn btn-block bg-gradient-primary btn-lg" style="text-decoration: auto; color: #fff">Включить</a></p></center>
                </div>

            </div>
            <!-- /.card -->
        </div>
    </div>

@endsection
