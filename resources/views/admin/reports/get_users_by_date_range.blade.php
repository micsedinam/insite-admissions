@extends('layouts.admin')

@section('header')
    <h1 class="h3 mb-4 text-gray-800">Get User Information</h1>
@endsection

@section('content')
@include("admin.reports.user_edit")
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="bg-info text-white card-header">Get User Information By Date Range</div>

            <div class="card-body">
                <form id="frm-get-user" action="{{route('reports.users.date.range.filter')}}" method="POST">
                    {{ csrf_field() }}
                    <p id="message"></p>
                    <p style="color:green" id="success"></p>
                
                    <div class="row">
                        <div class="col-md-6">
                            <label class="label-control">Start Date</label>
                            <input type="date" class="form-control" id="start_date" name="start_date" required>
                        </div>
                        <div class="col-md-6">
                            <label class="label-control">End Date</label>
                            <input type="date" class="form-control" id="end_date" name="end_date" required>
                        </div>
                    </div>
                    
                    
                    <p class="name_error_text"></p>
                    </label><br>
                    <button type="submit" class="btn btn-outline-secondary btn-block">Filter Users</button>
                </form>
            </div>
        </div>
    </div>
</div>
<br>


<div class="card mb-4">
    <div class="card-body">
        <h5 class="card-title" align="center">All Users</h5>
        <div class="table-responsive">
            <table id="all_users_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>User Type</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $item)
                    <tr>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>
                            @if ($item->is_admin == 1)
                                System Admin
                            @elseif ($item->is_admin == 3)
                                School Administrator
                            @elseif ($item->is_admin == 0)
                                New Applicant
                            @else
                                Continuing Student
                            @endif
                        </td>
                        <td>
                            <div class="btn-group">
                                <button class="btn btn-primary edit-user" value="{{$item->id}}"><i class="fa fa-edit" title="Edit"></i></button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
<script>
    $(document).on('click', '.edit-user', function (e) {
        $('#show-user-edit').modal('show');
        var id = $(this).val();
        $.get("{{route('user.edit')}}", {id:id}, function (data) {
            console.log(data)
            $('#user_id_edit').val(data.id);
            $('#user_type_edit').val(data.is_admin);
        });
    });

    $('.btn-update-user').on('click', function (e) {
        e.preventDefault();
        var data = $('#frm-update-user').serialize();
        $.post("{{route('user.update')}}", data, function (data) {
            //showDepartments(data.dept_name);
            $('#show-user-edit').modal('hide');
            swal('SUCCESS',
                'User type updated successfully',
                'success');
                
            location.reload(true);
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

    $(document).ready(function() {
        $('#all_users_table').DataTable( {
            responsive: true,
            dom: 'lBfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5',
                'print'
            ]
        } );
    } );
</script>
@endsection
