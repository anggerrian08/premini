@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-light shadow-sm rounded">
                <div class="card-header bg-primary text-blue">
                    <h4 class="mb-0">{{ __('HALAMAN UTAMA') }}</h4>
                </div>

                <div class="background-image">
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('status') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <h5 class="card-title">Welcome Back!</h5>
                    <p class="card-text">You are logged in and ready to explore the app. Here are some quick links to get you started:</p>

                </div>

                <div class="card-footer text-center">
                    <small class="text-muted">© {{ date('Y') }} Your Company. All rights reserved.</small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
