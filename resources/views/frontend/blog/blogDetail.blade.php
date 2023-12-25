@extends('frontend.layouts.app')
@section('title', $detailBlog->title)
@section('excerpt', $detailBlog->excerpt)
@section('image', $detailBlog->image)
@section('content')

    <!-- breadcrumbs start-->
    <section style="background-color:#040b16" class="breadcrumbs">
        <div class="container">
            <div class="text-left breadcrumbs-item"><a href="{{ route('beranda') }}">home</a>
                <i>/</i><a href="javascript:void(0)" class="last"><span>Detail </span> Blog</a>
                <h2><span>Detail Blog</span> </h2>
            </div>
        </div>
    </section>
    <!-- ! breadcrumbs end-->

    <div class="content-body">
        <div class="container page">
            <!-- section portfolio item-->
            <section class="page-section mb-0 pt-0 pb-50">
                <div id="flex-slider" class="flexslider">
                    <ul class="slides">
                        <img src="{{ Storage::disk('s3')->url($detailBlog->image) }}" alt="">
                    </ul>
                </div>
                <h1 class="mb-20 mt-30" style="font-size: 26px; color: #040b16">
                    {{ $detailBlog->title }}
                </h1>
                <div class="row">
                    <div class="col-md-12">
                        <p class="mb-20 mt-3"><i
                                class="flaticon-suntour-calendar"></i>&ensp;{{ date('d M Y', strtotime($detailBlog->published_at)) }}
                        </p>
                        <p class="mb-15" style="color: #040b16; font-weight: 600">{{ $detailBlog->excerpt }} </p>
                        <p class="mb-15">{!! $detailBlog->content !!}</p>

                    </div>
                </div>
            </section>
            <!-- ! section portfolio item-->

            <!-- widget post-->
            <section class="page-section mb-0 pt-0 pb-50">
                <div class="cws-widget">
                    <div class="widget-post">
                        <h2 class="widget-title alt">Hubungi <span>Kami</span></h2>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="bg-gray-3 p-30-40">
                                    <p class="mb-30">
                                        Hubungi kami dengan cara <strong><span
                                                class="text-uppercase">whatsApp</span></strong> ataupun <strong><span
                                                class="text-uppercase">Telepon</span></strong> pada nomor dibawah ini:
                                    </p>

                                    <!-- ! accordion-->
                                    <a href="https://api.whatsapp.com/send?phone=08117208168&text=Hallo%2C%20Saya%20ingin%20memesan%20transportasi%20ini%20di%20RamaTrans%20Travel%20%3F"
                                        class="cws-button alt text-uppercase" style="font-size: 14px">whatsApp 1</a>
                                    <a href="https://api.whatsapp.com/send?phone=08117298168&text=Hallo%2C%20Saya%20ingin%20memesan%20transportasi%20ini%20di%20RamaTrans%20Travel%20%3F"
                                        class="cws-button alt text-uppercase" style="font-size: 14px">whatsApp 2</a>
                                    <a href="tel:08117208168" class="cws-button alt gray-dark text-uppercase"
                                        style="font-size: 14px">0811
                                        7208 168</a>
                                    <a href="tel:08117298168" class="cws-button alt gray-dark text-uppercase"
                                        style="font-size: 14px">0811 7298 168</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- ! widget post-->
        </div>
    </div>

@endsection
