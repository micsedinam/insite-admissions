@extends('layouts.admin')

@section('header')
    <h1 class="h3 mb-4 text-gray-800">Applications</h1>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card border-left-primary">
                <div class="card-body">
                    <div class="row">
                        @foreach ($show as $item)
                        <div class="col-sm-3">
                            <div class="card">
                                <img src="{{asset('image_uploads/'.$item->passport_photo)}}" style="height: 200px" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5>
                                        <a class="nounderline" href="{{ url('admin/applications/view/'.$item->form_id) }}">
                                            {{$item->firstname. ' ' .$item->lastname}}
                                        </a>
                                    </h5>
                                    {{-- <label class="badge bg-info" for="status">Current Status: </label> --}}
                                    <p class="text-muted font-weight-light text-sm" style="font-size: 10px" >Submitted by: {{$item->name}}</p>
                                    <a href="{{ url('admin/applications/view/'.$item->form_id) }}" class="btn btn-sm btn-primary btn-block">Review Application</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
