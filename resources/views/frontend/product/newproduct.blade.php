@extends('layouts.master')
<style>
    .custom-justify-right {
        justify-content: flex-end;
    }

    .custom-font {
        font-family: 'Playfair Display', serif;

        /* Thay 'Your_Custom_Font' bằng tên font chữ bạn muốn sử dụng */
        font-size: 24px;
        /* Điều chỉnh kích thước font chữ theo ý muốn */
        font-weight: bold;
        /* Điều chỉnh độ đậm của font chữ theo ý muốn */
        color: #333;
        /* Điều chỉnh màu sắc của font chữ theo ý muốn */
        /* Các thuộc tính khác có thể thêm vào tùy thuộc vào yêu cầu thiết kế */
    }

    .container-frame {
        border: 2px solid #ccc;
        /* Màu và độ rộng của đường viền */
        padding: 20px;
        /* Khoảng cách giữa nội dung và khung */
        margin: 20px 0;
        /* Khoảng cách giữa khung và các phần tử xung quanh */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        /* Độ bóng của khung */
        border-radius: 10px;
        /* Độ cong của góc khung */
    }



    /* Nếu bạn muốn chúng căn giữa theo chiều dọc, bạn có thể sử dụng margin-top hoặc top và translateY */
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('dist/css/price.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</head>
<div class="container">
    <div class="container-frame">
        <div class="p-b-10">
            <h3 class="" style="color: #37a6da; font-size: 33px;">
                Sản phẩm mới
            </h3>
        </div>

        <div class="row py-3">
            <div class="col-md-12 border-bottom border-1 border-danger">
                @isset($cat)
                    <a class="float-start text-danger" style="text-decoration: none"
                        href="{{ route('site.index', ['slug' => $cat->slug]) }}">
                        <h4 class="text-center">{{ $cat->name }}</h4>
                    </a>
                @endisset
            </div>
        </div>
        @isset($list_product)
            <div class="row isotope-grid">
                @foreach ($list_product as $index => $product)
                    <div class="col-sm-6 col-md-4 col-lg-4 p-b-35 isotope-item women">
                        <!-- Block2 -->
                        <div class="block2">
                            <div class="block2-pic hov-img0">
                                <img class="product-image" src="{{ asset('images/product/' . $product->image) }}"
                                    style="width: 355px; height: 380px; object-fit: cover;">

                                <a href="{{ route('product.detail', ['product' => $product->id]) }}"
                                    class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                    <span
                                        onclick="window.location.href='{{ route('product.detail', ['product' => $product->id]) }}';">
                                        Xem chi tiết
                                    </span>
                                </a>
                            </div>
                            <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l ">
                                    <h1 class="product-name">{{ $product->name }}</h1>
                                    <span class="mtext-106 cl2">
                                        <div class="d-flex align-items-center flex-row">
                                            <img src="{{ asset('images/product/sale.png') }}" width="20">
                                            <span class="guarantee">Giảm giá sốc</span>
                                        </div>
                                        <h2 class="product-price">
                                            @if ($product->price_sale)
                                                <del>Giá:{{ $product->price }} VND</del> {{ $product->price_sale }} VND
                                            @else
                                                {{ $product->price }} VND
                                            @endif
                                        </h2>
                                    </span>
                                </div>

                                <div class="block2-txt-child2 flex-r p-t-3">
                                    <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                        <img class="icon-heart1 dis-block trans-04"
                                            src="images/product/icon-heart-01.png"alt="ICON">
                                        <img class="icon-heart2 dis-block trans-04 ab-t-l"
                                            src="images/product/icon-heart-02.png" alt="ICON">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if (($index + 1) % 3 == 0)
            </div>
            <div class="row isotope-grid">
                @endif
                @endforeach
            </div>
        @endisset
    </div>
</div>
<div class="container">
    <hr style="border: 1px solid #070707; color: #333; margin: 20px 0;">
</div>
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

<div class="container">
    <div class="p-b-10">
        <h1 class="" style="color: #37a6da; font-size: 33px;">
            Danh mục sản phẩm
        </h1>
    </div>
    <div class="d-flex justify-content-between flex-wrap">
        @isset($list_category)
            @foreach ($list_category as $cat)
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
