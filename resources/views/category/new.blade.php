@extends("layout")
@section("title","Create a new category")
@section("contentHeader","Create a new category")
@section("content")
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Please enter</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="{{url("/admin/save-category")}}" method="post">
            @method("POST")
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label>Category Name</label>
                    <input class="form-control @error("category_name") is-invalid @enderror" type="text" name="category_name" placeholder="Enter Name"/>
                    @error("category_name")
                    <span class="error invalid-feedback">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
