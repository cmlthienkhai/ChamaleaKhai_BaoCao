@extends('layouts.master')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>

<body>

    <style type="text/css">
        @media screen and (max-width: 600px) {
            table#cart tbody td .form-control {
                width: 20%;
                display: inline !important;
            }

            .actions .btn {
                width: 36%;
                margin: 1.5em 0;
            }

            .actions .btn-info {
                float: left;
            }

            .actions .btn-danger {
                float: right;
            }

            table#cart thead {
                display: none;
            }

            table#cart tbody td {
                display: block;
                padding: .6rem;
                min-width: 320px;
            }

            table#cart tbody tr td:first-child {
                background: #333;
                color: #fff;
            }

            table#cart tbody td:before {
                content: attr(data-th);
                font-weight: bold;
                display: inline-block;
                width: 8rem;
            }

            table#cart tfoot td {
                display: block;
            }

            table#cart tfoot td .btn {
                display: block;
            }

        }
    </style>
    <style>
        .how-bor1 {
            margin-bottom: 80px;
            /* Thay đổi giá trị này để điều chỉnh khoảng cách giữa các ảnh */
        }

        .right-align {
            float: right;
        }
    </style>
    <h2 class="text-center">Giỏ Hàng</h2>
    <div class="container">
        <table id="cart" class="table table-hover table-condensed">
            <thead>
                <tr>
                    <th style="width:50%">Tên sản phẩm</th>
                    <th style="width:10%">Giá</th>
                    <th style="width:8%">Số lượng</th>
                    <th style="width:22%" class="text-center">Thành tiền</th>
                    <th style="width:10%"> </th>
                </tr>
            </thead>
            <tbody>
                @php
                    $cart = session()->get('cart');
                    $total_price = 0;
                @endphp
                @if ($cart)
                    @foreach ($cart as $item)
                        @php
                            $gia = number_format($item['quantity'] * $item['price'], 0, ',', '.');
                            $total_price += $item['quantity'] * $item['price'];
                        @endphp
                        <tr>
                            <td data-th="Product">
                                <div class="row">
                                    <div class="col-sm-2 hidden-xs"><img src="{{ asset($item['image']) }}"
                                            alt="Sản phẩm 1" class="img-responsive" width="100">
                                    </div>
                                    <div class="col-sm-10">
                                        <h4 class="nomargin">{{ $item['name'] }}</h4>
                                        {{-- <p>{{$item['mota']}}</p>  --}}
                                    </div>
                                </div>
                            </td>
                            <td data-th="Price">{{ number_format($item['price'], 0, ',', '.') }}</td>
                            <td data-th="Quantity"><input min="1" max="10" name="quantity"
                                    class="form-control text-center" value="{{ $item['quantity'] }}" type="number">
                            </td>
                            <td data-th="Subtotal" class="text-center">{{ $gia }}</td>
                            <td class="actions" data-th="">
                                {{-- <button class="btn btn-info btn-sm"><i class="fa fa-edit"></i>
        </button> --}}
                                <form action="{{ url('trang-chu/delete-cart/' . $item['id']) }}" method="POST">
                                    @csrf
                                    {{-- @method('DELETE') --}}
                                    <button type="submit" class="btn btn-danger">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="3" class="text-right"><strong>Tổng Tiền</strong></td>
                        <td class="text-center">{{ number_format($total_price, 0, ',', '.') }}</td>
                        <td></td>
                    </tr>
                @endif
            </tbody>
            <tfoot>

                <tr>
                    <td><a href="{{ route('site.product') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i>
                            Tiếp
                            tục mua hàng</a>
                    </td>
                    <td colspan="2" class="hidden-xs"> </td>
                    {{-- <td class="hidden-xs text-center"><strong>Tổng tiền </strong> --}}
                    </td>
                    <td><a href="{{ route('pay') }}" class="btn btn-success btn-block">Thanh toán <i
                                class="fa fa-angle-right"></i></a>
                    </td>
                </tr>
            </tfoot>

        </table>
        <a href="{{ route('site.product') }}" class="btn btn-primary right-align">Quay lại</a>
    </div>
    <script src="js/jquery-1.11.1.min.js"></script>
</body>

</html>
