@extends('frontend.layouts.app')
@section('title', 'Rute ' . $detailLayanan->title)
@section('excerpt', $detailLayanan->intro)
@section('image', $detailLayanan->image)
@section('content')

    <!-- breadcrumbs start-->
    <section style="background-color:#040b16" class="breadcrumbs">
        <div class="container">
            <div class="text-left breadcrumbs-item"><a href="{{ route('beranda') }}">home</a>
                <i>/</i><a href="javascript:void(0)" class="last"><span>Detail Jasa</span> Transportasi</a>
                <h2><span>{{ $detailLayanan->title }}</span> </h2>
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
                        <img src="{{ Storage::disk('s3')->url($detailLayanan->image) }}" alt="">
                    </ul>
                </div>
                <h4 class="mb-20 mt-30" style="font-size: 26px; color: #040b16">Layanan Transportasi
                    {{ $detailLayanan->title }}
                </h4>
                <div class="row">
                    <div class="col-md-12">
                        <p class="mb-20 mt-3"><i class="flaticon-suntour-car">&ensp;<a
                                    href="#"><strong>{{ $detailLayanan->jenisLayanan->title }}</strong></a></i>
                        </p>
                        <p class="mb-15" style="color: #040b16; font-weight: 600">{{ $detailLayanan->intro }} </p>
                        <p class="mb-15">{!! $detailLayanan->content !!}</p>

                    </div>
                </div>
            </section>
            <!-- ! section portfolio item-->

            <!-- widget post-->
            <section class="page-section mb-0 pt-0 pb-50">
                <div class="cws-widget">
                    <div class="widget-post">
                        <h2 class="widget-title alt" style="margin: 0 0 10px 0;">Jadwal Keberangkatan
                            <span>Transportasi</span>
                        </h2>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="bg-gray-3 p-30-40">
                                    {{-- @if ($detailLayanan->jadwal_berangkat > 0)
                                <p><small style="font-weight: 500;font-size: 14px">{!!
                                        $detailLayanan->jadwal_berangkat
                                        !!}</small></p>
                                @else
                                <p>
                                <ul>
                                    <li>
                                        <span class="name" data-wfid="7705c0cd873a:65437ae74de6">
                                            <span class="innerContentContainer" style="font-weight: 500;">
                                                Dapat dinegosiasikan dengan menghubungi customer service
                                                Ramatrans Travel.
                                            </span>
                                        </span>
                                    </li>
                                </ul>
                                </p>
                                @endif --}}
                                    PAGI : {{ $detailLayanan->jam_pagi }} <br>
                                    SIANG : {{ $detailLayanan->jam_siang }} <br>
                                    SORE : {{ $detailLayanan->jam_sore }} <br>
                                    MALAM : {{ $detailLayanan->jam_malam }} <br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- ! widget post-->

            <!-- widget post-->
            @if ($detailLayanan->fasilitas->count())
                <section class="page-section mb-0 pt-0 pb-50">
                    <div class="cws-widget">
                        <div class="widget-post">
                            <h2 class="widget-title alt" style="margin: 0 0 10px 0;">Fasilitas <span>Transportasi</span>
                            </h2>
                            <div class="row">
                                @foreach ($detailLayanan->fasilitas as $fasilitas)
                                    <div class="col-md-4">
                                        <!-- item recent post-->
                                        <div class="item-recent clearfix">
                                            <div class="widget-post-media"><img
                                                    src="{{ Storage::disk('s3')->url($fasilitas->image) }}"
                                                    data-at2x="{{ Storage::disk('s3')->url($fasilitas->image) }}" alt>
                                            </div>
                                            <h3 class="title"><a href="#">
                                                    {{ $fasilitas->nama_fasilitas }}</a>
                                            </h3>
                                            <div class="date-recent"> {{ $fasilitas->description }}</div>
                                        </div>
                                        <!-- ! item recent post-->
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </section>
            @endif
            <!-- ! widget post-->

            <!-- widget post-->
            @if ($detailLayanan->rute_berangkat > 0)
                <section class="page-section mb-0 pt-0 pb-50">
                    <div class="cws-widget">
                        <div class="widget-post">
                            <h2 class="widget-title alt" style="margin: 0 0 10px 0;">Waktu dan Rute
                                <span>Transportasi</span>
                            </h2>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="bg-gray-3 p-30-40">
                                        <p>{!! $detailLayanan->rute_berangkat !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            @endif
            <!-- ! widget post-->

            <!-- widget post-->
            <section class="page-section mb-0 pt-0 pb-50">
                <div class="cws-widget">
                    <div class="widget-post">
                        <h2 class="widget-title alt" style="margin: 0 0 10px 0;">Pesan Dengan cara Hubungi <span>Kami</span>
                        </h2>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="bg-gray-3 p-30-40">
                                    <p class="mb-30">
                                        Hubungi kami dengan cara <strong><span
                                                class="text-uppercase">whatsApp</span></strong> ataupun <strong><span
                                                class="text-uppercase">Telepon</span></strong> pada nomor dibawah ini:
                                    </p>

                                    <!-- ! accordion-->
                                    <a href="https://api.whatsapp.com/send?phone={{ $contacts && substr($contacts->wa_1, 0, 2) == '08' ? '62' . substr($contacts->wa_1, 1) : $contacts->wa_1 }}&text=Hallo%2C%20Saya%20ingin%20memesan%20transportasi%20ini%20di%20RamaTrans%20Travel%20%3F"
                                        class="cws-button alt text-uppercase" style="font-size: 14px">whatsApp 1</a>
                                    <a href="https://api.whatsapp.com/send?phone={{ $contacts && substr($contacts->wa_2, 0, 2) == '08' ? '62' . substr($contacts->wa_2, 1) : $contacts->wa_2 }}&text=Hallo%2C%20Saya%20ingin%20memesan%20transportasi%20ini%20di%20RamaTrans%20Travel%20%3F"
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
