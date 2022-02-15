@extends('layouts.app')

@section('content')
<div>
    <nav class="navbar navbar-expand-md navbar-light"  style="background-color: #f8e267; margin-top: 0px">
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarSupportedContent" style="justify-content: center">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/home') }}" style="color: black; font-weight: bold; font-size: 23px; margin-right: 100px; margin-left: 100px">
                            @lang('translate.navbar.home')
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/cart') }}" style="color:black; font-weight: bold; font-size: 23px; margin-right: 100px; margin-left: 100px">
                            @lang('translate.navbar.cart')
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/profile') }}" style="color:rgb(24, 24, 248); font-weight: bold; font-size: 23px; margin-right: 100px; margin-left: 100px">
                            <u>@lang('translate.navbar.profile')</u>
                        </a>
                    </li>
                    @if (Auth::user()->role_id == 2)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/account_maintenance') }}" style="color:black; font-weight: bold; font-size: 23px; margin-right: 100px; margin-left: 100px">
                            @lang('translate.navbar.accMaintenance')
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</div>

<div class="container" style="margin-top: 30px">
    <form method="POST" action="/update-profile" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col" style="margin-right:-30%">
                <img src="../storage/profile/{{$display_picture_link}}" alt="" style="width: 550px">
            </div>

            <div class="col" style="margin-left: 30%">
                <div class="row mb-3">
                    <label for="first_name" class="col-md-4 col-form-label text-md-right">@lang('translate.register.first_name')</label>

                    <div class="col-md-6">
                        <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{$first_name}}" required autocomplete="first_name" autofocus>

                        @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="middle_name" class="col-md-4 col-form-label text-md-right">@lang('translate.register.middle_name')</label>

                    <div class="col-md-6">
                        <input id="middle_name" type="text" class="form-control @error('middle_name') is-invalid @enderror" name="middle_name" value="{{$middle_name}}" autocomplete="middle_name" autofocus>

                        @error('middle_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="last_name" class="col-md-4 col-form-label text-md-right">@lang('translate.register.last_name')</label>

                    <div class="col-md-6">
                        <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{$last_name}}" required autocomplete="last_name" autofocus>

                        @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-right">@lang('translate.register.email')</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$email}}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="gender" class="col-md-4 col-form-label text-md-right">@lang('translate.register.gender')</label>

                    <div class="col">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender"
                            id="male" value="1"
                            {{ old('gender')=='M' ? 'checked': '' }} >
                            <label class="form-check-label" for="male">@lang('translate.register.male')</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender"
                            id="Female" value="2"
                            {{ old('gender')=='F' ? 'checked': '' }} >
                            <label class="form-check-label" for="female">@lang('translate.register.female')</label>
                        </div>
                        @error('gender')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="role" class="col-md-4 col-form-label text-md-right">@lang('translate.register.role')</label>

                    <div class="col-md-6">
                        @if ($role_id==1)
                            <input id="role_id" type="role_id" class="form-control @error('role_id') is-invalid @enderror" name="role_id" value="User" readonly>
                        @else
                            <input id="role_id" type="role_id" class="form-control @error('role_id') is-invalid @enderror" name="role_id" value="Admin" readonly>
                        @endif
                    </div>

                    @error('role')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row mb-3">
                    <label for="password" class="col-md-4 col-form-label text-md-right">@lang('translate.register.password')</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{$password}}" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="display_picture_link" class="col-md-4 col-form-label text-md-right">@lang('translate.register.profile')</label>

                    <div class="col-md-6">
                        <input id="display_picture_link" type="file" class="@error('display_picture_link') is-invalid @enderror" name="display_picture_link" required autocomplete="display_picture_link" autofocus>

                        @error('display_picture_link')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <button type="submit" style="width: 83%; background-color: #f8e267; font-weight: 700; font-size: 20px; border: none;">@lang('translate.save')</button>
            </div>
        </div>
    </form>
</div>
@endsection
