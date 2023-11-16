@includeIf('frontend.header')
@extends('layouts.master')

<head>
    <link rel="icon" href="{{ asset('images/logo0.png') }}">
    <title>Chủ Đề Bài Viết</title>
    <link rel="stylesheet" type="text/css" href="topic.css">

    <style>
        .how-bor1 {
            margin-bottom: 80px;
            /* Thay đổi giá trị này để điều chỉnh khoảng cách giữa các ảnh */
        }

        .nav-pills .nav-link {
            border: 1px solid #070707;
            /* Thêm đường viền cho mỗi nút */
            padding: 10px;
            /* Thêm khoảng trắng xung quanh nút */
            margin-bottom: 10px;
            /* Khoảng cách giữa các nút */
            border-radius: 5px;
            /* Góc bo cho nút */
            transition: background-color 0.3s ease;
            /* Hiệu ứng màu nền khi hover */
        }

        .nav-pills .nav-link:hover {
            background-color: #333;
            /* Màu nền khi hover */
            color: #fff;
            /* Màu chữ khi hover */
        }
    </style>
</head>

<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{ asset('dist/img/topic.png') }}');">
    <h2 class="ltext-105 cl0 txt-center" style="color:#33FFFF ;">
        Chủ đề bài viết
    </h2>
</section>

<div class="container">
    <hr style="border: 1px solid #070707; color: #333; margin: 20px 0;">
</div>

<section class="bg0 p-t-75 p-b-120">
    <div class="container">
        <div class="row p-b-148 clearfix">
            <div class="col-md-3">
                <ul class="nav nav-pills flex-column">
                    @foreach ($topics as $topic)
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0);"
                                onclick="showPosts({{ $topic->id }})">{{ $topic->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-9">
                @foreach ($topics as $topic)
                    <div id="topic-{{ $topic->id }}" style="display: none;">
                        <h2 style="border-bottom: 2px solid #333; padding-bottom: 10px;">{{ $topic->name }}</h2>

                        <div class="row">
                            @foreach ($posts as $post)
                                @if ($post->topic_id == $topic->id)
                                    <div class="col-md-6">
                                        <div class="p-t-7 p-r-15-lg p-r-0-md">
                                            <h3 class="mtext-111 cl2 p-b-16">
                                                <a href="{{ route('frontend.postdetail', ['id' => $post->id]) }}">{{ $post->title }}</a>
                                            </h3>
                                            <p class="stext-113 cl6 p-b-26">
                                                {{ $post->content }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="how-bor1">
                                            <img class="product-image img-fluid"
                                                src="{{ asset('images/post/' . $post->image) }}" alt="IMG">
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        function showPosts(topicId) {
            // Ẩn tất cả các phần tử chứa bài viết
            const postContainers = document.querySelectorAll('[id^="topic-"]');
            postContainers.forEach(container => {
                container.style.display = 'none';
            });

            // Hiển thị phần tử chứa bài viết tương ứng với chủ đề được chọn
            const selectedContainer = document.getElementById(`topic-${topicId}`);
            selectedContainer.style.display = 'block';
        }
    </script>
</section>
<div class="pagination justify-content-center">
    {{ $posts->links() }}
</div>
