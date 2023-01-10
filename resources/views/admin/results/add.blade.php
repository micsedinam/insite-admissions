@extends('layouts.admin')

@section('header')
    <h1 class="h3 mb-4 text-gray-800">Results</h1>
@endsection

@section('content')
@include('layouts.loader')
{{-- @include('admin.department.edit') --}}
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="bg-info text-white card-header">Add Semester Results</div>

            <div class="card-body">
                <form id="frm-create-result" class="form-horizontal" action="" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="course_code" class="label-control">Course Code</label>
                        <input type="text" class="form-control" name="course_code" id="course_code">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="dept" class="label-control">Department</label>
                                <select name="dept_id" id="dept_id_append" class="form-control custom-select">
                                    <option value="">Select Department</option>
                                    @foreach($dept as $key => $dept)
                                        <option value="{{$dept->id}}"}}>{{strtoupper($dept->dept_name)}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="index_number" class="label-control">Index Number</label>
                                <select name="index_number" id="index_number_append" class="form-control custom-select">
                                    <option value="">Select Department First</option>
                                    {{--  @foreach($division as $key =>$div)
                                        <option value="{{$div->division_id}}"}}>{{$div->name}}</option>
                                    @endforeach  --}}
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name" class="label-control">Level</label>
                                <select name="level" id="level" class="form-control">
                                    <option value="">Select Level</option>
                                    <option value="100">100</option>
                                    <option value="200">200</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name" class="label-control">Semseter</label>
                                <select name="semester" id="semester" class="form-control">
                                    <option value="">Select Semseter</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="first_quiz" class="label-control">First Quiz</label>
                                <input type="text" class="form-control" name="first_quiz" id="first_quiz">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="second_quiz" class="label-control">Second Quiz</label>
                                <input type="text" class="form-control" name="second_quiz" id="second_quiz">
                            </div>
                        </div>
                    </div>

                    <div class="loader"></div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="first_assessment" class="label-control">First Assessment</label>
                                <input type="text" class="form-control" name="first_assessment" id="first_assessment"> 
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="second_assessment" class="label-control">Second Assessment</label>
                                <input type="text" class="form-control" name="second_assessment" id="second_assessment">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="third_assessment" class="label-control">Third Assessment</label>
                                <input type="text" class="form-control" name="third_assessment" id="third_assessment">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="theory_exam" class="label-control">Exam (Theory)</label>
                                <input type="text" class="form-control" name="theory_exam" id="theory_exam">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="practical_exam" class="label-control">Exam (Practical)</label>
                                <input type="text" class="form-control" name="practical_exam" id="practical_exam">
                            </div>
                        </div>
                    </div>
                        
                    <div class="form-row">
                        <div class="col">
                            <button type="submit" class="btn btn-primary btn-block" id="add-result-clear"><i class="fas fa-plus-circle"></i> Add Student Results</button>
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-primary btn-block" id="add-result-copy"><i class="fas fa-plus-circle"></i> Add Student Results & Copy</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<br>
<div id="add-results">

</div>

<script type="application/javascript">
    $('.loader').hide()
    //showDistrictInfo();

    $("#frm-create-result #dept_id_append").on('change',function(e){
        var dept_id = $(this).val();
        var index_number = $('#index_number_append')
        $(index_number).empty();
        $(index_number).append("<option>Select Value</option>");
        $('.loader').show()
        $.get("{{route('show.index.numbers')}}",{dept_id:dept_id}, function(data){
            $('.loader').hide()
            $.each(data,function (i,profiles) {
                $(index_number).append($("<option/>", {
                    value : profiles.index_number,
                    text  : profiles.index_number.toUpperCase()
                }))
            })
        })
    });
    
    $('#add-result-clear').on('click', function (e) {
        $('.loader').show()
        e.preventDefault();
        var data = $('#frm-create-result').serialize();
        $.post("{{route('student.results.add')}}", data, function (data) {
            //showDistrictInfo(data.name);
            swal('SUCCESS',
                'Student Result Added successfully',
                'success');
            $('.loader').hide()
            $("#course_code").val('')
            $("#dept_id_append").val('').trigger('change')
            $("#index_number_append").val('').trigger('change')
            $("#level").val('').trigger('change')
            $("#semester").val('').trigger('change')
            $("#first_quiz").val('')
            $("#second_quiz").val('')
            $("#first_assessment").val('')
            $("#second_assessment").val('')
            $("#third_assessment").val('')
            $("#theory_exam").val('')
            $("#practical_exam").val('')
        }).fail(function (data,status,error) {
            console.log(data);
            var response = $.parseJSON(data.responseText)
            $('.loader').hide()
            $.each(response.errors, function(key, value){
                swal({
                    title: "ooops!",
                    text: value,
                    icon: "error",
                    color: "#FEFAE3",
                    button: "OK",
                });
            });
        });

    });

    $('#add-result-copy').on('click', function (e) {
        $('.loader').show()
        e.preventDefault();
        var data = $('#frm-create-result').serialize();
        $.post("{{route('student.results.add')}}", data, function (data) {
            //showDistrictInfo(data.name);
            swal('SUCCESS',
                'Student Result Added successfully',
                'success');
            $('.loader').hide()
            $("#course_code").val('')
            $("#first_quiz").val('')
            $("#second_quiz").val('')
            $("#first_assessment").val('')
            $("#second_assessment").val('')
            $("#third_assessment").val('')
            $("#theory_exam").val('')
            $("#practical_exam").val('')
        }).fail(function (data,status,error) {
            console.log(data);
            var response = $.parseJSON(data.responseText)
            $('.loader').hide()
            $.each(response.errors, function(key, value){
                swal({
                    title: "ooops!",
                    text: value,
                    icon: "error",
                    color: "#FEFAE3",
                    button: "OK",
                });

            });


        });

    });

    /*
    function showDistrictInfo()
    {
        var data = $('#frm-create-district').serialize();
        console.log(data);
        $.get("", data, function (data) {
            $('#add-district').empty().append(data);
        });
    }
    $(document).on('click', '.edit-district', function (e) {
        $('#show-district').modal('show');
        var id = $(this).val();
        $.get("", {district_id:id}, function (data) {
            console.log(data)
            $('#district_id_edit').val(data.district_id);
            $('#dis_name_edit').val(data.name);
            $('#division_id_edit').val(data.division_id);
            $('#region_id_edit').val(data.region_id);
        });
    });
    $('.btn-update-district').on('click', function (e) {
        e.preventDefault();
        var data = $('#frm-update-district').serialize();
        $.post("", data, function (data) {
            showDistrictInfo(data.name);
            $('#show-district').modal('hide');
            swal('SUCCESS',
                'District updated successfully',
                'success');
        }).fail(function (data,status,error) {
            console.log(data);
            var response = $.parseJSON(data.responseText)
            $.each(response.errors, function(key, value){
                swal({
                    title: "ooops!",
                    text: value,
                    icon: "error",
                    color: "#FEFAE3",
                    button: "OK",
                });

            });


        });

    });*/
    // $(".select2").select2();


</script>
@endsection
