@extends('layouts.admin')

@section('header')
    <h1 class="h3 mb-4 text-gray-800">Departments</h1>
@endsection

@section('content')
@include('admin.department.edit')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="bg-info text-white card-header">Add New Department</div>

            <div class="card-body">
                <form id="frm-create-dept" action="{{route('department.store')}}" method="POST">
                    {{ csrf_field() }}
                    <p id="message"></p>
                    <p style="color:green" id="success"></p>
                
                    <label class="label-control">Department Name</label>
                    <input class="form-control" id="dept_name" name="dept_name">
                    
                    <p class="name_error_text"></p>
                    </label><br>
                    <button type="submit" class="btn btn-outline-secondary btn-block">Add Department</button>
                </form>
            </div>
        </div>
    </div>
</div>
<br>
<div id="add-dept">

</div>

<script type="application/javascript">
    showDepartments();

    $('#frm-create-dept').on('submit', function (e) {
        e.preventDefault();
        var data = $(this).serialize();
        var url = $(this).attr('action');
        $.post(url, data,function (data) {
            showDepartments(data.id);
            console.log(data);
            swal('SUCCESS',
                'Department saved successfully',
                'success');
            $('#frm-create-dept').trigger('reset');
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

    function showDepartments()
    {
        var data = $('#frm-create-dept').serialize();
        console.log(data);
        $.get("{{route('department.list')}}", data, function (data) {
            $('#add-dept').empty().append(data);
        });
    }

    $(document).on('click', '.edit-dept', function (e) {
        $('#show-dept').modal('show');
        var id = $(this).val();
        $.get("{{route('department.edit')}}", {id:id}, function (data) {
            console.log(data)
            $('#dept_id_edit').val(data.id);
            $('#dept_name_edit').val(data.dept_name);
        });
    });
    $('.btn-update-dept').on('click', function (e) {
        e.preventDefault();
        var data = $('#frm-update-dept').serialize();
        $.post("{{route('department.update')}}", data, function (data) {
            showDepartments(data.dept_name);
            $('#show-dept').modal('hide');
            swal('SUCCESS',
                'Department updated successfully',
                'success');
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
