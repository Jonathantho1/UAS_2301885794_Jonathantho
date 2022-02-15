@extends('layouts.app')

@section('content')
<div>
    <nav class="navbar navbar-expand-md navbar-light"  style="background-color: #f8e267; margin-top: 0px">
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarSupportedContent" style="justify-content: center">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/home') }}" style="color: rgb(24, 24, 248); font-weight: bold; font-size: 23px; margin-right: 100px; margin-left: 100px">
                            <u>@lang('translate.navbar.home')</u>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/cart') }}" style="color:black; font-weight: bold; font-size: 23px; margin-right: 100px; margin-left: 100px">
                            @lang('translate.navbar.cart')
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

<div class="container col-md-6">
    <div class="row gx-3">
        <div>
            <table class="table">
            <thead>
                <tr>
                <br>
                <th class="heading p-1" scope="col", style="font-size: 16px">@lang('translate.ebook.author')</th>
                <th class="heading p-1" scope="col", style="font-size: 16px">@lang('translate.ebook.title')</th>
                </tr>
            </thead>
            <tbody>

            @if (!$books->isEmpty())
                @foreach($books as $item)

                    <tr class="table-secondary">
                    <td class="heading p-2" style="font-size: 16px" >{{ $item->author }}</td>
                    <th class="heading p-2" scope="row"><a href="ebooks/{{$item->id}}" style="text-decoration: none; color: black; font-size: 16px">{{ $item->title }}</a></th>
                    </tr>

                @endforeach
            @else
                <th class="bg-warning" style="padding: 5 0 0 0"><p>@lang('translate.ebook.no_data')</p></th>
                <th class="bg-warning"> </th>
            @endif

            </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
