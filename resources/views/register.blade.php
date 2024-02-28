@extends('layouts.master')
@section('title','Register Page')
@section('content')
<div class="login-form">
    {{-- error alert message start --}}
    @if ($errors->any())
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    {{-- error alert message end --}}
        <form action="{{route('register')}}" method="post">
            @csrf
            <div class="row">
            <div class="col">
                <div class="form-group">
                    <label>Username</label>
                    <input class="au-input au-input--full" type="text" name="name" placeholder="Username" value="{{old('name')}}">
                </div>
                <div class="form-group">
                    <label>Email Address</label>
                    <input class="au-input au-input--full" type="email" name="email" placeholder="Email" value="{{old('email')}}">
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input class="au-input au-input--full" type="number" name="phone" placeholder="phone"  value="{{old('phone')}}">
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input class="au-input au-input--full" type="text" name="address" placeholder="address"  value="{{old('address')}}">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>Password</label>
                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input class="au-input au-input--full" type="password" name="password_confirmation" placeholder="Confirm Password">
                </div>
                
                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">register</button>
            </div>
        </div>
        </form>
    
    <div class="register-link">
        <p>
            Already have account?
            <a href="{{route('auth#loginPage')}}">Sign In</a>
        </p>
    </div>
</div>
@endsection