@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row">

        <div class="col-8 m-auto">

            @if (session('status'))

                <div class="bg-success text-white p-3">
                    {{ session('status') }}
                </div>

            @endif



            <form action="{{ route('register.db') }}" method="POST">
                @csrf

                <div class="mb-3 mt-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name')
                        is-invalid
                    @enderror" id="name" placeholder="type your name" name="name">

                    @error('name')

                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>

                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control  @error('email')
                    is-invalid
                @enderror" id="email" placeholder="type your email" name="email">

                @error('email')

                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>

                @enderror


                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="tel" class="form-control @error('phone')
                    is-invalid
                @enderror" id="phone" placeholder="type your phone number" name="phone">

                @error('phone')

                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>

                @enderror

                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control @error('password')
                    is-invalid
                @enderror" id="password" placeholder="type your password" name="password">

               @error('password')

                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>

                @enderror


                </div>

                <div class="mb-3">
                    <label for="con_password" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="password" placeholder="type confirm password" name="password_confirmation">
                </div>


                <button type="submit" class="btn btn-success">Register</button>


            </form>


        </div>


    </div>

</div>

@endsection
