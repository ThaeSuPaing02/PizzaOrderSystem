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
               
            </div>
            
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
                                        <button class="btn btn-success">
                                            <i class="fa-solid fa-pen"></i> Edit
                                        </button>
                                </div>
                                <div class="col-lg-6 px-xl-10">
                                    <div class="d-lg-inline-block py-1-9 px-1-9 px-sm-6 mb-1-9 rounded">
                                    </div>
                                    <ul class="list-unstyled mt-4 mb-1-9">
                                        <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600"><i class="fa-solid fa-user-pen"></i></span>{{$user['name']}}</li>
                                        <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600"><i class="fa-solid fa-envelope"></i></span>{{$user['email']}}</li>
                                        <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600"><i class="fa-solid fa-envelope"></i></span>{{$user['address']}}</li>
                                        <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600"><i class="fa-solid fa-phone"></i></span>{{$user['phone']}}</li>
                                        <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600"><i class="fa-solid fa-users"></i></span>{{$user['role']}}</li>
                                    </ul>
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