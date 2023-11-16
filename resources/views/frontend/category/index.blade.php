<!-- resources/views/brands/index.blade.php -->
@includeIf('frontend.header')
@section('title')
    Danh Mục Sản Phẩm
@endsection
<head>
<link rel="icon" href="{{ asset('images/logo0.png') }}">

</head>

@extends('layouts.master')

<style>
    .category-container {
        display: flex;
        flex-wrap: wrap;
    }

    .category-item {
        width: 300px;
        margin: 10px;
        overflow: hidden;
        border: 2px solid #333;
        /* Đường viền đậm hơn (màu đen) và kích thước 2px */
        border-radius: 8px;
        /* Góc bo */
    }

    .product-image {
        max-width: 100%;
        height: auto;
        cursor: pointer;
    }

    .category-link {
        text-decoration: none;
        color: inherit;
        display: block;
        text-align: center;
    }
</style>
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{ asset('dist/img/sp.png') }}');">
    <h2 class="ltext-105 cl0 txt-center" style="color:#33FFFF ;">
        Danh Mục Sản Phẩm
    </h2>
</section>
<div class="container">
    <hr style="border: 1px solid #070707; colorgb(8, 8, 8)333; margin: 20px 0;">
</div>

<div class="container">
    <div class="d-flex justify-content-between flex-wrap">
        @isset($category)
            @foreach ($category as $cat)
                <div class="category-item">
                    <a class="category-link" href="{{ route('product.category', $cat->id) }}">
                        <img class="product-image" src="{{ asset('images/category/' . $cat->image) }}"
                            alt="{{ $cat->name }}" style="width: 100px; height: 100px; object-fit: cover;">
                        <!-- Thêm các thông tin khác cần hiển thị -->
                    </a>
                </div>
            @endforeach
        @endisset
    </div>
</div>
<div class="pagination justify-content-center">
            {{ $category->links() }}
        </div>
<div class="container">
    <hr style="border: 1px solid #070707; colorgb(8, 8, 8)333; margin: 20px 0;">
</div>

