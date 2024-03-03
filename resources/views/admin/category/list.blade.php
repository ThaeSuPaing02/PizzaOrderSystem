@extends('admin.layouts.app')
@section('pageTitle','Category List Page')
@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content mr-4">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <div class="table-data__tool">
                        <div class="table-data__tool-left">
                            <div class="overview-wrap">
                                <h2 class="title-1">Category List</h2>
                            </div>
                        </div>
                        <div class="table-data__tool-right">
                            <a href="{{route('category#createPage')}}">
                                <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                    <i class="zmdi zmdi-plus"></i>add item
                                </button>  
                            </a>
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                CSV download
                            </button>  
                        </div>
                    </div>
                    {{-- show message after each operation CRUD --}}
                    @if(session('message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{session('message')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>name</th>
                                    <th>created_at</th>
                                    <th>updated_at</th>
                                    <th>actions</th>
                                </tr>
                            </thead>
                            <div class="row">
                                <div class="col-3">
                                    <h5>Total - {{$categories->total()}}</h5>
                                </div>
                                <div class="col-3">
                                    <h5>Search key - <span class="text-danger">{{request('key')}}</span></h5>
                                </div>
                                <div class="col-4 offset-2 my-3">
                                    <div class="d-flex gap-2">
                                        <form action="{{route('category#list')}}" class="" method="get">
                                            @csrf
                                            <input type="text" name="key" class="form-control" placeholder="Search" value="{{request('key')}}">
                                            <input type="submit" value="Search" class="btn btn-dark">
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @if (count($categories) == 0)
                                <tbody>
                                    <tr>
                                        <td colspan="5">
                                            <h3>There is no category yet.</h3>
                                        </td>
                                    </tr>
                                </tbody>
                            @else
                            <tbody>
                                @foreach ($categories as $category)
                                <tr class="tr-shadow">
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->created_at->format('d-m-Y')}}</td>
                                    <td>{{$category->updated_at->format('d-m-Y')}}</td>
                                    <td class="d-flex">
                                        <div class="table-data-feature">
                                            <a href="{{route('category#editPage',['id'=>$category->id])}}" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="zmdi zmdi-edit"></i>
                                            </a>
                                            <a href="{{route('category#delete',['id'=>$category->id])}}" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                <i class="zmdi zmdi-delete"></i>
                                            </a>
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                                <i class="zmdi zmdi-more"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            @endif
                        </table>
                        <div class="">
                        {{$categories->appends(request()->query())->links()}}
                        </div>
                    </div>
                    <!-- END DATA TABLE -->
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
    <!-- END PAGE CONTAINER-->
</div>
@endsection