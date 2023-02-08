@extends('adminlte::page')

@section('title', $title)

@section('content_header')

<h1>{{ $title }}</h1>
@stop

@section('content')
<div class="containe-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-edit"></i>
                        Button Tambah
                    </h3>
                </div>

                <div class="card-body">
                    <form action="{{ route('pinjam.store') }}" enctype="multipart/form-data" method="POST">
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('js')
<script>
    $('.pas-delete-metu-alert-cantik').click(function(event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        Swal.fire({
            title: "PERHATIAN",
            text: "Setelah di hapus, anda tidak akan dapat memulihkan data ini!",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yakin!'
        }).then((diHapus) => {
            if (diHapus.value) {
                form.submit();
            }
        });
        return false;
    });

    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    @if($message = Session::get('success'))
    Toast.fire('Sukses !!!', '{{ $message }}', 'success')
    @endif

    @if($errors->any())
    Toast.fire('Eror !!!', '{{ $errors->first() }}', 'error')
    @endif
</script>
@stop