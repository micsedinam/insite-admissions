@extends('layouts.admin')

@section('header')
    <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12 mb-4">
            <div class="row">
                <div class="col-md-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Total Completed Applications
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$total_applications}}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-archive fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Total Reviewed Applications
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$total_reviewed}}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-envelope-open fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Total Yet to be Reviewed Applications
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$total_yet_reviewed}}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-envelope fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card border-bottom-warning">
                <div class="card-body text-center">
                    <p>Hello {{Auth::user()->name}} <br> Welcome to your dashboard.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
