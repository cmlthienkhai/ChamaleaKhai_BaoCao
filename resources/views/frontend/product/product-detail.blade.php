@section('title')
    Chi Tiết Sản Phẩm
@endsection
<link rel="icon" href="{{ asset('images/logo0.png') }}">

@includeIf('frontend.header')
@extends('layouts.master')

<head>
    <link rel="stylesheet" href="{{ asset('dist/css/price.css') }}">
    <style>
        .custom-outline-red {
            border: 1px solid red !important;
            color: red !important;
        }
    </style>
    <style>
        .contact-share {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .share {
            display: inline-flex;
            align-items: center;
        }


        .social-icons {
            display: inline-flex;
        }

        .social-icon {
            margin-right: 5px;
        }

        .custom-justify-right {
            justify-content: flex-end;
        }

        .button-container {
            margin-bottom: 20px;
            margin-left: -20px;
        }

        .btn-addcart-detail {
            /* Thêm các thuộc tính CSS cho nút "Thêm vào giỏ hàng" ở đây */
            /* Ví dụ: */
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-addwish-b2 {
            /* Thêm các thuộc tính CSS cho biểu tượng trái tim ở đây */
            /* Ví dụ: */
            display: block;
            position: relative;
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

        .with-border {
            box-shadow: 0 0 10px rgba(119, 117, 117, 0.5);
            /* Màu đen, bạn có thể thay đổi màu sắc theo ý muốn */
            border-radius: 5px;
            /* Độ cong của góc viền */
            padding: 10px;
            /* Khoảng cách giữa khung và ảnh */
        }
    </style>
</head>
<div class="container">
    <div class="container-frame">
        <h1 class="center-text text-center" style="color: #37a6da;">Chi Tiết Sản Phẩm</h1>
        <div class="container mt-5 mb-5">
            <div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('site.product') }}" class="btn btn-primary right-align">Trang sản phẩm</a>
                        <a href="{{ route('site.index') }}" class="btn btn-primary right-align">Trang chủ</a>
                    </div>
                <div class="row">
                    <div class="col-md-6 col-lg-7 p-b-30">
                        <div class="p-l-25 p-r-30 p-lr-0-lg">
                            <div class="wrap-slick3 flex-sb flex-w">
                                <div class="slick3 gallery-lb">
                                    <div class="col-md-6">
                                        <div class="images p-3">
                                            <div class="text-center p-4">
                                                <a href="{{ asset('images/product/' . $product->image) }}">
                                                    <img class="product-image with-border"
                                                        src="{{ asset('images/product/' . $product->image) }}"
                                                        style="width: 355px; height: 380px; object-fit: cover;">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-5 p-b-30">
                        <div class="p-r-50 p-t-5 p-lr-0-lg">
                            <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                                <h1 class="product-name">{{ $product->name }}</h1>
                            </h4>

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

                            <p class="stext-102 cl3 p-t-23">
                            <p class="product-description">{{ $product->metadesc }}</p>
                            </p>

                            <!--  -->
                            <div class="p-t-33">
                                <div class="flex-w flex-r-m p-b-10">
                                    <div class="size-203 flex-c-m respon6">
                                       Màu Quần & Áo
                                    </div>

                                    <div class="size-204 respon6-next">
                                        <div class="rs1-select2 bor8 bg0">
                                            <select class="js-select2" name="time">
                                                <option>Màu</option>
                                                <option>Đen</option>
                                                <option>Trắng</option>
                                                <option>Xám</option>
                                                <option>Đỏ</option>
                                                <option>Xanh</option>
                                                <option>Hồng</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-w flex-r-m p-b-10">
                                    <div class="size-203 flex-c-m respon6">
                                        Chọn Size Áo
                                    </div>

                                    <div class="size-204 respon6-next">
                                        <div class="rs1-select2 bor8 bg0">
                                            <select class="js-select2" name="time">
                                                <option>Size</option>
                                                <option>Size S</option>
                                                <option>Size M</option>
                                                <option>Size L</option>
                                                <option>Size XL</option>
                                                <option>Size XXL</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-w flex-r-m p-b-10">
                                    <div class="size-203 flex-c-m respon6">
                                        Chọn Size Giày
                                    </div>

                                    <div class="size-204 respon6-next">
                                        <div class="rs1-select2 bor8 bg0">
                                            <select class="js-select2" name="time">
                                                <option>Size</option>
                                                <option>37</option>
                                                <option>38</option>
                                                <option>39</option>
                                                <option>40</option>
                                                <option>41</option>
                                                <option>42</option>
                                                <option>43</option>
                                                <option>44</option>
                                                <option>45</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-w flex-r-m p-b-10">
                                    <div class="size-203 flex-c-m respon6">
                                        Chọn Màu Giày
                                    </div>

                                    <div class="size-204 respon6-next">
                                        <div class="rs1-select2 bor8 bg0">
                                            <select class="js-select2" name="time">
                                                <option>Màu</option>
                                                <option>Đen</option>
                                                <option>Trắng</option>
                                                <option>Xám</option>
                                                <option>Đỏ</option>
                                                <option>Xanh</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex-w flex-r-m p-b-10">
                                    <div class="size-204 flex-w flex-m respon6-next">
                                        <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                            <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-minus"></i>
                                            </div>

                                            <input class="mtext-104 cl3 txt-center num-product" type="number"
                                                name="qty" id="qty" value="{{ $product->qty }}">

                                            <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-plus"></i>
                                            </div>
                                        </div>

                                        <div class="button-container">
                                            <a href="{{ route('cart.add') }}"
                                                class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
                                                Thêm vào giỏ hàng
                                            </a>
                                        </div>

                                        <div class="contact-share">
                                            <div class="row d-flex justify-content-center align-items-center">
                                                <div class="col-md-6 share">

                                                    <a href="#" class="d-flex align-items-center">
                                                        <img src="{{ asset('images/product/phone.png') }}"
                                                            width="15">
                                                        <span class="ml-2">0983149188</span>
                                                    </a>
                                                </div>
                                                <div class="col-md-6 share">

                                                    <div class="d-flex">
                                                        <!-- Thêm các biểu tượng mạng xã hội để chia sẻ tại đây -->
                                                        <a href="#" class="social-icon"><img
                                                                src="{{ asset('images/product/zalo.png') }}"
                                                                width="30"></a>
                                                        <a href="#" class="social-icon"><img
                                                                src="{{ asset('images/product/mes.png') }}"
                                                                width="30"></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
