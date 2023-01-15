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

<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Monthly Recap Report</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <div class="btn-group">
                <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-wrench"></i></button>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                </ul>
            </div>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>

    <div class="box-body">
        <div class="row">
            <div class="col-md-8">
                <p class="text-center">
                    <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
                </p>
                <div class="chart">

                    <canvas id="" style="height: 180px; width: 702px;" height="180" width="702" ></canvas>
                </div>

            </div>

            <div class="col-md-4">
                <p class="text-center">
                    <strong>Goal Completion</strong>
                </p>
                <div class="progress-group">
                    <span class="progress-text">Add Products to Cart</span>
                    <span class="progress-number"><b>160</b>/200</span>
                    <div class="progress sm">
                        <div class="progress-bar progress-bar-aqua" style="width: 80%"></div>
                    </div>
                </div>

                <div class="progress-group">
                    <span class="progress-text">Complete Purchase</span>
                    <span class="progress-number"><b>310</b>/400</span>
                    <div class="progress sm">
                        <div class="progress-bar progress-bar-red" style="width: 80%"></div>
                    </div>
                </div>

                <div class="progress-group">
                    <span class="progress-text">Visit Premium Page</span>
                    <span class="progress-number"><b>480</b>/800</span>
                    <div class="progress sm">
                        <div class="progress-bar progress-bar-green" style="width: 80%"></div>
                    </div>
                </div>

                <div class="progress-group">
                    <span class="progress-text">Send Inquiries</span>
                    <span class="progress-number"><b>250</b>/500</span>
                    <div class="progress sm">
                        <div class="progress-bar progress-bar-yellow" style="width: 80%"></div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <div class="box-footer">
        <div class="row">
            <div class="col-sm-3 col-xs-6">
                <div class="description-block border-right">
                    <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span>
                    <h5 class="description-header">$35,210.43</h5>
                    <span class="description-text">TOTAL REVENUE</span>
                </div>

            </div>

            <div class="col-sm-3 col-xs-6">
                <div class="description-block border-right">
                    <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> 0%</span>
                    <h5 class="description-header">$10,390.90</h5>
                    <span class="description-text">TOTAL COST</span>
                </div>

            </div>

            <div class="col-sm-3 col-xs-6">
                <div class="description-block border-right">
                    <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 20%</span>
                    <h5 class="description-header">$24,813.53</h5>
                    <span class="description-text">TOTAL PROFIT</span>
                </div>

            </div>

            <div class="col-sm-3 col-xs-6">
                <div class="description-block">
                    <span class="description-percentage text-red"><i class="fa fa-caret-down"></i> 18%</span>
                    <h5 class="description-header">1200</h5>
                    <span class="description-text">GOAL COMPLETIONS</span>
                </div>

            </div>
        </div>

    </div>

</div>
@endsection
