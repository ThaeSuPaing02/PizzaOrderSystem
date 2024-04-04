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
                <div class="col-3 offset-8">
                    <a href="category_list.html"><button class="btn bg-dark text-white my-3">List</button></a>
                </div>
            </div>
            <div class="col-lg-6 offset-3">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h3 class="text-center title-2">Create Product Form</h3>
                        </div>
                        <hr>
                        <form action="{{route('product#create')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="cc-payment" class="control-label mb-1">Product Name</label>
                                <select class="form-select" name="category_id" aria-label="Default select example">
                                    @foreach($categories as $category)
                                    <option value="{{$category['id']}}" name="category_id">{{$category['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="cc-payment" class="control-label mb-1">Product Name</label>
                                <input id="cc-pament" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                            </div>
                            <div class="form-group">
                                <label for="cc-payment" class="control-label mb-1">Product Description</label>
                                <input id="cc-pament" name="description" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                            </div>
                            <div class="form-group">
                                <label for="cc-payment" class="control-label mb-1">Product Price</label>
                                <input id="cc-pament" name="price" type="number" class="form-control" aria-required="true" aria-invalid="false" required>
                            </div>
                            <div class="form-group">
                                <label for="cc-payment" class="control-label mb-1">Product Image</label>
                                <input class="form-control" name="image" type="file" id="formFile" required>
                            </div>
                            <div>
                                <button id="payment-button" type="submit" class="btn btn-lg mt-1 btn-info btn-block">
                                    <span id="payment-button-amount">Create</span>
                                    <span id="payment-button-sending" style="display:none;">Sending…</span>
                                    <i class="fa-solid fa-circle-right"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div>

<!-- END MAIN CONTENT-->
@endsection