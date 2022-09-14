@extends('layouts.admin')

@section('header')
    <h1 class="h3 mb-4 text-gray-800">Courses</h1>
@endsection

@section('content')
{{-- @include('admin.department.edit') --}}
<div class="row justify-content-center">
    <div class="col-md-8 mb-4">
        <div class="card">
            <div class="bg-warning text-white card-header text-center">Search Registered Students Course List</div>
            <div class="card-body">
                <form action="{{route('retrieve.course.list')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Course Code</label>
                                <input class="form-control" type="text" name="course_code" id="" placeholder="Kindly enter course code">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="dept_id">Department</label>
                                <select class="form-control" name="dept_id" id="dept_id">
                                    <option value="">Select department</option>
                                    @foreach ($dept as $item)
                                        <option value="{{ $item->id }}">{{ $item->dept_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 offset-md-2">
                        <button class="btn btn-primary btn-block" type="submit">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title" align="center">All Registered Students Course List</h5>
                <div class="table-responsive">
                    <table id="course_list_table" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Fullname</th>
                            <th>Index Number</th>
                            <th>Course Code</th>
                            <th>Level</th>
                            <th>Semester</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($course_list as $item)
                            <tr>
                                <td>{{$item->name}}</td>
                                <td>{{$item->index_number}}</td>
                                <td>{{$item->course_code}}</td>
                                <td>{{$item->level}}</td>
                                <td>{{$item->semester}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
    
                </div>
    
            </div>
        </div>
    </div>
</div>

{{-- <script type="application/javascript">
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
        var data = $('#frm-create-courses').serialize();
        console.log(data);
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


</script> --}}
@endsection
@section('script')
<script>
    $(document).ready(function() {
        $('#course_list_table').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'excel', 'pdf', 'print'
            ]
        });
    });
</script>
@endsection
