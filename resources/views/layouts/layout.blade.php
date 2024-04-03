<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="csrf-token" content="{{{ csrf_token() }}}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite([
    'resources/css/app.css',
    'resources/js/app.js',
    ])
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
    <link rel="manifest" href="/favicon/site.webmanifest">
    <title>{{config('seo.seo.title')}}</title>
    <meta name="description" content="{{config('seo.seo.description')}}"/>
    <meta name="keywords" content="{{config('seo.seo.keywords')}}"/>
</head>
<body>
<x-message.message/>

<div class="content_">
        <div class="iwwf__block block">
        @include('include.header')
        {{--  <x-menu.menu/>--}}
            <div class="iwwf_container">
                <div class="iwwf__left">
                    @include('include.left.left_bar')
                </div>
                <div class="iwwf__right">
                    @yield('content')
                </div>
            </div>
        </div>
</div><!--.content_-->
@include('include.footer')

<script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>

</body>
</html>

