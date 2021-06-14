@extends('layouts.admin')

@section('header')
    <h1 class="h3 mb-4 text-gray-800">Review Application</h1>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card mb-4 border-bottom-primary">
                <div class="card-body">
                    <div class="col-md-10 offset-md-1">
                        <div class="row align-items-center">
                            <img class="col-md-4 h-25 w-25" src="{{asset('image_uploads/'.$forms->passport_photo)}}" alt="Passport Photo of {{$forms->lastname}}">
                            <div class="col-md-8">
                                <h3 class="text-info"><strong>{{$forms->firstname." ".$forms->lastname." ".$forms->othername}}</strong></h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for=""><small>Address:</small></label>
                                        <p><strong>{{$forms->post_address}}</strong></p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for=""><small>Email:</small></label>
                                        <p><strong>{{$forms->email}}</strong></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for=""><small>Phone:</small></label>
                                        <p><strong>{{$forms->phone}}</strong></p>
                                    </div>
                                    <div class="col-md-3">
                                        <label for=""><small>Country:</small></label>
                                        <p><strong>{{$forms->country}}</strong></p>
                                    </div>
                                    <div class="col-md-5">
                                        <label for=""><small>Nationality:</small></label>
                                        <p><strong>{{$forms->nationality}}</strong></p>   
                                    </div>
                                </div>
                                <h5 class="badge bg-primary text-white">Date of Birth: {{$forms->dob}}</h5>
                                <h5 class="badge bg-primary text-white">Gender: {{$forms->gender}}</h5>
                                <h5 class="badge bg-primary text-white">Marital Status: {{$forms->marital_status}}</h5>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <label for=""><small>Residence:</small></label>
                                <p><strong>{{$forms->residence}}</strong></p>
                            </div>
                            <div class="col-md-6">
                                <label for=""><small>Number of Children:</small></label>
                                <p><strong>{{$forms->children}}</strong></p>
                            </div>
                            <div class="col-md-6">
                                <label for=""><small>Any Physical Challenge?:</small></label>
                                <p><strong>{{$forms->physical_challenge}} </strong></p>
                            </div>
                            <div class="col-md-6">
                                <label for=""><small>Challenge Details:</small></label>
                                <p><strong>{{$forms->challenge}}</strong></p>
                            </div>
                        </div>
                        <hr>
                    </div>

                    <div class="col-md-10 offset-md-1">
                        <h3 class="text-primary">Programme Information</h3>

                        <div class="row mt-2">
                            <div class="col-md-6">
                                <label for=""><small>Department of Choice:</small></label>
                                <p><strong>{{$view->dept_name}}</strong></p>
                            </div>
                            <div class="col-md-6">
                                <label for=""><small>Programme of Choice:</small></label>
                                <p><strong>{{$view->prog_name}}</strong></p>
                            </div>
                            <div class="col-md-6">
                                <label for=""><small>Instructional Language:</small></label>
                                <p><strong>{{$forms->instruction_language}}</strong></p>
                            </div>
                            <div class="col-md-6">
                                <label for=""><small>Programme Duration:</small></label>
                                <p><strong>{{$forms->duration}}</strong></p>
                            </div>
                            <div class="col-md-6">
                                <label for=""><small>Hostel Accommodation:</small></label>
                                <p><strong>{{$forms->hostel}} </strong></p>
                            </div>
                            <div class="col-md-6">
                                <label for=""><small>Lecture Periods:</small></label>
                                <p><strong>{{$forms->lecture_period}}</strong></p>
                            </div>
                            <div class="col-md-12">
                                <label for=""><small>Reasons for Choosing Programme:</small></label>
                                <p>{{$forms->prog_choice}} </p>
                            </div>
                        </div>
                        <hr>
                    </div>

                    <div class="col-md-10 offset-md-1">
                        <h3 class="text-primary">Previous Education Information</h3>

                        <div class="row mt-2">
                            <div class="col-md-6">
                                <label for=""><small>Name of Institution:</small></label>
                                <p><strong>{{$forms->school_attended}}</strong></p>
                            </div>
                            <div class="col-md-3">
                                <label for=""><small>Year Admitted: </small></label>
                                <p><strong>{{$forms->year_started}}</strong></p>
                            </div>
                            <div class="col-md-3">
                                <label for=""><small>Year Completed: </small></label>
                                <p><strong>{{$forms->year_completed}}</strong></p>
                            </div>
                            <div class="col-md-6">
                                <label for=""><small>Name of Certificate Acquired:</small></label>
                                <p><strong>{{$forms->certificate_name}}</strong></p>
                            </div>
                            <div class="col-md-6">
                                <a class="btn btn-sm btn-outline-success" href="{{asset('document_uploads/'.$forms->certificate_upload)}}" target="_blank" rel="noopener noreferrer">View Certificate</a>
                            </div>
                        </div>
                        <hr>
                    </div>

                    <div class="col-md-10 offset-md-1">
                        <h3 class="text-primary">Referees</h3>

                        <div class="row mt-2">
                            <div class="col-md-6">
                                <h6 class="text-warning">1st Referee Details</h6>
                            </div>
                            <div class="col-md-6">
                                <h6 class="text-warning">2nd Referee Details</h6>
                            </div>
                            <div class="col-md-6">
                                <label for=""><small>Name:</small></label>
                                <p><strong>{{$forms->one_referee_name}}</strong></p>
                            </div>
                            <div class="col-md-6">
                                <label for=""><small>Name:</small></label>
                                <p><strong>{{$forms->two_referee_name}}</strong></p>
                            </div>
                            <div class="col-md-6">
                                <label for=""><small>Email:</small></label>
                                <p><strong>{{$forms->one_referee_email}} </strong></p>
                            </div>
                            <div class="col-md-6">
                                <label for=""><small>Email: </small></label>
                                <p><strong>{{$forms->two_referee_email}}</strong></p>
                            </div>
                            <div class="col-md-6">
                                <label for=""><small>Phone:</small></label>
                                <p><strong>{{$forms->one_referee_phone}}</strong></p>
                            </div>
                            <div class="col-md-6">
                                <label for=""><small>Phone:</small></label>
                                <p><strong>{{$forms->two_referee_phone}}</strong></p>
                            </div>
                            <div class="col-md-6">
                                <label for=""><small>Occupation:</small></label>
                                <p><strong>{{$forms->one_referee_occupation}}</strong></p>
                            </div>
                            <div class="col-md-6">
                                <label for=""><small>Occupation:</small></label>
                                <p><strong>{{$forms->two_referee_occupation}} </strong></p>
                            </div>
                            <div class="col-md-6">
                                <label for=""><small>Address:</small></label>
                                <p><strong>{{$forms->one_referee_address}}</strong></p>
                            </div>
                            <div class="col-md-6">
                                <label for=""><small>Address:</small></label>
                                <p><strong>{{$forms->two_referee_address}}</strong></p>
                            </div>
                        </div>
                        <hr>
                    </div>

                    <div class="col-md-8 offset-md-2">
                        <form id="frm-create-status" action="{{route('admin.applications.store')}}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="form_id" value="{{ $forms->form_id }}">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status">Application Status</label>
                                        <select name="status" class="form-control" id="status">
                                            <option value="">Select Option</option>
                                            <option value="Pending">Pending</option>
                                            <option value="Approved">Approved</option>
                                            <option value="Rejected">Rejected</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-outline-primary mt-4">Change Status</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="application/javascript">
        $('#frm-create-status').on('submit', function (e) {
            e.preventDefault();
            var data = $(this).serialize();
            var url = $(this).attr('action');
            $.post(url, data,function (data) {
                //showTDInfo(data.region_id);
                console.log(data);
                swal('SUCCESS',
                    'Application status saved successfully',
                    'success');
                $('#frm-create-status').trigger('reset');
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
                // $.each(response.errors.form_id, function(key, value){
                //     //console.log(key, value);
                //     swal({
                //         title: "Ooops!",
                //         text: value,
                //         icon: "error",
                //         color: "#FEFAE3",
                //         button: "OK",
                //     });
                // });
                // console.log(response);
                // response['errors']['form_id'].forEach(element => {
                //     console.log(element);
                // });
            });
        });
    </script>
@endsection

