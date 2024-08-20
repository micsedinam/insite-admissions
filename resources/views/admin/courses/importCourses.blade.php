@extends('layouts.admin')

@section('header')
    <h1 class="h3 mb-4 text-gray-800">Courses</h1>
@endsection

@section('content')
{{-- @include('admin.department.edit') --}}
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="bg-info text-white card-header">Add New Course</div>

            <div class="card-body">
                <form id="frm-create-course" action="{{route('courses.import')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <p id="message"></p>
                    <p style="color:green" id="success"></p>
                
                    <label class="label-control">Upload Course List</label>
                    <input type="file" class="form-control" id="courses" name="courses">
                    
                    <p class="name_error_text"></p>
                    </label><br>
                    <button type="submit" class="btn btn-outline-secondary btn-block">Import Courses</button>
                </form>
            </div>
        </div>
    </div>
</div>
<br>
<div id="add-courses">

</div>

<script type="application/javascript">
    showCourses();

    /* $('#frm-create-dept').on('submit', function (e) {
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
    }); */

    function showCourses()
    {
        var data = $('#frm-create-course').serialize();
        //console.log(data);
        $.get("{{route('courses.list')}}", data, function (data) {
            $('#add-courses').empty().append(data);
        });
    }

    /* $(document).on('click', '.edit-dept', function (e) {
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
    }); */

    $(document).on('click', '.del-course', function (e) {
        var id = $(this).val();
        var validate = confirm("Are you sure you want to delete this Course?");
        if (validate === true) {
            $.post("{{route('delete.course')}}", {id: id}, function (data) {
                //showActivityInfo(data.activity_name);
                //$('#courses_table').DataTable().ajax.reload();
                
                swal('Deleted',
                    'Selected Course has been deleted successfully',
                    'success');
                
                location.reload(true);

            }).fail(function (data) {
                console.log(data);
                var responseJSON = data.responseJSON;
                var response = '';
                for (var key in responseJSON) {
                    if (responseJSON.hasOwnProperty(key)) {
                        response += "\n" + responseJSON[key] + "\n";
                    }
                }
                swal('ERROR',
                    response,
                    'error');
            })
        }else{swal('Cancelled',"Course not deleted");}
    })


</script>
@endsection
