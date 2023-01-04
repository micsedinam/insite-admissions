@extends('layouts.admin')

@section('header')
    <h1 class="h3 mb-4 text-gray-800">Continuous Assessment</h1>
@endsection

@section('content')
@include('admin.assessment.edit')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="bg-info text-white card-header">Add Student Continuous Assessment</div>

            <div class="card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button class="nav-link active" id="single-tab" data-toggle="tab" data-target="#single" type="button" role="tab" aria-controls="single" aria-selected="true">Single Entry</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="bulk-tab" data-toggle="tab" data-target="#bulk" type="button" role="tab" aria-controls="bulk" aria-selected="false">Bulk Upload</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="single" role="tabpanel" aria-labelledby="single-tab">
                        <form id="frm-create-ca" action="{{route('ca.store')}}" method="POST">
                            {{ csrf_field() }}
                            <p id="message"></p>
                            <p style="color:green" id="success"></p>
        
                            <div class="form-group">
                                <label class="label-control">Index Number</label>
                                <input class="form-control" id="index_number" name="index_number">
                            </div>
        
                            <div class="form-group">
                                <label class="label-control">Course Code</label>
                                <input class="form-control" id="course_code" name="course_code">
                            </div>
        
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="label-control">Quiz One</label>
                                        <input class="form-control" id="quiz1" name="quiz1">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="label-control">Quiz Two</label>
                                        <input class="form-control" id="quiz2" name="quiz2">
                                    </div>
                                </div> 
                            </div>
        
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="label-control">Assessment One</label>
                                        <input class="form-control" id="assessment1" name="assessment1">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="label-control">Assessment Two</label>
                                        <input class="form-control" id="assessment2" name="assessment2">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="label-control">Assessment Three</label>
                                        <input class="form-control" id="assessment3" name="assessment3">
                                    </div>
                                </div> 
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
            swal({
                title: "Good job!",
                text: "Assessment saved successfully!",
                icon: "success",
            });
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
        //console.log(data);
        $.get("{{route('ca.list')}}", data, function (data) {
            $('#add-ca').empty().append(data);
        });
    }

    $(document).on('click', '.edit-ca', function (e) {
        $('#show-assessment').modal('show');
        var id = $(this).val();
        $.get("{{route('ca.edit')}}", {id:id}, function (data) {
            //console.log(data)
            $('#ca_id_edit').val(data.id);
            $('#index_number_edit').val(data.index_number);
            $('#course_code_edit').val(data.course_code);
            $('#quiz1_edit').val(data.quiz1);
            $('#quiz2_edit').val(data.quiz2);
            $('#assessment1_edit').val(data.assessment1);
            $('#assessment2_edit').val(data.assessment2);
            $('#assessment3_edit').val(data.assessment3);
        });
    });

    $('.btn-update-ca').on('click', function (e) {
        e.preventDefault();
        var data = $('#frm-update-ca').serialize();
        $.post("{{route('ca.update')}}", data, function (data) {
            showAssessments(data.index_number);
            $('#show-assessment').modal('hide');
            swal({
                title: "Good job!",
                text: "Assessment updated successfully!",
                icon: "success",
            });
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
