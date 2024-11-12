@extends('layouts.admin')

@section('header')
    <h1 class="h3 mb-4 text-gray-800">All Application Form Purchases</h1>
@endsection

@section('content')
{{-- @include("admin.reports.user_edit") --}}
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title" align="center">All Application Form Purchases</h5>
            <div class="table-responsive">
                <table id="all_form_purchases_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Reference Code</th>
                        <th>Status</th>
                        <th>Date</th>
                        {{-- <th>Actions</th> --}}
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($form_purchases as $item)
                        <tr>
                            <td>{{$item->fullname}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->phone}}</td>
                            <td>{{$item->reference}}</td>
                            <td>{{$item->status}}</td>
                            <td>{{$item->payment_date}}</td>
                            
                            {{-- <td>
                                <div class="btn-group">
                                    <button class="btn btn-primary edit-user" value="{{$item->id}}"><i class="fa fa-edit" title="Edit"></i></button>
                                </div>
                            </td> --}}
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <script>
        // showform_purchases();
        // function showform_purchases()
        // {
        //     //var data = $('#frm-create-dept').serialize();
        //     console.log(data);
        //     $.get("{{route('reports.all-users')}}", data, function (data) {
        //         $('#add-dept').empty().append(data);
        //     });
        // }

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
            $('#all_form_purchases_table').DataTable( {
                responsive: true,
                dom: 'lBfrtip',
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5',
                    'print'
                ]
            });
        });
    </script>
@endsection
