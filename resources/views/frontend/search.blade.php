@extends('layouts.master')
@section('content')
    @if (count($list_product) > 0)
        <div class="row mx-0 mt-4 border box" style="background-color: #ffffff">
            <div class="d-flex flex-column w-100 pt-4 pb-2">
                <div class="d-flex justify-content-between w-100 px-4 pb-2">
                    <h4 style="color: #888">KẾT QUẢ TÌM THẤY</h4>

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
                                                Quick View
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
                                                    src="images/product/icon-heart-01.png" alt="ICON">
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
@else
    <h1 class="text-center mt-5 " style="color: #f7472f; margin-top: 100px!important; font-weight: bold;">Không Tìm Thấy Sản
        Phẩm Phù Hợp! </h1>
    @endif


@endsection
