@extends('layouts.student')

@section('header')
    <h1 class="h3 mb-4 text-gray-800">My Results</h1>
@endsection

@section('content')
{{-- @include('admin.programmes.edit') --}}
<div class="row justify-content-center">
    <div class="col-md-10">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card">
            <div class="bg-warning text-white card-header">Check Results</div>

            <div class="card-body">
                <form id="frm-check-results" action="{{route('results.check')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <input type="hidden" name="user_id" value="{{Auth::id()}}">

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label class="control-label" for="level">Level</label>
                            <select class="form-control" type="text" name="level" id="level" required>
                                <option value="">Select Level</option>
                                <option value="100">100</option>
                                <option value="200">200</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="control-label" for="semester">Semester</label>
                            <select class="form-control" type="text" name="semester" id="semester" required>
                                <option value="">Select Semester</option>
                                <option value="1">First</option>
                                <option value="2">Second</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 offset-md-3">
                        <button type="submit" class="btn btn-secondary btn-block">Check Results</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<br>
<div id="add-prog">

</div>
@endsection
@section('script')
    <script type="application/javascript">
        //showProgrammes();

        // $("#frm-update-profile #department_id_append").on('change',function(e){
        //     var dept_id = $(this).val();
        //     var programme = $('#programme_id_append')
        //     $(programme).empty();
        //     $(programme).append("<option value=''>Select Value</option>");
        //     $.get("{{route('student.programme')}}",{dept_id:dept_id}, function(data){
        //         $.each(data,function (i,programmes) {
        //             $(programme).append($("<option/>",{
        //                 value : programmes.id,
        //                 text  : programmes.prog_name
        //             }))
        //         })
        //     })
        // })

        // $('#frm-update').on('submit', function (e) {
        //     e.preventDefault();
        //     var data = $(this).serialize();
        //     var url = $(this).attr('action');
        //     $.post(url, data,function (data) {
        //         //showProgrammes(data.id);
        //         console.log(data);
        //         swal('SUCCESS',
        //             'Profile saved successfully',
        //             'success');
        //         $('#frm-update-profile').trigger('reset');
        //         window.location.href = "/student/edit/profile";
        //     }).fail(function (data,status,error) {
        //         console.log(data);
        //         var response = $.parseJSON(data.responseText)
        //         var possible_keys = Object.keys(response.errors);
        //         possible_keys.forEach((key)=>{
        //             $.each(response.errors[key], function(key, value){
        //                 swal({
        //                     title: "Ooops!",
        //                     text: value,
        //                     icon: "error",
        //                     color: "#FEFAE3",
        //                     button: "OK",
        //                 });
        //             });
        //         });
        //     });
        // });

        // function showProgrammes()
        // {
        //     var data = $('#show-pro').serialize();
        //     console.log(data);
        //     $.get("{{route('programme.list')}}", data, function (data) {
        //         $('#add-prog').empty().append(data);
        //     });
        // }

        // $(document).on('click', '.edit-prog', function (e) {
        //     $('#').modal('show');
        //     var id = $(this).val();
        //     $.get("{{route('programme.edit')}}", {id:id}, function (data) {
        //         console.log(data)
        //         $('#prog_id_edit').val(data.id);
        //         $('#dept_id_edit').val(data.dept_id);
        //         $('#prog_name_edit').val(data.prog_name);
        //     });
        // });

        /* $('.btn-update-prog').on('click', function (e) {
            e.preventDefault();
            var data = $('#frm-update-prog').serialize();
            $.post("{{route('programme.update')}}", data, function (data) {
                showProgrammes(data.prog_name);
                $('#show-prog').modal('hide');
                swal('SUCCESS',
                    'Programme updated successfully',
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
