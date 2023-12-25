@extends('frontend.layouts.app')
@section('title', 'Hubungi ' . env('APP_NAME', 'Default Name') . ' Untuk Mendapatkan Tiket Murah')
@section('content')

    <!-- breadcrumbs start-->
    <section style="background-color:#040b16" class="breadcrumbs">
        <div class="container">
            <div class="text-left breadcrumbs-item"><a href="{{ route('beranda') }}">home</a>
                <i>/</i><a href="javascript:void(0)" class="last"><span>Kontak</span> Kami</a>
                <h2><span>Kontak Kami</span> </h2>
            </div>
        </div>
    </section>
    <!-- ! breadcrumbs end-->


    <div class="container page">
        <div class="row">
            <div class="col-md-6" data-aos="fade-right" data-aos-duration="500">
                <div class="map-wrapper" style="margin-bottom: 30px">
                    <iframe allowfullscreen=""
                        src="https://maps.google.com/maps?q={{ $contacts->lat }},{{ $contacts->lng }}&z=15&output=embed">
                    </iframe>
                </div>
            </div>
            <div class="col-md-6" data-aos="fade-left" data-aos-duration="500">
                <div class="contact-item">
                    <h4 class="title-section mt-0"><span class="font-bold">Kontak Kami</span></h4>
                    <div class="cws_divider mb-25 mt-5"></div>
                    <p class="mb-20">
                        Kontak kami jika ingin melakukan pemesanan tiket transportasi atau mengajukan beberapa pertanyaan
                        terkait pelayanan kami. Kami selalu siap 24 jam untuk melayani kebutuhan anda.
                    </p>

                    <ul class="icon">
                        <div class="row">
                            <div class="col-md-6">
                                <div>
                                    <li>
                                        <a>Nomor Telepon Travel</a><i class="flaticon-suntour-phone"></i></a>
                                    </li>
                                    <li>
                                        <a href="tel:{{ $contacts->phone_tr_1 }}">{{ $contacts->phone_tr_1 }}</a><br>
                                        @if ($contacts->phone_tr_2 > 0)
                                            <a href="tel:{{ $contacts->phone_tr_2 }}">{{ $contacts->phone_tr_2 }}</a>
                                        @else
                                            {{ null }}
                                        @endif
                                    </li>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div>
                                    <li>
                                        <a>WhatsApp<i class="flaticon-suntour-comment"></i></a>
                                    </li>
                                    <li>
                                        @if ($contacts->wa_1 > 0)
                                            <a href="https://api.whatsapp.com/send?phone={{ $contacts && substr($contacts->wa_1, 0, 2) == '08' ? '62' . substr($contacts->wa_1, 1) : $contacts->wa_1 }}&text=Hallo%2C%20Saya%20ingin%20memesan%20tiket%20perjalanan%20di%20Rama%20Trans%20Travel.%20Untuk%20pemesanannya%20bagaimana%20ya%3F"
                                                target="_blank">{{ $contacts->wa_1 }}</a>
                                        @else
                                            {{ null }}
                                        @endif
                                    </li>
                                    <li>
                                        @if ($contacts->wa_2 > 0)
                                            <a href="https://api.whatsapp.com/send?phone={{ $contacts && substr($contacts->wa_2, 0, 2) == '08' ? '62' . substr($contacts->wa_2, 1) : $contacts->wa_2 }}&text=Hallo%2C%20Saya%20ingin%20memesan%20tiket%20perjalanan%20di%20Rama%20Trans%20Travel.%20Untuk%20pemesanannya%20bagaimana%20ya%3F"
                                                target="_blank">{{ $contacts->wa_2 }} </a>
                                        @else
                                            {{ null }}
                                        @endif
                                    </li>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mt-15">
                                    <li>
                                        <a>Nomor Telepon Cargo</a><i class="flaticon-suntour-phone"></i></a>
                                    </li>
                                    <li>
                                        <a href="tel:{{ $contacts->phone_cr_1 }}">{{ $contacts->phone_cr_1 }}</a><br>
                                        @if ($contacts->phone_cr_2 > 0)
                                            <a href="tel:{{ $contacts->phone_cr_2 }}">{{ $contacts->phone_cr_2 }}</a>
                                        @else
                                            {{ null }}
                                        @endif

                                    </li>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mt-15">
                                    <li> <a href="mailto:{{ $contacts->email }}">{{ $contacts->email }}<i
                                                class="flaticon-suntour-email"></i></a></li>
                                    <li>
                                        <a>Social Media Kami</a><i class="flaticon-suntour-world"></i></a>
                                    </li>
                                    <!-- social-->
                                    <li>
                                        <div class="social-link dark2" style="margin-top: 5px">
                                            <a href="#" class="cws-social fa fa-facebook" style="font-size: 18px"></a>
                                            <a href="#" class="cws-social fa fa-instagram"
                                                style="font-size: 18px"></a>
                                            <a href="https://www.youtube.com/channel/UCY7MCn80wnrJTn219ACedYQ"
                                                target="_blank" class="cws-social fa fa-youtube-play"
                                                style="font-size: 18px"></a>
                                        </div>
                                    </li>
                                    <!-- ! social-->
                                </div>
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </div>


@endsection
