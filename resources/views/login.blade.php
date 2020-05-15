@extends("layout")
@section("content")
    <h1>Login</h1>
    <form action="#" method="post">
        <x-input.email name="email" holder="email"/>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="password"/>
        </div>
        <div class="form-group">
            <button class="btn btn-danger" type="submit">Login</button>
        </div>
    </form>
@endsection
