@extends('layouts.app')

@section('content')

<div class="row">

    <div class="col-8 m-auto">

        <form action="{{ route('loginUser') }}" method="post">
         @csrf

         <div class="mb-3 mt-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control @error('email')
                is-invalid
            @enderror" id="email" placeholder="type your name" name="email">

            @error('email')

            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>

            @enderror
        </div>


        <div class="mb-3 mt-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control @error('password')
                is-invalid
            @enderror" id="password" placeholder="type your name" name="password">

            @error('password')

            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>

            @enderror
        </div>

        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" name="remember" id="flexCheckChecked" >
            <label class="form-check-label" for="flexCheckChecked">
              Remember me!
            </label>
          </div>


        <button type="submit" class="btn btn-success">login</button>

        </form>


    </div>

</div>

@endsection
