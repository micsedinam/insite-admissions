@extends('layouts.admin')

@section('header')
    <h1 class="h3 mb-4 text-gray-800">Applications</h1>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10 offset-md-1">
            <div class="card border-left-primary mb-4">
                <div class="card-header">
                    <a class="btn pull-right btn-primary" href="{{ url('admin/status/change') }}"><i class="fa fa-angle-double-left"></i> Back</a>
                    <h5 class="text-uppercase text-center">Edit Application Status</h5>
                </div>
                <div class="card-body">
                    <form id="frm-update-status" method="POST" action="{{ url('admin/status/update/'.$review->id) }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <input type="hidden" id="form_id_edit" name="form_id" value="{{$review->form_id}}">
                        <input type="hidden" id="status_id_edit" name="status_id" value="{{$review->id}}">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="status">Application Status</label>
                                    <select id="status_name_edit" name="status" class="form-control" id="status" required>
                                        <option value="{{$review->status}}">Current Selection: {{$review->status}}</option>
                                        <option value="">Select Option</option>
                                        <option value="Pending">Pending</option>
                                        <option value="Approved">Approved</option>
                                        <option value="Rejected">Rejected</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-block btn-outline-primary mt-4 btn-update-status">Update Status</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
