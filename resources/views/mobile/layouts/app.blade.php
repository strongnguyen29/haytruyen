@extends('main')

@section('head_meta')
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @endsection

@push('head_css')
    <link rel="preload" as="style" type="text/css" href="{{ mix('mobile/css/mobile.css') }}">
    <link href="{{ mix('mobile/css/mobile.css') }}" rel="stylesheet">
    @endpush

@push('body_class', 'mobile')
@section('body')
    <div class="wrap-content">
        @yield('body_content')
    </div>
    @endsection

@push('footer_script')
    <script src="{{ mix('mobile/js/app.js') }}"></script>
    @endpush