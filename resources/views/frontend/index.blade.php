<!doctype html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="{{ asset('/assets/img/favicon.ico') }}">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pox Academy</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<style>
    .flash-container {
        position: fixed;
        top: 20px;
        right: 20px;
        display: flex;
        flex-direction: column;
        gap: 10px;
        width: 300px; /* Set a fixed width for the container */
    }

    .flash-message {
        position: relative;
        padding: 15px 20px;
        border-radius: 4px;
        color: white;
        font-size: 1em;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        animation: slideIn 0.5s ease, fadeOut 0.5s ease 2.5s;
        overflow: hidden;
        width: 100%; /* Make sure the message takes full width of the container */
        word-wrap: break-word;
        max-height: 100px; /* Set a maximum height */
        overflow-y: auto; /* Allow vertical scrolling if needed */
    }

    .flash-message::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: linear-gradient(to right, rgba(255, 255, 255, 0), rgba(255, 255, 255, 1), rgba(255, 255, 255, 0));
        animation: running-color 3s infinite;
    }

    @keyframes running-color {
        0% { transform: translateX(-100%); }
        100% { transform: translateX(100%); }
    }

    .flash-message.success {
        background-color: #4caf50;
    }

    .flash-message.error {
        background-color: #f44336;
    }

    .flash-message.warning {
        background-color: #ff9800;
    }

    .flash-message.info {
        background-color: #2196f3;
    }

    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateX(100%);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes fadeOut {
        from {
            opacity: 1;
        }
        to {
            opacity: 0;
        }
    }

</style>
<div class="flash-container" id="flash-container"></div>
@extends('layout.header')
<body>
@extends('layout.hero')
{{--@extends('layout.LogoTicker')--}}
<!-- JS -->
<script src="{{ asset('/assets/js/welcome/welcome.js') }}"></script>
</body>
</html>
