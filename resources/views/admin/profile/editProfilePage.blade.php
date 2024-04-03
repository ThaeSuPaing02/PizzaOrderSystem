@extends('admin.layouts.app')

@section('content')
<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="row">
                <div class="col-lg-12 mb-4 mb-sm-5">
                    <div class="card card-style1 border-0">
                        <div class="card-body p-1-9 p-sm-2-3 p-md-6 p-lg-7">
                            <div class="row align-items-center">
                                <div class="col-lg-3 mb-4 mb-lg-0 text-center">
                                    <div class="image">
                                        @if(Auth::user()->image)
                                            <img src="asset('admin/images/default-user-pf.jpg')">
                                        @else
                                            <img src="{{asset('admin/images/default-user-pf.jpg')}}">
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <input class="form-control" type="file" id="formFile">
                                    </div>
                                </div>
                                <div class="col-lg-6 px-xl-10">
                                    <div class="d-lg-inline-block py-1-9 px-1-9 px-sm-6 mb-1-9 rounded">
                                    </div>
                                    <form action="" method="POST">
                                    <ul class="list-unstyled mt-4 mb-1-9">
                                        <li class="mb-2 mb-xl-3 display-28 row align-items-center">
                                            <span class="col-auto display-26 text-secondary me-2 font-weight-600"><i class="fa-solid fa-user-pen"></i></span>
                                            <input class="col form-control" type="text" value="{{$user['name']}}" aria-label="default input example">
                                        </li>
                                        <li class="mb-2 mb-xl-3 display-28 row align-items-center">
                                            <span class="col-auto display-26 text-secondary me-2 font-weight-600"><i class="fa-solid fa-envelope"></i></span>
                                            <input class="col form-control" type="email" value="{{$user['email']}}" aria-label="default input example">
                                        </li>
                                        <li class="mb-2 mb-xl-3 display-28 row align-items-center">
                                            <span class="col-auto display-26 text-secondary me-2 font-weight-600"><i class="fa-solid fa-phone"></i></span>
                                            <input class="col form-control" type="text" value="{{$user['phone']}}" aria-label="default input example">
                                        </li>
                                        <li class="mb-2 mb-xl-3 display-28 row align-items-center">
                                            <span class="col-auto display-26 text-secondary me-2 font-weight-600"><i class="fa-solid fa-location-dot"></i></span>
                                            <input class="col form-control" type="text" value="{{$user['address']}}" aria-label="default input example">
                                        </li>
                                        <li class="mb-2 mb-xl-3 display-28 row align-items-center">
                                            <span class="col-auto display-26 text-secondary me-2 font-weight-600"><i class="fa-solid fa-users"></i></i></span>
                                            <input class="col form-control" type="text" value="{{$user['role']}}" aria-label="default input example">
                                        </li>
                                    </ul>
                                    <button class="btn btn-success float-right" type="submit">Save Changes</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- END MAIN CONTENT-->
@endsection
