<link rel="stylesheet" href="{{ asset('/assets/css/layout/header.css') }}">
<nav class="navbar navbar-expand-lg p-0" id="header">
    <div class="container h-100">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('/assets/img/logo.png') }}" alt="">
            Pox Academy
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto" id="menu">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Khóa học</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Giới thiệu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Liên hệ</a>
                </li>
                <div id="indicator"></div>
            </ul>
            @if(auth()->check())
                <p>Chào, {{ auth()->user()->name }}</p>
                <a href="{{ route('logout') }}">Đăng xuất</a>
            @else
                <a class="btn btn-1 m-0 d-flex" href="#" data-bs-toggle="modal" data-bs-target="#loginModal">
                    <svg>
                        <rect x="0" y="0" fill="none" width="100%" height="100%"/>
                    </svg>
                    login
                </a>
                @extends('layout.modal_login')
            @endif
        </div>
    </div>
</nav>
<script>
    window.addEventListener("scroll", function() {
        var header = document.getElementById("header");
        if (window.scrollY > 50) {
            header.classList.add("scrolled");
        } else {
            header.classList.remove("scrolled");
        }
    });
</script>
