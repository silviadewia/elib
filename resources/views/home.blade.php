@extends('layouts.app')

@section('content')
    <div class="containe-fluid">
        @if (Auth::user()->level == 1)
            <div class="row">
                <div class="col-lg-4 col-xs-8">
                    <div class="small-box bg-blue">
                        <div class="inner">
                            <p>Profile</p>
                            <h3>{{ $count_user }}</h3>
                        </div>
                        <div class="icon">
                            <i class="fa fa-users"></i>
                        </div>
                        <a href="/profile" class="small-box-footer">Profile ... <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-xs-8">

                    <div class="small-box bg-green">
                        <div class="inner">
                            <p>Buku Peminjaman Anda</p>
                            <h3>{{ $count_denda }}</h3>
                        </div>
                        <div class="icon">
                            <i class="fa fa-bars"></i>
                        </div>
                        <a href="{{ route('pinjam.index') }}" class="small-box-footer">Selengkapnya ... <i
                                class="fa fa-arrow-circle-right"></i></a>
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
                        <a href="{{ route('denda.index') }}" class="small-box-footer">Selengkapnya ... <i
                                class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card p-4 mt-3">
                        <h3 class="heading mt-5 text-center">Cari Buku</h3>
                        <form action="" method="get">
                            <div class="d-flex justify-content-center px-9">
                                <div class="search">
                                    <input type="text" class="search-input" placeholder="Search..." name="search"
                                        value="{{ Request::get('search') }}">
                                    <button type="submit" class="search-icon"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                        <style>
                            body {
                                background-color: white;

                            }

                            .card {

                                border: none;
                                background: #eee;
                            }

                            .search {
                                width: 100%;
                                margin-bottom: auto;
                                margin-top: 20px;
                                height: 50px;
                                background-color: #fff;
                                padding: 10px;
                                border-radius: 5px;
                            }

                            .search-input {
                                color: white;
                                border: 0;
                                outline: 0;
                                background: none;
                                width: 0;
                                margin-top: 5px;
                                caret-color: transparent;
                                line-height: 20px;
                                transition: width 0.4s linear
                            }

                            .search .search-input {
                                padding: 0 10px;
                                width: 100%;
                                caret-color: #536bf6;
                                font-size: 19px;
                                font-weight: 300;
                                color: black;
                                transition: width 0.4s linear;
                            }


                            .search-icon {
                                height: 34px;
                                width: 34px;
                                float: right;
                                display: flex;
                                justify-content: center;
                                align-items: center;
                                color: white;
                                background-color: #536bf6;
                                font-size: 10px;
                                bottom: 30px;
                                position: relative;
                                border-radius: 5px;
                            }

                            .search-icon:hover {

                                color: #fff !important;
                            }

                            a:link {
                                text-decoration: none
                            }



                            .card-inner {
                                position: relative;
                                display: flex;
                                flex-direction: column;
                                min-width: 0;
                                word-wrap: break-word;
                                background-color: #eee;
                                background-clip: border-box;
                                border: 1px solid rgba(0, 0, 0, .125);
                                border-radius: .25rem;
                                border: none;
                                cursor: pointer;
                                transition: all 2s;
                            }


                            .card-inner:hover {

                                transform: scale(1.1);

                            }

                            .mg-text span {

                                font-size: 12px;

                            }

                            .mg-text {

                                line-height: 14px;
                            }
                        </style>
                        <div class="row mt-4 g-1 px-4 mb-5">

                            @if (Request::get('search'))
                                @forelse ($search as $item)
                                    <div class="col-md-2">
                                        <div class="card-inner p-6 d-flex flex-column align-items-center"> <img
                                                src="/sampul/{{ $item['buku']->sampul }}" width="150px" height="150px"
                                                objectfit="contain;">
                                            <div class="text-center mg-text">
                                                <span class="mg-text">{{ $item['buku']->judul_buku }}</span> <br>
                                                @if ($item['hitungStok'] !== 0)
                                                    <span class="mg-text">Stok : {{ $item['hitungStok'] }}</span>
                                                @else
                                                    <span class="mg-text">Pengembalian tercepat :
                                                        {{ $item['pengembalian'] }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="col-12 text-center">
                                        Buku tidak ditemukan
                                    </div>
                                @endforelse
                            @else
                                <div class="col-12 text-center">

                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
    </div>
@else
    <div class="row">
        <div class="col-lg-4 col-xs-8">
            <div class="small-box bg-blue">
                <div class="inner">
                    <p>Profile</p>
                    <h3>{{ $count_user }}</h3>
                </div>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
                <a href="/profile" class="small-box-footer">Profile ... <i class="fa fa-arrow-circle-right"></i></a>
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
                <a href="{{ route('denda.index') }}" class="small-box-footer">Selengkapnya ... <i
                        class="fa fa-arrow-circle-right"></i></a>
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
                <a href="{{ route('kategori.index') }}" class="small-box-footer">Selengkapnya ... <i
                        class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    @endif

    @section('js')
        <script src="//code.highcharts.com/highcharts.js"></script>
        <script src="//code.highcharts.com/modules/accessibility.js"></script>
        <script type="text/javascript">
            var userData = {
                {
                    json_encode($buku_chart)
                }
            };
            Highcharts.chart('container', {
                title: {
                    text: 'CHART BUKU'
                },
                xAxis: {
                    categories: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August',
                        'September', 'October', 'November', 'December'
                    ]
                },
                yAxis: {
                    title: {
                        text: 'TOTAL BUKU BARU'
                    }
                },
                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'middle'
                },
                plotOptions: {
                    series: {
                        allowPointSelect: true
                    }
                },
                series: [{
                    name: 'BUKU BARU',
                    data: userData
                }],
                responsive: {
                    rules: [{
                        condition: {
                            maxWidth: 600
                        },
                        chartOptions: {
                            legend: {
                                layout: 'horizontal',
                                align: 'center',
                                verticalAlign: 'bottom'
                            }
                        }
                    }]
                }
            });
        </script>

    @stop
    <div class="container-fluid">
        <div id="container"></div>
    </div>
    </div>
@endsection
@include('wa')
