@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="alert alert-danger" role="alert">
                Be sure to select <strong>department</strong> and <strong>programme</strong> anytime you edit your applications. Else your updates won't go through.
            </div>
            <div class="card">
                <div class="card-header">My Applications</div>

                <div class="card-body">
                    <div class="row">
                        @if ($show == null)
                            <p>You have no applications to your name.<p>
                        @else
                            @foreach ($show as $item)
                            <div class="col-sm-3">
                                <div class="card">
                                    <img src="{{asset('image_uploads/'.$item->passport_photo)}}" style="height: 200px" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $item->lastname.' '.$item->firstname }}</h5>
                                        @if ($item->form_complete == "Yes")
                                            <label class="badge bg-success" for="completeness">Complete</label>
                                        @else
                                            <label class="badge bg-danger" for="completeness">Incomplete</label>
                                        @endif
                                        <p class="card-text">
                                            
                                        </p>
                                        @if ($item->form_complete == "Yes")
                                            <p style="font-size: 15px; font-weight: 600;" class="text-center btn btn-outline-info">Contact Admin for Application Status</p>
                                        @else
                                            <a href="{{ url('user/applicant/'.$item->form_id) }}" class="btn btn-sm btn-primary btn-block">View & Edit</a>
                                        @endif
                                        
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @endif
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
