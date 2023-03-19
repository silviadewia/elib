@extends('adminlte::page')

@section('title', $title)

@section('content_header')

<h1>{{$title}}</h1>
@stop

@section('css')
<style>
    /* css result password  */
    .weak {
        color: #FF0000;
    }
    .good {
        color: #FF9900;
    }

    .strong {
        color: #33CC00;
    }


</style>
@stop

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#settings"
                                    data-toggle="tab">Settings</a></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="settings">
                                <form class="form-horizontal">
                                    <input type="hidden" name="id" value="{{ $details->id }}">
                                    <div class="form-group row">
                                        <label for="username" class="col-sm-2 col-form-label">Username</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="username" value="{{ $details->name }}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="email"
                                                placeholder="Email"  value="{{ $details->email }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="password" id="password" placeholder="******">
                                            <div id="result"> </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="repassword" class="col-sm-2 col-form-label">Repeat Password</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="repassword" id="repassword" placeholder="*******"></input>
                                            <div id="result"> </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <a class="btn btn-danger" id="simpan" name="simpan">Submit</a>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>

                    </div>
                </div>

            </div>

        </div>

    </div>
</section>
@stop

@include('wa')

@section('js')
<script>
//jQuery Password Strength Checker

$(document).ready(function() {
    $('#password').keyup(function() {
        $('#result').html(checkStrength($('#password').val()))
    })

    function checkStrength(password) {
        var strength = 0
        if (password.length < 6) {
            $('#result').removeClass()
            $('#result').addClass('short')
            return 'Too short'
        }
        if (password.length > 7) strength += 1
        // If password contains both lower and uppercase characters, increase strength value.
        if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) strength += 1
        // If it has numbers and characters, increase strength value.
        if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) strength += 1
        // If it has one special character, increase strength value.
        if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
        // If it has two special characters, increase strength value.
        if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
        // Calculated strength value, we can return messages
        // If value is less than 2
        if (strength < 2) {
            $('#result').removeClass()
            $('#result').addClass('weak')
            return 'Weak'
        } else if (strength == 2) {
            $('#result').removeClass()
            $('#result').addClass('good')
            return 'Good'
        } else {
            $('#result').removeClass()
            $('#result').addClass('strong')
            return 'Strong'
        }
    }
});

function checkPassword(){
    var password = $("#password").val();
    var repassword = $("#repassword").val();
    if(password != repassword){
        alert("Password tidak sama");
        return false;
    }
    return true;
}

// ajax update profile
$('#simpan').click(function(e) {
    e.preventDefault();
    var email = $('#email').val();
    var password = $('#password').val();
    var repassword = $('#repassword').val();
    if (checkPassword()) {
        $.ajax({
            type: "put",
            url: "{{ route('profile.update', ['id', $details->id]) }}",
            data: {
                "_token": "{{ csrf_token() }}",
                "email": email,
                'id': '{{ $details->id }}',
                "password": password,
                "repassword": repassword
            },
            success: function(response) {
                if (response.code == 200) {
                    Swal.fire({
                        title: 'Success',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    })
                } else {
                    Swal.fire({
                        title: 'Error',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'OK'
                    })
                }
            },
            error: function(response) {
                Swal.fire({
                    title: 'Error',
                    text: response.message,
                    icon: 'error',
                    confirmButtonText: 'OK'
                })
            }
        });
    }
});
</script>
@stop