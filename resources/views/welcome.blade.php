<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@section('head')
@include('layouts.head')
@show
<body class="home-page">
<div class="wrap-body">




    @section('header')
        @include('layouts.header')
    @show
    <!--////////////////////////////////////Container-->

        @if ($errors->any())
            <div class="container">
                <div class="row">
                    <div class="col-md-10">
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if(session('status'))
        <div class="container">
            <div class="row">
              <div class="alert alert-info">
                  {{session('status')}}
              </div>
          </div>
        </div>
        @endif

   @section('container')
       @include('layouts.container')
   @show
    <!--////////////////////////////////////Footer-->
    @section('footer')
        @include('layouts.footer')
        @show

    <!-- carousel -->
        @section('scripts')
    @include('layouts.scripts')
            @show
</div>
</body>
</html>
