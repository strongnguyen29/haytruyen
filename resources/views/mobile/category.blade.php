@extends('mobile.layouts.app')

@section('head_title', $metas['title'])
@section('head_meta')
    @parent
    @component('components.head_meta', $metas)@endcomponent
    @endsection

@push('body_class', 'categorypage')
@section('body_content')

    <h1>Trang chủ</h1>

    @endsection