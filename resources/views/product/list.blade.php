@extends("layout")
@section("title","Product Listing")
@section("contentHeader","Product")
@section("content")
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Product Listing</h3>
            <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-header">
            <a href="{{url("new-product")}}" class="float-right btn btn-outline-primary">+</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Category</th>
                    <th>Brand</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{$product->__get("id")}}</td>
                        <td>{{$product->__get("product_name")}}</td>
                        <td>{{$product->__get("product_desc")}}</td>
                        <td>{{$product->__get("price")}}</td>
                        <td>{{$product->__get("qty")}}</td>
                        <td>{{$product->__get("category_id")}}</td>
                        <td>{{$product->__get("brand_id")}}</td>
                        <td>{{$product->__get("created_at")}}</td>
                        <td>{{$product->__get("updated_at")}}</td>
                        <td>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $products->links() !!}
        </div>
        <!-- /.card-body -->
    </div>
@endsection
