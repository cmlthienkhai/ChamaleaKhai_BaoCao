<!-- resources/views/brands/show-products.blade.php -->
@includeIf('frontend.header')

@section('title')
   {{ $category->name }}
@endsection

@extends('layouts.master')
<link rel="icon" href="{{ asset('images/logo0.png') }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('dist/css/price.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="{{ asset('/dist/js/filter.js') }}"></script> <!-- Tạo một file JavaScript mới để chứa code lọc -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4/dist/css/bootstrap.min.css">
    
</head>

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

    .center-text {
        text-align: center;
    }


    /* Nếu bạn muốn chúng căn giữa theo chiều dọc, bạn có thể sử dụng margin-top hoặc top và translateY */
</style>
<div class="container">
    <hr style="border: 1px solid #070707; colorgb(8, 8, 8)333; margin: 20px 0;">
</div>
<div class="container">
    <div class="container-frame">
        <div class="d-flex justify-content-between">
            <a href="{{ route('frontend.category') }}" class="btn btn-primary right-align">Trang danh mục</a>
            <a href="{{ route('site.index') }}" class="btn btn-primary right-align">Trang chủ</a>
        </div>
        <h1 class="center-text" style="color: #37a6da;">{{ $category->name }}</h1>
        <br>
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
                                            <span class="guarantee">Giảm giá sập sàn</span>
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
                                            src="{{ asset('images/product/icon-heart-01.png') }}" alt="ICON">
                                        <img class="icon-heart2 dis-block trans-04 ab-t-l"
                                            src="{{ asset('images/product/icon-heart-02.png') }}" alt="ICON">
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
        <div class="pagination justify-content-center">
            {{ $list_product->links() }}
        </div>

    </div>
</div>
