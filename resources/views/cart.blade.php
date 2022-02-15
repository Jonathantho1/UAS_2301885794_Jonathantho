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
                        <a class="nav-link" href="{{ url('/cart') }}" style="color:rgb(24, 24, 248); font-weight: bold; font-size: 23px; margin-right: 100px; margin-left: 100px">
                            <u>@lang('translate.navbar.cart')</u>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/profile') }}" style="color:black; font-weight: bold; font-size: 23px; margin-right: 100px; margin-left: 100px">
                            @lang('translate.navbar.profile')
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

    <div>
        <h1><b>My Cart</b></h1>
        <hr>
        @if(empty($cart) || count($cart)==0)

        @else
            <div class="container">
                <table class="table">
                    <thead>
                        <tr>
                        <br>
                        <th class="heading p-1" scope="col", style="font-size: 16px">@lang('translate.ebook.title')</th>
                        <th class="heading p-1" scope="col", style="font-size: 16px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cart as $ct => $item)
                            <div class="row">
                                <tr class="table-secondary">
                                    <td class="heading p-2" style="font-size: 16px" >{{ $item["title"] }}</td>
                                    <td>
                                        <a href="{{url('/delete-cart/'.$ct)}}" style="text-decoration: none;">
                                            <button  class="btn" style="width: 200px; color: black; font-weight: bold; font-size: 20px; background-color: rgb(248, 101, 101)">
                                                @lang('translate.delete')
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="col-md-2" style="margin-bottom: 30px; margin-left: 85%;">
                <a href="/order" style="text-decoration: none;">
                    <button  class="btn btn-warning" style="width: 200px; color: black; font-weight: bold; font-size: 20px">
                        @lang('translate.submit')
                    </button>
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
