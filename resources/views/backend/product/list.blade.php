@extends('backend.master')

@section('contant')

    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Product List</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Product List</li>
                    </ol>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content Header-->
    <!--begin::App Content-->
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h3 class="card-title">Manage Products</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Image</th>
                                        <th>Product Code</th>
                                        <th>Name</th>
                                        <th>Product Type</th>
                                        <th>Category Name</th>
                                        <th>SubCategory Name</th>
                                        <th>Quantity</th>
                                        <th>Buying Price</th>
                                        <th>Regular Price</th>
                                        <th>Discount Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr class="align-middle">
                                        <td>{{$loop->index+1}}</td>
                                        <td>
                                            <img src="{{asset('backend/images/product/'.$product->image)}}" height="100" width="100">
                                        </td>
                                        <td>{{$product->sku_code}}</td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->product_type}}</td>
                                        <td>{{$product->category->name}}</td>
                                        <td>{{$product->subCategory->name}}</td>
                                        <td>{{$product->qty}}</td>
                                        <td>{{$product->buying_price}}</td>
                                        <td>{{$product->regular_price}}</td>
                                        <td>{{$product->discount_price}}</td>
                                        <td>
                                            <a href="{{url('/admin/product/edit/'.$product->id)}}" class="btn btn-primary">Edit</a>
                                            <a href="{{url('/admin/product/delete/'.$product->id)}}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->

@endsection