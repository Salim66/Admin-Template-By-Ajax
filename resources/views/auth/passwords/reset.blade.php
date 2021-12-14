@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}


<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body"><!-- reset password start -->
        <section class="row flexbox-container">
            <div class="col-xl-7 col-10">
                <div class="card bg-authentication mb-0">
                    <div class="row m-0">
                        <!-- left section-login -->
                        <div class="col-md-6 col-12 px-0">
                            <div class="card disable-rounded-right d-flex justify-content-center mb-0 p-2 h-100">
                                <div class="card-header pb-1">
                                    <div class="card-title">
                                        <h4 class="text-center mb-2">Reset your Password</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form class="mb-2" action="{{ route('password.update') }}" method="POST">
                                        @csrf

                                        <input type="hidden" name="token" value="{{ $token }}">

                                        <div class="form-group">
                                            <label class="text-bold-600" for="exampleInputPassword1">{{ __('E-Mail Address') }}</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                                placeholder="E-Mail Address" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="text-bold-600" for="exampleInputPassword1">New Password</label>
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1"
                                                placeholder="Enter a new password" name="password" required autocomplete="new-password">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-2">
                                            <label class="text-bold-600" for="exampleInputPassword2">Confirm New
                                                Password</label>
                                            <input type="password" class="form-control" id="exampleInputPassword2"
                                                placeholder="Confirm your new password" name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                        <button type="submit" class="btn btn-primary glow position-relative w-100">Reset my
                                            password<i id="icon-arrow" class="bx bx-right-arrow-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- right section image -->
                        <div class="col-md-6 d-md-block d-none text-center align-self-center p-3">
                            <img class="img-fluid" src="{{ asset('backend/') }}/app-assets/images/pages/reset-password.png"
                                alt="branding logo">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- reset password ends -->

      </div>
    </div>
  </div>
  <!-- END: Content-->

@endsection
