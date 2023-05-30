@extends('layaouts.auth-master')
@section('content')
    <form  action="/register" method="POST">
        @csrf
        <h1>Create Account</h1>
          @include('layaouts.partials.messages')
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="exampleInputName" placeholder="nombre" name="name" aria-describedby="nameHelp">
            <label for="exampleInputName" class="form-label">Name:</label>
        </div>
        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="exampleInputEmail" placeholder="correo@email.com" name="email" aria-describedby="emailHelp">
            <label for="exampleInputEmail" class="form-label">Email:</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="exampleInputPassword" placeholder="password" name="password">
            <label for="exampleInputPassword" class="form-label">Password</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="exampleInputPasswordConfirmation" placeholder="password" name="password_confirmation">
            <label for="exampleInputPasswordConfirmation" class="form-label">Password confirmation:</label>
        </div>
        <div class="mb-3">
            <a href="/">Login</a>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
 @endsection
