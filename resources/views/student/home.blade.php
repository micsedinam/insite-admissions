@extends('layouts.student')

@section('header')
    <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
@endsection

@section('content')
    <div class="row justify-content-center">
        {{-- <div class="col-md-12 mb-4">
            <div class="row">
                <div class="col-md-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="col-md-8">
            <div class="card border-bottom-warning">
                <div class="card-body text-center">
                    <p>Hello {{Auth::user()->name}} <br> Welcome to your dashboard.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
