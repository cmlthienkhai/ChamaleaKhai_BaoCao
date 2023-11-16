<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Checkout example · Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/checkout/">

    <!-- Bootstrap core CSS -->
    <link href="/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('dist/css/pay.css') }}">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container">
        @php
            $cart = session()->get('cart');
            $total_price = 0;
        @endphp
        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Giỏ Hàng Của Bạn</span>
                    <a href="{{ route('cart.show') }}" class="btn btn-primary">Quay lại</a>
                    <span class="badge badge-secondary badge-pill">{{ count($cart ?? []) }}</span>
                </h4>
                <ul class="list-group mb-3">

                    @if ($cart)
                        @foreach ($cart as $item)
                            @php
                                $gia = number_format($item['quantity'] * $item['price'], 0, ',', '.');
                                $total_price += $item['quantity'] * $item['price'];
                            @endphp
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h6 class="my-0">{{ $item['name'] }}</h6>
                                    <small class="text-muted">{{ $item['quantity'] }}</small>
                                </div>
                                <span class="text-muted">{{ number_format($item['price'], 0, ',', '.') }}</span>
                            </li>
                        @endforeach

                        <li class="list-group-item d-flex justify-content-between">
                            <span>Tổng Tiền</span>
                            <strong>{{ number_format($total_price, 0, ',', '.') }}</strong>
                        </li>
                    @endif
                </ul>

                <form class="card p-2">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Nhập Mã Giảm Giá">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-secondary">Giảm Giá</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Địa Chỉ Thanh Toán</h4>
                <form class="needs-validation" method="POST" action="{{ url('thanhtoan') }}" novalidate>
                    @csrf

                    <div class="mb-3">
                        <label for="username">Họ Và Tên</label>
                        <div class="input-group">

                            <input type="text" class="form-control" id="username" name="hovaten"
                                placeholder="Nhập Đầy Đủ Họ Và Tên" required>
                            <div class="invalid-feedback" style="width: 100%;">
                                Không Được Bỏ Trống Họ Và Name
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="email"> Email Của Bạn <span class="text-muted">(Optional)</span></label>
                        <input type="email" class="form-control" name="email" id="email"
                            placeholder="shopeedqc@gmail.com">
                        <div class="invalid-feedback">
                            Không Được Bỏ Trống Email
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address">Địa Chỉ Nhận Hàng</label>
                        <input type="text" class="form-control" id="address" name="diachi"
                            placeholder="103/4c tổ 19,kp2 phương Đông Hưng Thuận....." required>
                        <div class="invalid-feedback">
                            Vui Lòng Không Bỏ Trống Địa Chỉ Nhận Hàng
                        </div>
                    </div>
                    {{-- 
                    <div class="mb-3">
                        <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
                        <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
                    </div> --}}


                    <div class="row">
                        <div class="col">
                            <label for="cc-expiration">Nhập Số Điện Thoại Nhận Hàng</label>
                            <input type="number" class="form-control" name="sodienthoai" id="cc-expiration"
                                placeholder="Nhập Số Điện Thoại" required>
                            <div class="invalid-feedback">
                                Vui Lòng Không Bỏ Trống Số Điện Thoại
                            </div>
                        </div>

                    </div>
                    <hr class="mb-4">
                    <button class="btn btn-success btn-lg btn-block" type="submit">Đặt Hàng Ngay</button>
                </form>
            </div>
        </div>

        <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="mb-1">&copy; Shoppee</p>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Đạt</a></li>
                <li class="list-inline-item"><a href="#">Quân</a></li>
                <li class="list-inline-item"><a href="#">Châu</a></li>
            </ul>
        </footer>
    </div>

</body>

</html>
