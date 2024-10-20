<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<!--begin::Head-->
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Dreamers Association">
    <meta name="author" content="Dreamers Association">

    <title>@yield('title')</title>

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets/img/icons/icon-48x48.png')}}" />

    @include('include.css')
    
    @stack('css')

</head>
<!--end::Head-->

<div class="wrapper">

    <!--begin::Aside menu-->
    @include('include.sidebar')
    <!--end::Aside menu-->

    <div class="main">

        <!--begin::Aside menu-->
        @include('include.header')
        <!--end::Aside menu-->

        <!--begin::Content-->
        <main class="content">
            <div class="container-fluid p-0">
                @yield('content')
            </div>
        </main>
        <!--end::Content-->

        <!--begin::Footer-->
        @include('include.footer')
        <!--end::Footer-->
    </div>

    @include('include.js')
    @stack('scripts')
</div>

</html>
