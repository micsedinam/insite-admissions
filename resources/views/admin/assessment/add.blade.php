@extends('layouts.admin')

@section('header')
    <h1 class="h3 mb-4 text-gray-800">Continuous Assessment</h1>
@endsection

@section('content')
@include('admin.department.edit')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="bg-info text-white card-header">Add Student Continuous Assessment</div>

            <div class="card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button class="nav-link active" id="single-tab" data-toggle="tab" data-target="#single" type="button" role="tab" aria-controls="single" aria-selected="true">Single</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="bulk-tab" data-toggle="tab" data-target="#bulk" type="button" role="tab" aria-controls="bulk" aria-selected="false">Bulk Upload</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="single" role="tabpanel" aria-labelledby="single-tab">
                        <form id="frm-create" action="{{route('ca.store')}}" method="POST">
                            {{ csrf_field() }}
                            <p id="message"></p>
                            <p style="color:green" id="success"></p>
        
                            <div class="form-group">
                                <label class="label-control">Index Number</label>
                                <input class="form-control" id="index_number" name="index_number" required>
                            </div>
        
                            <div class="form-group">
                                <label class="label-control">Course Code</label>
                                <input class="form-control" id="course_code" name="course_code" required>
                            </div>
        
                            <div class="form-group">
                                <label for="assessment_type">Select Assessment Type</label>
                                <select class="form-control" name="assessment_type" id="assessment_type" required>
                                    <option value="">Select Option</option>
                                    <option value="quiz1">Quiz One</option>
                                    <option value="quiz2">Quiz Two</option>
                                    <option value="assessment1">Assessment One</option>
                                    <option value="assessment2">Assessment Two</option>
                                    <option value="assessment3">Assessment Three</option>
                                </select>
                            </div>
                        
                            <div class="form-group">
                                <label class="label-control">Assessment Score</label>
                                <input class="form-control" id="assessment_score" name="assessment_score" required>
                            </div>
                            
                            
                            <p class="name_error_text"></p>
                            </label><br>
                            <button type="submit" class="btn btn-outline-secondary btn-block">Add Assessment</button>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="bulk" role="tabpanel" aria-labelledby="bulk-tab">
                        <form id="frm-create-result" action="{{route('ca.import')}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <p id="message"></p>
                            <p style="color:green" id="success"></p>
                        
                            <label class="label-control">Upload Continuous Assessment</label>
                            <input type="file" class="form-control" id="assessments" name="assessments">
                            
                            <p class="name_error_text"></p>
                            </label><br>
                            <button type="submit" class="btn btn-outline-secondary btn-block">Import Continuous Assessment</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div id="add-ca">

</div>

<script type="application/javascript">
    showAssessments();

    $('#frm-create-ca').on('submit', function (e) {
        e.preventDefault();
        var data = $(this).serialize();
        var url = $(this).attr('action');
        $.post(url, data,function (data) {
            showAssessments(data.id);
            console.log(data);
            swal('SUCCESS',
                'Assessment saved successfully',
                'success');
            $('#frm-create-ca').trigger('reset');
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

    function showAssessments()
    {
        var data = $('#frm-create-ca').serialize();
        console.log(data);
        $.get("{{route('ca.list')}}", data, function (data) {
            $('#add-ca').empty().append(data);
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
