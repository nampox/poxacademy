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
            <div class="btn_toggle">
                <input class="d-none" onclick="myFunction()" type="checkbox" id="hide-checkbox">
                <label for="hide-checkbox" class="toggle">
        <span class="toggle-button">
          <span class="crater crater-1"></span>
          <span class="crater crater-2"></span>
          <span class="crater crater-3"></span>
          <span class="crater crater-4"></span>
          <span class="crater crater-5"></span>
          <span class="crater crater-6"></span>
          <span class="crater crater-7"></span>
        </span>
                    <span class="star star-1"></span>
                    <span class="star star-2"></span>
                    <span class="star star-3"></span>
                    <span class="star star-4"></span>
                    <span class="star star-5"></span>
                    <span class="star star-6"></span>
                    <span class="star star-7"></span>
                    <span class="star star-8"></span>
                </label>
            </div>
            @if(auth()->check())
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown"
                           role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ asset('/assets/img/user.png') }}" class="rounded-circle" height="30" alt="Avatar" loading="lazy">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="profile/{{auth()->user()->id}}">My profile</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                        </ul>
                    </li>
                </ul>
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
    function myFunction() {
        var element = document.body;
        element.classList.toggle("dark-mode");
    }
    window.addEventListener("scroll", function() {
        var header = document.getElementById("header");
        if (window.scrollY > 50) {
            header.classList.add("scrolled");
        } else {
            header.classList.remove("scrolled");
        }
    });
</script>
