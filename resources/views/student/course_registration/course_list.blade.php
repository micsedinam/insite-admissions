@extends('layouts.student')

@section('header')
    <h1 class="h3 mb-4 text-gray-800">Your Courses</h1>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10 offset-md-1 mb-4">
            <div class="card border-bottom-warning">
                <div class="card-body">
                    <div class="text-center">
                        <img class="mb-2" src="{{asset('img/insite-logo-black-text.png')}}" alt="">
                        {{-- <h2 class="text-primary">INSITE MEDIA COLLEGE</h2> --}}
                        <h3 class="text-primary">ACADEMIC AFFAIRS</h3>
                        <h6><i class="fa fa-archive"></i> P.O BOX MS 298, MILE 7 - ACCRA | <i class="fa fa-phone-square"></i> +233(0)540441833 / +233(0)302408701</h6>
                        <h6 class="text-dark"><i class="fa fa-envelope"></i> insitemediacollege@gmail.com</h6>
                        <h6 class="text-dark"><i class="fa fa-globe"></i> insitemediacollege.edu.gh</h6>
                        <div class="col-md-2 offset-md-8">
                            <h4 style="background-color: rgb(0, 123, 255); height: 30px; width: 200px; align: center; color: #fff;">DIPLOMA</h4>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-8">
                            <h5 class="text-dark">Name: {{$details->name}} </h5>
                        </div>
                        <div class="col-md-4">
                            <h5 class="text-dark">Index Number: {{$details->index_number}}</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <h5 class="text-dark">Academic Year: 2022/2023 </h5>
                        </div>
                        <div class="col-md-4">
                            <h5 class="text-dark">Level: {{$details->level}} </h5>
                        </div>
                        <div class="col-md-4">
                            <h5 class="text-dark">Semester: First</h5>
                        </div>
                    </div>
                    <h5 class="text-dark">Department: {{$details->dept_name}}</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <th>Course Code</th>
                                <th>Course Title</th>
                                <th>Credit Hours</th>
                            </thead>
                            <tbody>
                                @foreach ($get_courses as $course)
                                    <tr>
                                        <td>{{ $course->course_code }}</td>
                                        <td>{{ $course->course_title }}</td>
                                        <td>{{ $course->credit_hours }}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td><strong>Total Credit Hours:</strong></td>
                                    <td><strong>{{$total_credit_hours}}</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    @if(request("export")!=1)
                        <a class='btn btn-info' href='{{url("student/export/courses?export=1")}}'>Export PDF</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
