@section('title')
    Football TK
@endsection
<link rel="icon" href="{{ asset('images/logo0.png') }}">
@includeIf('frontend.header')

<!-- end menu -->

<section class="body">
    <x-slide-show />

    @foreach ($list_category as $category)
        <product-frontend.product.product-list :rowcate="$category" />
    @endforeach
</section>
<br>
<div class="container">
    <hr style="border: 1px solid #070707; colorgb(8, 8, 8)333; margin: 20px 0;">
</div>
@includeIf('frontend.product.newproduct')
<br>
<div class="container">
    <hr style="border: 1px solid #070707; colorgb(8, 8, 8)333; margin: 20px 0;">
</div>
@includeIf('frontend.product.productsale')
<br>

@includeIf('frontend.footer')

@extends('layouts.master')
@includeIf('frontend.topic.topic')
