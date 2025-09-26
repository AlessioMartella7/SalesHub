@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Email Verification</h3>
        <p>We sent a 6-digit code to <b>{{ session('email') }}</b>. Enter it below:</p>

        <form method="POST" action="{{ route('verify.store') }}">
            @csrf
            <input type="hidden" name="email" value="{{ session('email') }}">

            <div class="mb-3">
                <label>Verification Code</label>
                <input type="text" name="code" class="form-control" required autofocus>
            </div>

            <button type="submit" class="btn btn-primary">Verify</button>
        </form>
    </div>
@endsection
