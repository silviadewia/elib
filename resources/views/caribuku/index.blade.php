@extends('adminlte::page')

@section('title', $title)

@section('content_header')
<h1>{{ $title }}</h1>
@stop

@section('content')
<div class="tab-pane fade show active p-3" id="caribuku" role="tabpanel" aria-labelledby="caribuku-tab">
    <div class="row">
        <div class="col-6">
            <h5 style="font-size: 20px; line-height:22px; font-family: Franklin Gothic Medium; margin-left: 20px;">
                Mungkin Anda Suka</h5>
        </div>
        <div class="col-6 pe-5">
            <div class="box-tools">
                <div class="d-flex justify-content-property float-right" style="width: 20vw; margin-right: 5vwr;">
                    <input type="text" name="table_search" class="form-control pull-raight" placeholder="Search">
                    <div class="input-group-btn">
                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="#" class="btn btn-light"
        style="border-radius: 20px; margin-left: 20px; font-family: Arial, Helvetica, sans-serif;">Filosofi Teras</a>
    <a href="#" class="btn btn-light" style="border-radius: 20px; font-family: Arial, Helvetica, sans-serif;">Sekolah
        Rimba</a>
    <a href="#" class="btn btn-light"
        style="border-radius: 20px; font-family: Arial, Helvetica, sans-serif;">Mindset</a>
    <a href="#" class="btn btn-light" style="border-radius: 20px; font-family: Arial, Helvetica, sans-serif;">Atomic
        Habiz</a>
    <p>&nbsp;</p>
    <style>
    .card-body:hover {
        -moz-transform: scale(1.1);
        -webkit-transform: scale(1.1);
        transform: scale(1.1);
        transition-duration: .7s;
    }
    </style>
    <div class="row">
        <div class="col-sm-3 col-lg-2 col-6 mb-5 text-center p-1"
            style="background: #ffff; width:100%; height: 100%; margin-top: 10px; margin-bottom: 10px; margin-right: 10px; margin-left: 20px;">
            <div class="card-body p-1">
                <img src="img/Rectangle 22.png"
                    style="display: block; margin: 0 auto; width: 100%; height: 100%; border-radius: 10px; margin-top: -45px; margin-bottom: 15px;">
                <div style="min-height: 40px;">Apapun Selain Hujan
                    Pengarang: Orizuka
                </div>
                <div style="font-size: 10px;"></div>
                </a>
                <a href="#" class="btn btn-warning btn-sm btn-block mt-2" style="border-radius: 25px;">Beli</a>
            </div>
        </div>
        <div class="col-sm-3 col-lg-2 col-6 mb-5 text-center p-1"
            style="background: #ffff; width:100%; height: 100%; margin-top: 10px; margin-bottom: 10px; margin-right: 10px; margin-left: 20px;">
            <div class="card-body p-1">
                <img src="img/Rectangle 22.png"
                    style="display: block; margin: 0 auto; width: 100%; height: 100%; border-radius: 10px; margin-top: -45px; margin-bottom: 15px;">
                <div style="min-height: 40px;">Apapun Selain Hujan
                    Pengarang: Orizuka
                </div>
                <div style="font-size: 10px;"></div>
                </a>
                <a href="#" class="btn btn-warning btn-sm btn-block mt-2" style="border-radius: 25px;">Beli</a>
            </div>
        </div>
        <div class="col-sm-3 col-lg-2 col-6 mb-5 text-center p-1"
            style="background: #ffff; width:100%; height: 100%; margin-top: 10px; margin-bottom: 10px; margin-right: 10px; margin-left: 20px;">
            <div class="card-body p-1">
                <img src="img/Rectangle 23.png"
                    style="display: block; margin: 0 auto; width: 100%; height: 100%; border-radius: 10px; margin-top: -45px; margin-bottom: 15px;">
                <div style="min-height: 40px;">Apapun Selain Hujan
                    Pengarang: Orizuka
                </div>
                <div style="font-size: 10px;"></div>
                </a>
                <a href="#" class="btn btn-warning btn-sm btn-block mt-2" style="border-radius: 25px;">Beli</a>
            </div>
        </div>
        <div class="col-sm-3 col-lg-2 col-6 mb-5 text-center p-1"
            style="background: #ffff; width:100%; height: 100%; margin-top: 10px; margin-bottom: 10px; margin-right: 10px; margin-left: 20px;">
            <div class="card-body p-1">
                <img src="img/Rectangle 24.png"
                    style="display: block; margin: 0 auto; width: 100%; height: 100%; border-radius: 10px; margin-top: -45px; margin-bottom: 15px;">
                <div style="min-height: 40px;">Apapun Selain Hujan
                    Pengarang: Orizuka
                </div>
                <div style="font-size: 10px;"></div>
                </a>
                <a href="#" class="btn btn-warning btn-sm btn-block mt-2" style="border-radius: 25px;">Beli</a>
            </div>
        </div>
        <div class="col-sm-3 col-lg-2 col-6 mb-5 text-center p-1"
            style="background: #ffff; width:100%; height: 100%; margin-top: 10px; margin-bottom: 10px; margin-right: 10px; margin-left: 20px;">
            <div class="card-body p-1">
                <img src="img/Rectangle 25.png"
                    style="display: block; margin: 0 auto; width: 100%; height: 100%; border-radius: 10px; margin-top: -45px; margin-bottom: 15px;">
                <div style="min-height: 40px;">Apapun Selain Hujan
                    Pengarang: Orizuka
                </div>
                <div style="font-size: 10px;"></div>
                </a>
                <a href="#" class="btn btn-warning btn-sm btn-block mt-2" style="border-radius: 25px;">Beli</a>
            </div>
        </div>
    </div>
    <p>&nbsp;</p>
    <div class="row">
        <div class="col-sm-3 col-lg-2 col-6 mb-5 text-center p-1"
            style="background: #ffff; width:100%; height: 100%; margin-top: 10px; margin-bottom: 10px; margin-right: 10px; margin-left: 20px;">
            <div class="card-body p-1">
                <img src="img/Rectangle 26.png"
                    style="display: block; margin: 0 auto; width: 100%; height: 100%; border-radius: 10px; margin-top: -45px; margin-bottom: 15px;">
                <div style="min-height: 40px;">Apapun Selain Hujan
                    Pengarang: Orizuka
                </div>
                <div style="font-size: 10px;"></div>
                </a>
                <a href="#" class="btn btn-warning btn-sm btn-block mt-2" style="border-radius: 25px;">Beli</a>
            </div>
        </div>
        <div class="col-sm-3 col-lg-2 col-6 mb-5 text-center p-1"
            style="background: #ffff; width:100%; height: 100%; margin-top: 10px; margin-bottom: 10px; margin-right: 10px; margin-left: 20px;">
            <div class="card-body p-1">
                <img src="img/Rectangle 21.png"
                    style="display: block; margin: 0 auto; width: 100%; height: 100%; border-radius: 10px; margin-top: -45px; margin-bottom: 15px;">
                <div style="min-height: 40px;">Apapun Selain Hujan
                    Pengarang: Orizuka
                </div>
                <div style="font-size: 10px;"></div>
                </a>
                <a href="#" class="btn btn-warning btn-sm btn-block mt-2" style="border-radius: 25px;">Beli</a>
            </div>
        </div>
        <div class="col-sm-3 col-lg-2 col-6 mb-5 text-center p-1"
            style="background: #ffff; width:100%; height: 100%; margin-top: 10px; margin-bottom: 10px; margin-right: 10px; margin-left: 20px;">
            <div class="card-body p-1">
                <img src="img/Rectangle 21.png"
                    style="display: block; margin: 0 auto; width: 100%; height: 100%; border-radius: 10px; margin-top: -45px; margin-bottom: 15px;">
                <div style="min-height: 40px;">Apapun Selain Hujan
                    Pengarang: Orizuka
                </div>
                <div style="font-size: 10px;"></div>
                </a>
                <a href="#" class="btn btn-warning btn-sm btn-block mt-2" style="border-radius: 25px;">Beli</a>
            </div>
        </div>
        <div class="col-sm-3 col-lg-2 col-6 mb-5 text-center p-1"
            style="background: #ffff; width:100%; height: 100%; margin-top: 10px; margin-bottom: 10px; margin-right: 10px; margin-left: 20px;">
            <div class="card-body p-1">
                <img src="img/Rectangle 21.png"
                    style="display: block; margin: 0 auto; width: 100%; height: 100%; border-radius: 10px; margin-top: -45px; margin-bottom: 15px;">
                <div style="min-height: 40px;">Apapun Selain Hujan
                    Pengarang: Orizuka
                </div>
                <div style="font-size: 10px;"></div>
                </a>
                <a href="#" class="btn btn-warning btn-sm btn-block mt-2" style="border-radius: 25px;">Beli</a>
            </div>
        </div>
        <div class="col-sm-3 col-lg-2 col-6 mb-5 text-center p-1"
            style="background: #ffff; width:100%; height: 100%; margin-top: 10px; margin-bottom: 10px; margin-right: 10px; margin-left: 20px;">
            <div class="card-body p-1">
                <img src="img/Rectangle 21.png"
                    style="display: block; margin: 0 auto; width: 100%; height: 100%; border-radius: 10px; margin-top: -45px; margin-bottom: 15px;">
                <div style="min-height: 40px;">Apapun Selain Hujan
                    Pengarang: Orizuka
                </div>
                <div style="font-size: 10px;"></div>
                </a>
                <a href="#" class="btn btn-warning btn-sm btn-block mt-2" style="border-radius: 25px;">Beli</a>
            </div>
        </div>
    </div>
    @stop