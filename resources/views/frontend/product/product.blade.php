@extends('layouts.master')
<!-- layouts.master.blade.php -->
<link rel="icon" href="{{ asset('images/logo0.png') }}">

<head>
    <!-- Các đoạn mã khác trong head -->

    @yield('title') <!-- Đây là nơi title của trang sẽ được thay thế -->

    @includeIf('frontend.header') <!-- Include file header -->
</head>

<body>

    <!-- Các nội dung khác của trang -->

    @includeIf('frontend.product.product-list') <!-- Include danh sách sản phẩm -->

</body>
