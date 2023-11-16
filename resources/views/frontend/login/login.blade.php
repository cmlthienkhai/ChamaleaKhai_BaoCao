<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('dist/css/login1.css') }}">
    <link rel="icon" href="{{ asset('images/logo0.png') }}">
    <style>
        #background-login {
            background-image: url("dist/img/Football0.png");
            background-repeat: no-repeat;
            background-position: center center;
            background-size: cover;
            height: 800px;
            width: 100%;
            background-color: #ee4d2d;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>


<header>
    <div class="container">
        <div class="row p-4">
            <div class="col">
                <div class="d-inline mt-3">
                    <img class="brand-img mr-2 img-fluid" src="{{ asset('images/logo0.png') }}"
                        style="width: 50px; height: 50px; border-radius: 5px;" alt="" />
                    <span class="text-brand"><a
                            href="{{ URL::TO('http://localhost/WEB/chamaleakhai0027_cdtt/public') }}"
                            class="text-brand text-decoration-none fs-4"
                            style="color: #2d97ee; font-weight: bold;"><i>Football</i><b>TK</b></a></span>
                </div>

            </div>
            <div class="col">
                <p class="text-end mt-3" style="color: #2da1ee;;">Bạn cần giúp đỡ ?</p>
            </div>
        </div>
    </div>
</header>

<body>

    <div id="background-login">
        <div class="form-container container-fluid">
            <div class="text-start fs-3 ms-5 mt-3">Đăng Nhập</div>
            <form action="{{ route('frontend.post-login') }}" method="post">
                @csrf
                <div class="form-group">

                    <input type="text" name="username" id="username"
                        placeholder="Email/Số điện thoại/Tên Đăng Nhập">
                </div>
                <div class="form-group">
                    <input type="password" name="password" id="password" placeholder="Mật Khẩu">

                    <?php
                    use Illuminate\Support\Facades\Session;
                    
                    $message = Session::get('message');
                    if ($message) {
                        echo "<p id='canhbao'>$message</p>";
                        Session::put('message', null); //chỉ cho message hiển thị một lần thôi
                    }
                    ?>
                </div>
                <input type="submit" value="Đăng Nhập">
                <div class="row">
                    <div class="col">
                        <small class="mx-5 text-primary">Quên mật khẩu</small>
                        <small class="mx-5 text-primary">Đăng nhập bằng SMS</small>
                    </div>
                    <div style="display: flex; justify-content: center; align-items: center;">
                        <hr style="flex-grow: 1;">
                        <small style="padding: 0 10px;">HOẶC</small>
                        <hr style="flex-grow: 1;">
                    </div>
                </div>
                
                    <p class="d-inline">Bạn mới biết đến FootballTK Store?</p>
                    <a href="{{ route('frontend.sigup') }}" class="text-decoration-none">Đăng kí</a>
               
            </form>
        </div>
    </div>
</body>

</html>
