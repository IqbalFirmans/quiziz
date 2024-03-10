@extends('user.layouts.main')
@section('title', 'Quiz')
@section('head')
    @viteReactRefresh
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- In this article, we are going to use JSX syntax for React components -->
    @inertiaHead
@endsection
@section('content')
    @inertia
@endsection
