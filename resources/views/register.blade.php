@extends("layout")
@section("content")
    <h1>Register</h1>
    <form action="#" method="post">
        <x-input.textField name="name" holder="Enter name.."/>
        <x-input.email name="email" holder="Enter email.."/>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="password"/>
        </div>
        <div class="form-group">
            <button class="btn btn-danger" type="submit">Register</button>
        </div>
    </form>
@endsection
