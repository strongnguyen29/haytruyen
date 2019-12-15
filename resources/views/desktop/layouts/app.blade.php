@extends('main')

@section('head_meta')
    <meta content="width=device-width, initial-scale=1.0, user-scalable=yes" name="viewport">
    <meta name="viewport" content="width=device-width, user-scalable=yes">
@endsection

@push('head_css')
    <link rel="preload" as="style" type="text/css" href="{{ asset('desktop/css/desktop.css') }}">
    <link href="{{ asset('desktop/css/desktop.css') }}" rel="stylesheet">
    @endpush

@push('body_class', 'desktop')
@section('body')
    @include('layouts.desktop.header')

    <div class="wrap-content">
        @yield('body_content')
    </div>

    @include('layouts.desktop.footer')

    <button class="btn btn-to-top">
        <i class="material-icons">keyboard_arrow_up</i>
        <span class="d-block" style="margin-top: -5px;">TOP</span>
    </button>
    @endsection

@push('footer_script')
    <script src="{{ asset('desktop/js/app.js') }}"></script>
    @endpush