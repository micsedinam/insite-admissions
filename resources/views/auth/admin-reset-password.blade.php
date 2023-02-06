@extends('layouts.admin')

@section('header')
    <h1 class="h3 mb-4 text-gray-800">Users</h1>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header bg-info text-white">Reset User Password</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.reset.password') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email" class="col-form-label text-md-right">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-block btn-outline-primary">
                                Reset Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
