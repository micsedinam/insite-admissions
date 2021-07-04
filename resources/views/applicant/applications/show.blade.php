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
                                    {{-- <p class="card-text">
                                        
                                    </p> --}}
                                    @if ($item->form_complete == "Yes" && $item->review_status !== NULL)
                                        @if ($item->review_status == "Approved")
                                            <p style="font-size: 12px;" class="text-center alert alert-success">Your Application is: <strong>{{$item->review_status}}</strong></p>
                                        @elseif ($item->review_status == "Pending")
                                            <p style="font-size: 12px;" class="text-center alert alert-info">Your Application is: <strong>{{$item->review_status}}</strong></p>
                                        @else
                                            <p style="font-size: 12px;" class="text-center alert alert-danger">Your Application is: <strong>{{$item->review_status}}</strong></p>
                                        @endif
                                    @elseif($item->form_complete == "Yes")
                                        <p style="font-size: 12px;" class="text-center alert alert-info">Your Application Status will be displayed, when review is done.</p>
                                    @else
                                        <a href="{{ url('user/applicant/'.$item->form_id) }}" class="btn btn-sm btn-primary btn-block">View & Edit</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
