@extends('layout')
@section('head')
<style>
    html {
        background: #262b30;
        height: 100%;
    }

    body {
        position: relative;
        top: 50%;
        -webkit-transform: translateY(-50%);
        transform: translateY(-50%);
    }

    .error-banner {
        z-index: 1;
        position: relative;
        text-align: center;
        -webkit-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0);
    }
    .error-banner .error-404, .error-banner .error-500, .error-banner .error-502 {
        margin: 112px auto 2em;
        padding-left: 160px;
        display: inline-block;
        height: 112px;
        background-position: top left;
        -webkit-animation: 0.5s ease-in-out fade-slide-left;
        animation: 0.5s ease-in-out fade-slide-left;
    }
    .error-banner .error-404, .error-banner .error-404:before, .error-banner .error-404:after, .error-banner .error-500, .error-banner .error-500:before, .error-banner .error-500:after, .error-banner .error-502, .error-banner .error-502:before, .error-banner .error-502:after {
        display: inline-block;
        position: relative;
        background-repeat: no-repeat;
        content: "";
    }
    .error-banner .error-404:before, .error-banner .error-404:after, .error-banner .error-500:before, .error-banner .error-500:after, .error-banner .error-502:before, .error-banner .error-502:after {
        width: 160px;
        height: 112px;
    }
    .error-banner .error-404:before, .error-banner .error-500:before, .error-banner .error-502:before {
        top: -38.62069px;
        margin-left: -90px;
        z-index: -1;
        background-position: top left;
        -webkit-animation: 1s ease-in-out fade-slide-left;
        animation: 1s ease-in-out fade-slide-left;
    }
    .error-banner .error-404:after, .error-banner .error-500:after, .error-banner .error-502:after {
        top: -77.24138px;
        margin-left: -90px;
        z-index: -10;
        background-position: top left;
        -webkit-animation: 1.5s ease-in-out fade-slide-left;
        animation: 1.5s ease-in-out fade-slide-left;
    }
    .error-banner .error-404 {
        background-image: url('data:image/svg+xml;utf-8,%3Csvg xmlns="http://www.w3.org/2000/svg" width="159.8" height="89.5" viewBox="0 0 159.8 89.5"%3E%3Cpath fill="%231d2125" d="M60 0L40 11.2V33.6L20 22.4 0 33.6v22.3l60 33.6 39.9-22.3 39.9 22.3 20-11.2V56z"/%3E%3Cpath fill="%23dadede" d="M60 5.2l-15.3 8.5L60 22.3l15.3-8.6L60 5.2M20 27.6L4.7 36.2 20 44.7l15.3-8.6L20 27.6M40 38.8l-15.3 8.5L40 55.9l15.3-8.6L40 38.8M79.9 16.4L64.6 25l15.3 8.6L95.1 25l-15.2-8.6M99.9 27.6l-15.3 8.5 15.3 8.6 15.3-8.6-15.3-8.5M80 38.9l-15.3 8.5L80 56l15.3-8.6L80 38.9M119.9 38.9l-15.3 8.5 15.3 8.6 15.3-8.6-15.3-8.5M60 50l-15.3 8.5L60 67.1l15.3-8.6L60 50M139.8 50l-15.3 8.5 15.3 8.6 15.3-8.6-15.3-8.5"/%3E%3C/svg%3E');
    }
    .error-banner .error-404:before {
        background-image: url('data:image/svg+xml;utf-8,%3Csvg xmlns="http://www.w3.org/2000/svg" width="159.8" height="111.8" viewBox="0 0 159.8 111.8"%3E%3Cpath fill="%231d2125" d="M60 0L0 33.6v22.3l99.9 55.9 59.9-33.5V56z"/%3E%3Cpath fill="%23dadede" d="M60 5.2l-15.3 8.5L60 22.3l15.3-8.6L60 5.2M40 16.5L24.7 25 40 33.5 55.3 25 40 16.5M20 27.6L4.7 36.2 20 44.7l15.3-8.6L20 27.6M40 38.8l-15.3 8.5L40 55.9l15.3-8.6L40 38.8M79.9 16.4L64.6 25l15.3 8.6L95.1 25l-15.2-8.6M99.9 27.6l-15.3 8.5 15.3 8.6 15.3-8.6-15.3-8.5M119.9 38.9l-15.3 8.5 15.3 8.6 15.3-8.6-15.3-8.5M60 50l-15.3 8.5L60 67.1l15.3-8.6L60 50M80 61.2l-15.3 8.5L80 78.3l15.3-8.6L80 61.2M139.8 50l-15.3 8.5 15.3 8.6 15.3-8.6-15.3-8.5M119.8 61.2l-15.3 8.5 15.3 8.6 15.3-8.6-15.3-8.5M99.9 72.4l-15.3 8.5 15.3 8.6 15.3-8.6-15.3-8.5"/%3E%3C/svg%3E');
    }
    .error-banner .error-404:after {
        background-image: url('data:image/svg+xml;utf-8,%3Csvg xmlns="http://www.w3.org/2000/svg" width="159.8" height="89.5" viewBox="0 0 159.8 89.5"%3E%3Cpath fill="%231d2125" d="M60 0L40 11.2V33.6L20 22.4 0 33.6v22.3l60 33.6 39.9-22.3 39.9 22.3 20-11.2V56z"/%3E%3Cpath fill="%23dadede" d="M60 5.2l-15.3 8.5L60 22.3l15.3-8.6L60 5.2M20 27.6L4.7 36.2 20 44.7l15.3-8.6L20 27.6M40 38.8l-15.3 8.5L40 55.9l15.3-8.6L40 38.8M79.9 16.4L64.6 25l15.3 8.6L95.1 25l-15.2-8.6M99.9 27.6l-15.3 8.5 15.3 8.6 15.3-8.6-15.3-8.5M80 38.9l-15.3 8.5L80 56l15.3-8.6L80 38.9M119.9 38.9l-15.3 8.5 15.3 8.6 15.3-8.6-15.3-8.5M60 50l-15.3 8.5L60 67.1l15.3-8.6L60 50M139.8 50l-15.3 8.5 15.3 8.6 15.3-8.6-15.3-8.5"/%3E%3C/svg%3E');
    }
    .error-banner .error-500:before {
        background-image: url('data:image/svg+xml;utf-8,%3Csvg xmlns="http://www.w3.org/2000/svg" width="159.8" height="111.8" viewBox="0 0 159.8 111.8"%3E%3Cpath fill="%231d2125" d="M99.9 22.4L80 33.5V11.2L60 0 0 33.6v22.3l60 33.6 19.9-11.2v22.3l20 11.2 59.9-33.5V56L99.9 22.4z"/%3E%3Cpath fill="%23dadede" d="M60 5.2l-15.3 8.5L60 22.3l15.3-8.6L60 5.2M40 16.5L24.7 25 40 33.5 55.3 25 40 16.5M20 27.6L4.7 36.2 20 44.7l15.3-8.6L20 27.6M40 38.8l-15.3 8.5L40 55.9l15.3-8.6L40 38.8M99.9 27.6l-15.3 8.5 15.3 8.6 15.3-8.6-15.3-8.5M80 38.9l-15.3 8.5L80 56l15.3-8.6L80 38.9M119.9 38.9l-15.3 8.5 15.3 8.6 15.3-8.6-15.3-8.5M60 50l-15.3 8.5L60 67.1l15.3-8.6L60 50M139.8 50l-15.3 8.5 15.3 8.6 15.3-8.6-15.3-8.5M119.8 61.2l-15.3 8.5 15.3 8.6 15.3-8.6-15.3-8.5M99.9 72.4l-15.3 8.5 15.3 8.6 15.3-8.6-15.3-8.5"/%3E%3C/svg%3E');
    }
    .error-banner .error-500, .error-banner .error-500:after {
        background-image: url('data:image/svg+xml;utf-8,%3Csvg xmlns="http://www.w3.org/2000/svg" width="159.8" height="111.8" viewBox="0 0 159.8 111.8"%3E%3Cpath fill="%231d2125" d="M60 0L0 33.6v22.3l99.9 55.9 59.9-33.5V56z"/%3E%3Cpath fill="%23dadede" d="M60 5.2l-15.3 8.5L60 22.3l15.3-8.6L60 5.2M40 16.5L24.7 25 40 33.5 55.3 25 40 16.5M20 27.6L4.7 36.2 20 44.7l15.3-8.6L20 27.6M40 38.8l-15.3 8.5L40 55.9l15.3-8.6L40 38.8M79.9 16.4L64.6 25l15.3 8.6L95.1 25l-15.2-8.6M99.9 27.6l-15.3 8.5 15.3 8.6 15.3-8.6-15.3-8.5M119.9 38.9l-15.3 8.5 15.3 8.6 15.3-8.6-15.3-8.5M60 50l-15.3 8.5L60 67.1l15.3-8.6L60 50M80 61.2l-15.3 8.5L80 78.3l15.3-8.6L80 61.2M139.8 50l-15.3 8.5 15.3 8.6 15.3-8.6-15.3-8.5M119.8 61.2l-15.3 8.5 15.3 8.6 15.3-8.6-15.3-8.5M99.9 72.4l-15.3 8.5 15.3 8.6 15.3-8.6-15.3-8.5"/%3E%3C/svg%3E');
    }
    .error-banner .error-502:before {
        background-image: url('data:image/svg+xml;utf-8,%3Csvg xmlns="http://www.w3.org/2000/svg" width="159.8" height="111.8" viewBox="0 0 159.8 111.8"%3E%3Cpath fill="%231d2125" d="M99.9 22.4L80 33.5V11.2L60 0 0 33.6v22.3l60 33.6 19.9-11.2v22.3l20 11.2 59.9-33.5V56L99.9 22.4z"/%3E%3Cpath fill="%23dadede" d="M60 5.2l-15.3 8.5L60 22.3l15.3-8.6L60 5.2M40 16.5L24.7 25 40 33.5 55.3 25 40 16.5M20 27.6L4.7 36.2 20 44.7l15.3-8.6L20 27.6M40 38.8l-15.3 8.5L40 55.9l15.3-8.6L40 38.8M99.9 27.6l-15.3 8.5 15.3 8.6 15.3-8.6-15.3-8.5M80 38.9l-15.3 8.5L80 56l15.3-8.6L80 38.9M119.9 38.9l-15.3 8.5 15.3 8.6 15.3-8.6-15.3-8.5M60 50l-15.3 8.5L60 67.1l15.3-8.6L60 50M139.8 50l-15.3 8.5 15.3 8.6 15.3-8.6-15.3-8.5M119.8 61.2l-15.3 8.5 15.3 8.6 15.3-8.6-15.3-8.5M99.9 72.4l-15.3 8.5 15.3 8.6 15.3-8.6-15.3-8.5"/%3E%3C/svg%3E');
    }
    .error-banner .error-502 {
        background-image: url('data:image/svg+xml;utf-8,%3Csvg xmlns="http://www.w3.org/2000/svg" width="159.8" height="111.8" viewBox="0 0 159.8 111.8"%3E%3Cpath fill="%231d2125" d="M60 0L0 33.6v22.3l99.9 55.9 59.9-33.5V56z"/%3E%3Cpath fill="%23dadede" d="M60 5.2l-15.3 8.5L60 22.3l15.3-8.6L60 5.2M40 16.5L24.7 25 40 33.5 55.3 25 40 16.5M20 27.6L4.7 36.2 20 44.7l15.3-8.6L20 27.6M40 38.8l-15.3 8.5L40 55.9l15.3-8.6L40 38.8M79.9 16.4L64.6 25l15.3 8.6L95.1 25l-15.2-8.6M99.9 27.6l-15.3 8.5 15.3 8.6 15.3-8.6-15.3-8.5M119.9 38.9l-15.3 8.5 15.3 8.6 15.3-8.6-15.3-8.5M60 50l-15.3 8.5L60 67.1l15.3-8.6L60 50M80 61.2l-15.3 8.5L80 78.3l15.3-8.6L80 61.2M139.8 50l-15.3 8.5 15.3 8.6 15.3-8.6-15.3-8.5M119.8 61.2l-15.3 8.5 15.3 8.6 15.3-8.6-15.3-8.5M99.9 72.4l-15.3 8.5 15.3 8.6 15.3-8.6-15.3-8.5"/%3E%3C/svg%3E');
    }
    .error-banner .error-502:after {
        background-image: url('data:image/svg+xml;utf-8,%3Csvg xmlns="http://www.w3.org/2000/svg" width="159.8" height="111.8" viewBox="0 0 159.8 111.8"%3E%3Cpath fill="%231d2125" d="M139.8 44.8L119.9 56V33.6L60 0 0 33.6v22.3l20 11.2 20-11.2v22.3l59.9 33.6 59.9-33.5V56l-20-11.2z"/%3E%3Cpath fill="%23dadede" d="M60 5.2l-15.3 8.5L60 22.3l15.3-8.6L60 5.2M40 16.5L24.7 25 40 33.5 55.3 25 40 16.5M20 27.6L4.7 36.2 20 44.7l15.3-8.6L20 27.6M79.9 16.4L64.6 25l15.3 8.6L95.1 25l-15.2-8.6M99.9 27.6l-15.3 8.5 15.3 8.6 15.3-8.6-15.3-8.5M80 38.9l-15.3 8.5L80 56l15.3-8.6L80 38.9M60 50l-15.3 8.5L60 67.1l15.3-8.6L60 50M80 61.2l-15.3 8.5L80 78.3l15.3-8.6L80 61.2M139.8 50l-15.3 8.5 15.3 8.6 15.3-8.6-15.3-8.5M119.8 61.2l-15.3 8.5 15.3 8.6 15.3-8.6-15.3-8.5M99.9 72.4l-15.3 8.5 15.3 8.6 15.3-8.6-15.3-8.5"/%3E%3C/svg%3E');
    }

    @-webkit-keyframes fade-slide-left {
        0% {
            opacity: 0;
            -webkit-transform: translate(28px, 15px);
            transform: translate(28px, 15px);
        }
        50% {
            opacity: 0;
            -webkit-transform: translate(28px, 15px);
            transform: translate(28px, 15px);
        }
        100% {
            opacity: 1;
            -webkit-transform: translate(0, 0);
            transform: translate(0, 0);
        }
    }

    @keyframes fade-slide-left {
        0% {
            opacity: 0;
            -webkit-transform: translate(28px, 15px);
            transform: translate(28px, 15px);
        }
        50% {
            opacity: 0;
            -webkit-transform: translate(28px, 15px);
            transform: translate(28px, 15px);
        }
        100% {
            opacity: 1;
            -webkit-transform: translate(0, 0);
            transform: translate(0, 0);
        }
    }
</style>
@endsection
@section('contenido')
    <div class='error-banner'><div class='error-{{$code}}'></div></div>
    <div class="text-center">
        {{$message}}
    </div>
    <div class="pull-right">
        <img src="{{asset('images/logo-completo.png')}}" width="300px;" style="opacity:0.2" alt="">
    </div>
@endsection
