@extends('layouts.student')

@section('header')
    <h1 class="h3 mb-4 text-gray-800">Your Courses</h1>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card border-bottom-primary">
                <div class="card-body">
                    <form  id="frm-register-courses"  class="form-horizontal" action="{{ route('register.my.courses') }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" id="" name="user_id" value="{{Auth::id()}}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="level">Level</label>
                                    <select class="form-control" name="level" id="">
                                        <option value="">Choose</option>
                                        <option value="100">100</option>
                                        <option value="200">200</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="semester">Semester</label>
                                    <select class="form-control" name="semester" id="">
                                        <option value="">Choose</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        {{-- <button data-dismiss="modal" class="btn btn-default" type="button">Close</button> --}}
                        <button class="btn btn-block btn-success col-md-6 offset-md-3" type="submit">Register Courses</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
