@extends('layouts.admin')

@section('header')
    <h1 class="h3 mb-4 text-gray-800">Results</h1>
@endsection

@section('content')
@include('admin.results.edit')
@include('layouts.loader')
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
    $('.loader').hide()

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

    $(document).on('click', '.edit-result', function (e) {
            $('#show-result').modal('show');
            var id = $(this).val();
            $.get("{{route('student.results.edit')}}", {id:id}, function (data) {
                console.log(data)
                $('#result_id_edit').val(data.id);
                $('#dept_id_edit').val(data.dept_id);
                $('#course_code_edit').val(data.course_code);
                $('#level_edit').val(data.level);
                $('#semester_edit').val(data.semester);
                $('#index_number_edit').val(data.index_number);
                $('#first_quiz_edit').val(data.first_quiz);
                $('#second_quiz_edit').val(data.second_quiz);
                $('#first_assessment_edit').val(data.first_assessment);
                $('#second_assessment_edit').val(data.second_assessment);
                $('#third_assessment_edit').val(data.third_assessment);
                $('#theory_exam_edit').val(data.theory_exam);
                $('#practical_exam_edit').val(data.practical_exam);
            });
        });

        $('.btn-update-result').on('click', function (e) {
            e.preventDefault();
            var data = $('#frm-update-result').serialize();
            $.post("{{route('student.results.update')}}", data, function (data) {
                showResults(data.index_number);
                $('#show-result').modal('hide');
                swal('SUCCESS',
                    'Student Result updated successfully',
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
        });

        $(document).on('click', '.del-result', function (e) {
            var id = $(this).val();
            var validate = confirm("Are you sure you want to delete this result entry?");
            if (validate === true) {
                $.post("{{route('student.results.delete')}}", {id: id}, function (data) {
                    showResults(data.index_number);
                    swal(
                        'Deleted',
                        'Selected result has been deleted successfully',
                        'success'
                    );
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
            }else{swal('Cancelled',"Result entry not deleted");}
        })


</script>
@endsection
