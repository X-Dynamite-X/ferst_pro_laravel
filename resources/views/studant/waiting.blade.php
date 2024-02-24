@extends('include.index')
@section('content')
    <center>
        <div class="position-relative">
            <div class="card" style="width:30rem;">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-muted">Please wait </h6>
                    <p class="card-text">
                        Your account has been created successfully. Please wait for your account to be activated.
                    </p>
                    <a href="/login">Login</a>
                </div>
            </div>
        </div>
    </center>
@endsection("content")
