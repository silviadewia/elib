@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-4 col-xs-8">
        <div class="small-box bg-blue">
            <div class="inner">
                <p>ANGGOTA</p>
                <h3>15</h3>
            </div>
            <div class="icon">
                <i class="fa fa-users"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-4 col-xs-8">

        <div class="small-box bg-red">
            <div class="inner">
                <p>DENDA</p>
                <h3>{{ $count_denda }}</h3>
            </div>
            <div class="icon">
                <i class="fa fa-book"></i>
            </div>
            <a href="{{ route('denda.index'); }}" class="small-box-footer">Selengkapnya ... <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-4 col-xs-8">

        <div class="small-box bg-yellow">
            <div class="inner">
                <p>KATEGORI</p>
                <h3>{{ $count_kategori }}</h3>
            </div>
            <div class="icon">
                <i class="fa fa-list"></i>
            </div>
            <a href="{{ route('kategori.index'); }}" class="small-box-footer">Selengkapnya ... <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>

@endsection
