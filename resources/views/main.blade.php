@php
    $fbAppId = settings('fb_id', config('settings.fb_id'));
    $gaId = settings('ga_id', config('settings.ga_id'));
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>@yield('head_title')</title>
    <meta charset="utf-8">
    @hasSection('head_meta') @yield('head_meta') @endif
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#004ba0">

    @if(!empty($fbAppId))
        <meta property="fb:app_id" content="{{$fbAppId}}">
    @endif

    <link rel="canonical" href="{{url()->current()}}">
    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" type="image/png">
    <meta name="robots" content="follow, all">

    <!-- Css -->
    <link rel="preload" as="style" type="text/css" href="{{ asset('css/app.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @stack('head_css')

    <link rel="preload" as="image" type="image/jpeg" href="{{asset('images/default_poster.jpg')}}">

    <!-- Script -->
    @stack('head_script')

    @if(!empty($gaId))
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ $gaId }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', '{{ $gaId }}');
        </script>
    @endif

</head>
<body class="@stack('body_class')">
@if(!empty($fbAppId))
    <!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root"></div>
    <script async defer
            crossorigin="anonymous"
            src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v4.0&appId={{$fbAppId}}&autoLogAppEvents=1">
    </script>
@endif
@yield('body')

<script src="{{ asset('js/app.js') }}"></script>

@stack('footer_script')

</body>
</html>
