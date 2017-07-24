@extends('layouts.app')

@section('content')

    @include('partials.welcome.hero')

    @include('partials.nav')

    @include('partials.welcome.about')

    @include('partials.welcome.parallax')

    <!-- @include('partials.welcome.features') -->

    @include('partials.welcome.portfolio')

    <!-- @include('partials.welcome.team') -->

    @include('partials.welcome.contact')

    @include('partials.footer')
  
    <a class="scrolltop" href="#"><span class="fa fa-angle-up"></span></a>

    @include('partials.modals.login')

@stop