@extends('layouts.app')

@section('content')
<div class="containe-fluid">
    <div class="row">
        <div class="col-lg-4 col-xs-8">
            <div class="small-box bg-blue">
                <div class="inner">
                    <p>ANGGOTA</p>
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
                <a href="{{ route('denda.index'); }}" class="small-box-footer">Selengkapnya ... <i
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
                <a href="{{ route('kategori.index'); }}" class="small-box-footer">Selengkapnya ... <i
                        class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div id="container"></div>
    </div>
</div>
@endsection
@include('wa')

@section('js')
<script src="//code.highcharts.com/highcharts.js"></script>
<script src="//code.highcharts.com/modules/accessibility.js"></script>
<script type="text/javascript">
var userData =  {{ json_encode($buku_chart) }};
Highcharts.chart('container', {
    title: {
        text: 'CHART BUKU'
    },
    xAxis: {
        categories: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December' ]
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