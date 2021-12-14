@extends('layouts.app')

@section('content')
  <!-- BEGIN: Content-->
  <div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body"><!-- register section starts -->
        <section class="row flexbox-container">
            <div class="col-xl-8 col-10">
                <div class="card bg-authentication mb-0">
                    <div class="row m-0">
                        <!-- register section left -->
                        <div class="col-md-6 col-12 px-0">
                            <div class="card disable-rounded-right mb-0 p-2 h-100 d-flex justify-content-center">
                                <div class="card-header pb-1">
                                    <div class="card-title">
                                        <h4 class="text-center mb-2">Sign Up</h4>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <p> <small> Please enter your details to sign up and be part of our great community</small>
                                    </p>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('register') }}" method="POST">
                                        @csrf
                                        <div class="form-row">
                                            <div class="form-group col-md-12 mb-50">
                                                <label for="inputfirstname4">Full name</label>
                                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="inputfirstname4"
                                                    placeholder="Full name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                            </div>
                                        </div>
                                        <div class="form-group mb-50">
                                            <label class="text-bold-600" for="exampleInputEmail1">Email address</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1"
                                                placeholder="Email address"  name="email" value="{{ old('email') }}" required autocomplete="email">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                        <div class="form-group mb-2">
                                            <label class="text-bold-600" for="exampleInputPassword1">Password</label>
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1"
                                                placeholder="Password" name="password" required autocomplete="new-password">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                        <div class="form-group mb-2">
                                            <label class="text-bold-600" for="exampleInputPassword1">Confirm Password</label>
                                            <input type="password" class="form-control" id="exampleInputPassword1"
                                                placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary glow position-relative w-100">SIGN UP<i
                                                id="icon-arrow" class="bx bx-right-arrow-alt"></i></button>
                                    </form>
                                    <hr>
                                    <div class="text-center"><small class="mr-25">Already have an account?</small><a
                                            href="{{ route('login') }}"><small>Sign in</small> </a></div>
                                </div>
                            </div>
                        </div>
                        <!-- image section right -->
                        <div class="col-md-6 d-md-block d-none text-center align-self-center p-3">
                            <img class="img-fluid" src="{{ asset('backend/') }}/app-assets/images/pages/register.png" alt="branding logo">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- register section endss -->

      </div>
    </div>
  </div>
  <!-- END: Content-->

@endsection
