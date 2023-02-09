@extends('layouts.student')

@section('header')
    <h1 class="h3 mb-4 text-gray-800">Change Password</h1>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header bg-info text-white">Change Password</div>

                <div class="card-body">
                    <form id="" method="POST" action="{{ route('reset.password') }}">
                        @csrf

                        <div class="form-group">
                            <label for="password" class="col-form-label text-md-right">Current Password</label>
                            <input id="oldpassword" type="password" class="form-control" name="oldpassword" required autocomplete="new-password">
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-form-label text-md-right">New Password</label>
                            <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-form-label text-md-right">Confirm New Password</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <button type="submit" class="btn btn-block btn-outline-primary">
                            Change Password
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="application/javascript">

        $('#frm-change-password').on('submit', function (e) {
            e.preventDefault();
            var data = $(this).serialize();
            var url = $(this).attr('action');
            $.post(url, data,function (data) {
                console.log(data);
                swal('SUCCESS',
                    'Password chnaged successfully',
                    'success');
                $('#frm-change-password').trigger('reset');
            }).fail(function (data,status,error) {
                console.log(data);
                var response = $.parseJSON(data.responseText)
                var possible_keys = Object.keys(response.errors);
                possible_keys.forEach((key)=>{
                    $.each(response.errors[key], function(key, value){
                        swal({
                            title: "Ooops!",
                            text: value,
                            icon: "error",
                            color: "#FEFAE3",
                            button: "OK",
                        });
                    });
                });
            });
        });
    </script>
@endsection
