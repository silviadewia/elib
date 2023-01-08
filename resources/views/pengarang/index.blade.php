@extends('adminlte::page')

@section('title', $title)

@section('content_header')

<h1>{{$title}}</h1>
@stop

@section('content')
<div class="containe-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-edit"></i>
                        Buttons
                    </h3>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                    @endif

                    <form method="post" action="{{ route('pengarang.store'); }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama">Nama pengarang</label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama pengarang" autocomplete="off">
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="reset" class="btn btn-default">Batal</button>
                            <button type="submit" class="btn btn-info  float-right"><i class="fas fa-plus"></i>
                                Simpan</button>
                        </div>
                </div>
                </form>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-edit"></i>
                        Buttons
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover dataTable dtr-inline" name="table-Pengarang" id="table-pengarang">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pengarang as $value)

                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $value->nama }}</td>
                                <td>
                                    <form action="{{ route('pengarang.destroy', $value->id) }}" method="post">
                                        <a href="{{ route('pengarang.edit',$value->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-pen"></i></a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm pas-delete-metu-alert-cantik"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('js')
<script>
    $(document).ready(function() {
        $('#table-pengarang').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });

    $('.pas-delete-metu-alert-cantik').click(function(event){
        var form =  $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        Swal.fire({
            title: "Punten, yakin mo delete??",
            text: "Sekali ilang, ilang terus loh.",
            icon: "warning",
            type: "warning",
            buttons: ["Gasido","Yo!"],
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yo, Yakin aku!'
        }).then((willDelete) => {
            if (willDelete) {
                form.submit();
            }
        });
    });
</script>
@stop