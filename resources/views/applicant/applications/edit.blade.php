@extends('layouts.form')

@section('content')

<!--   Big container   -->
<div class="container">
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">

            <!--      Wizard container        -->
            <div class="wizard-container">

                <div class="card wizard-card" data-color="orange" id="wizardProfile">
                    <form id="frm-apply-update" action="{{route('form.update')}}/{{$forms->form_id}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @method('PATCH')
                <!--        You can switch " data-color="orange" "  with one of the next bright colors: "blue", "green", "orange", "red", "azure"          -->

                        <div class="wizard-header text-center">
                            <h3 class="wizard-title">Create your profile</h3>
                            <p class="category">This information will let us know more about you.</p>
                        </div>

                        <div class="wizard-navigation">
                            <div class="progress-with-circle">
                                 <div class="progress-bar" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="4" style="width: 21%;"></div>
                            </div>
                            <ul>
                                <li>
                                    <a href="#about" data-toggle="tab">
                                        <div class="icon-circle">
                                            <i class="ti-user"></i>
                                        </div>
                                        About
                                    </a>
                                </li>
                                <li>
                                    <a href="#prog" data-toggle="tab">
                                        <div class="icon-circle">
                                            <i class="ti-book"></i>
                                        </div>
                                        Prog. and Dept.
                                    </a>
                                </li>
                                <li>
                                    <a href="#institution" data-toggle="tab">
                                        <div class="icon-circle">
                                            <i class="ti-home"></i>
                                        </div>
                                        Institution
                                    </a>
                                </li>
                                <li>
                                    <a href="#referees" data-toggle="tab">
                                        <div class="icon-circle">
                                            <i class="ti-pencil-alt"></i>
                                        </div>
                                        Referees
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane" id="about">
                                <div class="row">
                                    <h5 class="info-text"> Please tell us more about yourself.</h5>
                                    <div class="col-sm-5 col-sm-offset-1">
                                        <div class="picture-container">
                                            <div class="picture form-group">
                                                <img src="{{asset('image_uploads/'.$forms->passport_photo)}}" class="picture-src" id="wizardPicturePreview" title="" />
                                                <input type="file" id="passport_photo" name="passport_photo" required>
                                            </div>
                                            <h6>Upload Passport Picture</h6>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>First Name <small>(required)</small></label>
                                            <input class="form-control" type="text" id="firstname" name="firstname" value="{{ $forms->firstname }}"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Last Name <small>(required)</small></label>
                                            <input class="form-control" type="text" id="lastname" name="lastname" value=" {{ $forms->lastname }}"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label" for="othername">Other Names</label>
                                            <input class="form-control" type="text" id="othername" name="othername" value="{{ $forms->othername }}"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label" for="phone">Phone Number <small>(required)</small></label>
                                            <input class="form-control" type="number" id="phone" name="phone" value="{{ $forms->phone}}"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Email <small>(required)</small></label>
                                            <input name="email" type="email" class="form-control" id="email" value="{{ $forms->email}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="input-group">
                                            <div class="form-group">
                                                <label class="control-label" for="dob">Date of Birth</label>
                                                <input class="form-control" type="date" id="dob" name="dob" value="{{ $forms->dob}}"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="input-group">
                                            <div class="form-group">
                                                <label class="control-label" for="gender">Gender: </label>
                                                <input type="radio" class="choice" name="gender" id="gender" value="Male">
                                                <span>Male</span>
                                                <input type="radio" class="choice" name="gender" id="gender" value="Female">
                                                <span>Female</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="input-group">
                                            <div class="form-group">
                                                <label class="control-label" for="country">Country</label>
                                                <select class="selectpicker countrypicker form-control" data-live-search="true" data-flag="true" name="country" id="country" ></select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="control-label" for="post_address">Post Address</label>
                                            <input class="form-control" type="text" id="post_address" name="post_address" value="{{ $forms->post_address}}"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label" for="nationality">Nationality</label>
                                            <input class="form-control" type="text" id="nationality" name="nationality" value="{{$forms->nationality}}"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label" for="residence">Place of Residence</label>
                                            <input class="form-control" type="text" id="residence" name="residence" value="{{$forms->residence}}"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="control-label" for="marital_status">Marital Status <small>(Click to select)</small></label>
                                            <select class="form-control" name="marital_status" id="marital_status" >
                                                <option value="{{$forms->marital_status}}">You selected: {{$forms->marital_status}}</option>
                                                <option value="Single">Single</option>
                                                <option value="Married">Married</option>
                                                <option value="Separated">Separated</option>
                                                <option value="Divorced">Divorced</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label class="control-label" for="children">Number of Children</label>
                                            <input class="form-control" type="number" id="children" name="children" value="{{$forms->children}}"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label class="control-label" for="physical_challenge">Any Physical Challenge?: </label>
                                            <input type="radio" class="choice" name="physical_challenge" id="physical_challenge" value="Yes">
                                            <span>Yes</span>
                                            <input type="radio" class="choice" name="physical_challenge" id="physical_challenge" value="No">
                                            <span>No</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="control-label" for="challenge">If yes, kindly describe</label>
                                            <input class="form-control" type="text" id="challenge" name="challenge" value="{{$forms->challenge}}"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="prog">
                                <h5 class="info-text"> This section tells us about your Programme and Department </h5>
                                
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label" for="dept_id">Department <small>(Click here to select)</small></label>
                                            <select class="form-control" name="dept_id" id="department_id_append_update" >
                                                {{-- <option value="{{ $updates->dept_name }}">You selected {{ $updates->dept_name }}</option> --}}
                                                <option value="">Select Department</option>
                                                @foreach ($department as $d)
                                                    <option value="{{ $d->id }}"> {{ $d->dept_name }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label" for="prog_id">Programme <small>(Click here to select)</small></label>
                                            <select class="form-control" name="prog_id" id="programme_id_append_update" >
                                                <option value="">Select Department First</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label" for="duration">Duration of Programme <small>(Click here to select)</small></label>
                                            <select class="form-control" name="duration" id="duration" >
                                                <option value="{{$forms->duration}}">You selected: {{$forms->duration}}</option>
                                                <option value="">Select Duration</option>
                                                <option value="Diploma">2 year Diploma</option>
                                                <option value="Certificate">1 year Certificate</option>
                                                <option value="Proficiency">Proficiency</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label" for="hostel">Would you like to stay in a Hostel <small>(Click here to select)</small></label>
                                            <select class="form-control" name="hostel" id="hostel" >
                                                <option value="{{$forms->hostel}}">You selected: {{$forms->hostel}}</option>
                                                <option value="">Select Option</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="control-label" for="prog_choice">Why would you want to study programme of choice?</label>
                                            <textarea class="form-control" name="prog_choice" id="prog_choice" cols="30" rows="3">{{$forms->prog_choice}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label" for="instruction_language">Language of Instruction <small>(Click here to select)</small></label>
                                            <select class="form-control" name="instruction_language" id="instruction_language" >
                                                <option value="{{$forms->instruction_language}}">You selected: {{$forms->instruction_language}}</option>
                                                <option value="">Select Language</option>
                                                <option value="Akan">Akan</option>
                                                <option value="English">English</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label" for="lecture_period">Lecture Periods <small>(Click here to select)</small></label>
                                            <select class="form-control" name="lecture_period" id="lecture_period" >
                                                <option value="{{$forms->lecture_period}}">You selected: {{$forms->lecture_period}}</option>
                                                <option value="">Select Period</option>
                                                <option value="Weekday">Weekday</option>
                                                <option value="Weekend">Weekend</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="institution">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h3 class="info-text"> How about you tell us about your previous education </h3>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label" for="school_attended">Name of Institution Attended</label>
                                            <input class="form-control" type="text" name="school_attended" id="school_attended" value="{{$forms->school_attended}}"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label" for="year_started">Year Started</label>
                                            <input class="form-control" type="text" name="year_started" id="year_started" value="{{$forms->year_started}}"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label" for="year_completed">Year Completed</label>
                                            <input class="form-control" type="text" name="year_completed" id="year_completed" value="{{$forms->year_completed}}"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label" for="certificate_name">Name of Certificate to be Attached</label>
                                            <input class="form-control" type="text" name="certificate_name" id="certificate_name" value="{{$forms->certificate_name}}"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="control-label" for="certificate_upload">Upload Certificate</label>
                                            <input type="file" class="form-control" name="certificate_upload" id="certificate_upload" value="{{$forms->certificate_upload}}" />
                                            <a href="{{asset('document_uploads/'.$forms->certificate_upload)}}" style="color: white" target="_blank">Find your uploaded here</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="referees">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h3 class="info-text"> Tell us about your referees </h3>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label" for="one_referee_name">1st Referee Name</label>
                                            <input class="form-control" type="text" name="one_referee_name" id="one_referee_name" value="{{$forms->one_referee_name}}"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label" for="one_referee_phone">1st Referee Phone</label>
                                            <input class="form-control" type="number" name="one_referee_phone" id="one_referee_phone" value="{{$forms->one_referee_phone}}"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label" for="one_referee_email">1st Referee Email</label>
                                            <input class="form-control" type="text" name="one_referee_email" id="one_referee_email" value="{{$forms->one_referee_email}}"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label" for="one_referee_occupation">1st Referee Occupation</label>
                                            <input class="form-control" type="text" name="one_referee_occupation" id="one_referee_occupation" value="{{$forms->one_referee_occupation}}"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="control-label" for="one_referee_address">1st Referee Address</label>
                                            <input class="form-control" type="text" name="one_referee_address" id="one_referee_address" value="{{$forms->one_referee_address}}"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label" for="two_referee_name">2nd Referee Name</label>
                                            <input class="form-control" type="text" name="two_referee_name" id="two_referee_name" value="{{$forms->two_referee_name}}"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label" for="two_referee_phone">2nd Referee Phone</label>
                                            <input class="form-control" type="number" name="two_referee_phone" id="two_referee_phone" value="{{$forms->two_referee_phone}}"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label" for="two_referee_email">2nd Referee Email</label>
                                            <input class="form-control" type="text" name="two_referee_email" id="two_referee_email" value="{{$forms->two_referee_email}}"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label" for="two_referee_occupation">2nd Referee Occupation</label>
                                            <input class="form-control" type="text" name="two_referee_occupation" id="two_referee_occupation" value="{{$forms->two_referee_occupation}}"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="control-label" for="two_referee_address">2nd Referee Address</label>
                                            <input class="form-control" type="text" name="two_referee_address" id="two_referee_address" value="{{$forms->two_referee_address}}"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="wizard-footer">
                            <div class="pull-right">
                                <input type='button' class='btn btn-next btn-fill btn-warning btn-wd' name='next' value='Next' />
                                <input type='submit' class='btn btn-finish btn-fill btn-warning btn-wd' name='finish' value='Finish' />
                            </div>

                            <div class="pull-left">
                                <input type='button' class='btn btn-previous btn-default btn-wd' name='previous' value='Previous' />
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
            </div> <!-- wizard container -->
        </div>
    </div><!-- end row -->
</div> <!--  big container -->
    
@endsection

@section('script')
    <script type="application/javascript">
        $("#frm-apply-update #department_id_append_update").on('change',function(e){
            var dept_id = $(this).val();
            var programme = $('#programme_id_append_update')
            $(programme).empty();
            $(programme).append("<option value=''>Select Value</option>");
            $.get("{{route('showProgrammes')}}",{dept_id:dept_id}, function(data){
                $.each(data,function (i,programmes) {
                    $(programme).append($("<option/>",{
                        value : programmes.id,
                        text  : programmes.prog_name
                    }))
                })
            })

        })
    </script> 
@endsection