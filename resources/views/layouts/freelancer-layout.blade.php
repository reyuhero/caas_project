@extends('layouts.master')
@section('head')
    <title>@yield('title', 'Caas Project')</title>
@endsection

@section('header')
    @include('layouts.navigation-freelancer')
@endsection

@section('content')
    @yield('content')
@endsection
