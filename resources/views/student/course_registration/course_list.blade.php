@extends('layouts.student')

@section('header')
    <h1 class="h3 mb-4 text-gray-800">Your Courses</h1>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10 offset-md-1 mb-4">
            <div class="card border-bottom-warning">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="text-center">
                                <img class="mb-2" src="{{asset('img/insite-logo-black-text.png')}}" alt="IMC Logo">
                                {{-- <h2 class="text-primary">INSITE MEDIA COLLEGE</h2> --}}
                                <h3 class="text-primary">ACADEMIC AFFAIRS</h3>
                                <h6><i class="fa fa-archive"></i> P.O BOX MS 298, MILE 7 - ACCRA | <i class="fa fa-phone-square"></i> +233(0)540441833 / +233(0)302408701</h6>
                                <h6 class="text-dark"><i class="fa fa-envelope"></i> insitemediacollege@gmail.com</h6>
                                <h6 class="text-dark"><i class="fa fa-globe"></i> insitemediacollege.edu.gh</h6>
                            </div> 
                        </div>
                        <div class="col-md-4">
                            <img class="mb-2" src="{{asset('image_uploads/'.$details->profile_photo)}}" width="200px" height="200px" alt="IMC Logo">
                        </div>
                    </div>
                    
                    <div class="text-center">
                        <div class="col-md-2 offset-md-8">
                            <h4 style="background-color: rgb(0, 123, 255); height: 30px; width: 200px; align: center; color: #fff;">DIPLOMA</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <h5 class="text-dark"><strong>Name:</strong> {{$details->name}} </h5>
                        </div>
                        <div class="col-md-4">
                            <h5 class="text-dark"><strong>Index Number:</strong> {{$details->index_number}}</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <h5 class="text-dark"><strong>Academic Year:</strong> 2022/2023 </h5>
                        </div>
                        <div class="col-md-4">
                            <h5 class="text-dark"><strong>Level:</strong> {{$details->level}} </h5>
                        </div>
                        <div class="col-md-4">
                            @if ( $details->semester == 1)
                                <h5 class="text-dark"><strong>Semester:</strong> First</h5>
                            @else
                                <h5 class="text-dark"><strong>Semester:</strong> Second</h5>
                            @endif
                        </div>
                    </div>
                    <h5 class="text-dark mb-4"><strong>Department:</strong> {{$details->dept_name}}</h5>
                    <div class="table-responsive">
                        <form id="frm-reg-courses" action="{{route('register.courses')}}" method="post">
                            {{@csrf_field()}}
                            <input type="hidden" name="user_id" id="user_id" value="{{Auth::id()}}">
                            <input type="hidden" name="index_number" id="index_number" value="{{$details->index_number}}">
                            <input type="hidden" name="level" id="level" value="{{$details->level}}">
                            <input type="hidden" name="semester" id="semester" value="{{$details->semester}}">
                            <label class="text-danger" for="checkbox">Please check all boxes to be able to register courses.</label>
                            <table class="table table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <th></th>
                                    <th>Course Code</th>
                                    <th>Course Title</th>
                                    <th>Credit Hours</th>
                                </thead>
                                <tbody>
                                    @foreach ($get_courses as $course)
                                        <tr>
                                            <td><input type="checkbox" name="course_code[]" id="{{ $loop->iteration }}" value="{{ $course->course_code }}" required></td>
                                            <td>{{ $course->course_code }}</td>
                                            <td>{{ $course->course_title }}</td>
                                            <td>{{ $course->credit_hours }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td><strong>Total Credit Hours:</strong></td>
                                        <td><strong>{{$total_credit_hours}}</strong></td>
                                    </tr>
                                </tbody>
                            </table>
                            <button class="btn btn-block btn-success col-md-6 offset-md-3" type="submit">Register Courses</button>
                        </form>
                    </div>
                    {{-- @if(request("export")!=1)
                        <a class='btn btn-info' href='{{url("student/export/courses?export=1")}}'>Export PDF</a>
                    @endif --}}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="application/javascript">
        //showProgrammes();

        $('#frm-reg-courses').on('submit', function (e) {
            e.preventDefault();
            var data = $(this).serialize();
            var url = $(this).attr('action');
            $.post(url, data,function (data) {
                //showProgrammes(data.id);
                console.log(data);
                swal('SUCCESS',
                    'Your courses have been registered.',
                    'success');
                $('#frm-reg-courses').trigger('reset');
                window.location.href = "/student/home";
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