@can('buku-populer')
@extends('adminlte::page')

@section('title', $title)

@section('content_header')
<h1>{{ $title }}</h1>
@stop

@section('css')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
<style>

.tag {
    text-align: center;
    font-size: 1.1rem
}

.fa-heart {
    color: rgba(255, 230, 0, 0.959);
    font-size: 30px
}

.card {
    padding: 10px 20px;
    border: none;
    box-shadow: -1px 3px 5px #a7a7a7
}

.testimonial {
    font-size: 0.9rem;
    line-height: 1.4rem;
    font-weight: 500
}

.active-star {
    color: #FBC02D;
    margin-bottom: 8px
}

.active-star:hover {
    color: #F9A825;
    cursor: pointer
}

.name {
    font-weight: 700
}

.designation {
    font-size: 0.84rem;
    font-weight: 600
}

.owl-carousel {
    margin-bottom: 15px
}

.owl-carousel .owl-item img {
    width: 45px !important;
    height: 45px;
    border-radius: 50%;
    object-fit: cover
}

.owl-theme .owl-nav [class*='owl-'] {
    border-radius: 50% !important;
    background: inherit !important;
    border: 3px solid #bbb;
    color: #bbb !important
}

.owl-theme .owl-nav [class*='owl-']:hover {
    border: 3px solid #1010ca;
    color: #1010ca !important
}
</style>
@stop

@section('content')
<div class="containe-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h5 class="card-title"> Buku Populer</h5>
                </div>
                <div class="card-body">
                    <div class="owl-carousel owl-theme owl-img-responsive">
                        @foreach ($populer as $item)
                        <div class="owl-item">
                            <div class="card d-flex flex-column">
                                <div class="main font-weight-bold pb-2 pt-1">{{ $item->judul_buku }}</div>
                                <div class="testimonial"> {{ $item->keterangan_lain }}</div>
                                <div class="d-flex flex-row profile pt-4 mt-auto">
                                    <div class="d-flex flex-column pl-2">
                                        <div class="name">
                                            @foreach ($pengarang as $cari)
                                                @if ($cari->id == $item->pengarang)
                                                {{ $cari->nama }}
                                                @endif
                                            @endforeach
                                        </div>
                                        <p class="text-muted designation">{{ $item->tahun_buku }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@include('wa')

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.js"></script>
<script>
$(document).ready(function() {
    var silder = $(".owl-carousel");
    silder.owlCarousel({
        items: 4,
        loop: true,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 2000,
        autoplayHoverPause: true,
    });
});
</script>

@stop

@endcan