<?php
use App\Models\Slider; 
$list = Slider::all(); 
?>
<style>
    .layer-slick1 .ltext-101 {
    color: #ff0000; /* Thay đổi màu của "Mẫu HOT 2023" */
}

.layer-slick1 .ltext-201 {
    color: #00ff00; /* Thay đổi màu của tiêu đề */
}

.layer-slick1 a {
    background-color: #00a2ff; /* Thay đổi màu nền của nút "Mua ngay" */
    color: #ffffff; /* Thay đổi màu chữ của nút "Mua ngay" */
}

</style>
<section class="section-slide">
    <div class="wrap-slick1">
        <div class="slick1">
            <?php $index = 1; ?>
            @isset($list)
                @foreach ($list as $slider)
                    @if ($index == 1)
                        <div class="item-slick1 active" style="background-image: url(images/slider/{{ $slider->image }});">
                    @else
                        <div class="item-slick1" style="background-image: url(images/slider/{{ $slider->image }});">
                    @endif
                    <div class="container h-full">
                        <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                            <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
                                <span class="ltext-101 cl2 respon2">
                                    Mẫu HOT 2023
                                </span>
                            </div>

                            <div class="layer-slick1 animated visible-false" data-appear="rotateInUpRight" data-delay="800">
                                <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1" style="text-transform: capitalize;">
                                    {{ $slider->title }}
                                </h2>
                            </div>

                            <div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
                                <a href=" " class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                    Mua ngay
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $index++; ?>
                @endforeach
            @endisset
        </div>
    </div>
</section>