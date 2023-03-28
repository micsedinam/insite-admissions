@extends('layouts.admin')

@section('header')
    <h1 class="h3 mb-4 text-gray-800">Results</h1>
@endsection

@section('content')
{{-- @include('admin.department.edit') --}}
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="bg-info text-white card-header">Add Semester Results</div>

            <div class="card-body">
                <form id="frm-create-result" action="{{route('results.import')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                
                    <label class="label-control">Upload Semester Results</label>
                    <input type="file" class="form-control" id="results" name="results">
                    
                    </label><br>
                    <button type="submit" class="btn btn-outline-secondary btn-block">Import Semester Results</button>
                </form>
            </div>
        </div>
    </div>
</div>
<br>
<div id="add-results">

</div>

<script type="application/javascript">
    showResults();

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

    function showResults()
    {
        var data = $('#frm-create-result').serialize();
        //console.log(data);
        $.get("{{route('student.results.show')}}", data, function (data) {
            $('#add-results').empty().append(data);
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


</script>
@endsection
