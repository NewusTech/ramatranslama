<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('frontend-assets') }}/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('frontend-assets') }}/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('frontend-assets') }}/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('frontend-assets') }}/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('frontend-assets') }}/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('frontend-assets') }}/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('frontend-assets') }}/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('frontend-assets') }}/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('frontend-assets') }}/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"
        href="{{ asset('frontend-assets') }}/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ asset('frontend-assets') }}/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96"
        href="{{ asset('frontend-assets') }}/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ asset('frontend-assets') }}/favicon/favicon-16x16.png">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" href="{{ url('frontend-assets/css/reset.css') }}">
    <link rel="stylesheet" href="{{ url('frontend-assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ url('frontend-assets/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ url('frontend-assets/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ url('frontend-assets/css/jquery.fancybox.css') }}">
    <link rel="stylesheet" href="{{ url('frontend-assets/fonts/fi/flaticon.css') }}">
    <link rel="stylesheet" href="{{ url('frontend-assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ url('frontend-assets/css/indent.css') }}">
    <link rel="stylesheet" href="{{ url('frontend-assets/rs-plugin/css/settings.css') }}">
    <link rel="stylesheet" href="{{ url('frontend-assets/rs-plugin/css/layers.css') }}">
    <link rel="stylesheet" href="{{ url('frontend-assets/rs-plugin/css/navigation.css') }}">
    <link rel="stylesheet" href="{{ url('frontend-assets/css/custom.css') }}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    {{-- meta syukron488@gmail.com --}}
    <title>
        Percayakan {!! env('APP_NAME', 'Default Name') !!} untuk berlibur bersama keluarga.
    </title>
    @if (trim($__env->yieldContent('excerpt')))
        <meta name="description" content="@yield('excerpt')">
    @elseif(isset($metades))
        <meta name="description" content="{{ $metades }}">
    @elseif(isset($seoPage) && isset($seoPage->meta_desc))
        <meta name="description" content="{{ $seoPage->meta_desc }}">
        {{-- @else
        <meta name="description"
            content="Nikmati perjalanan Jakarta-Lampung yang nyaman dan aman bersama Rama Tranz Travel. Pesan tiket sekarang dan jelajahi keindahan kedua destinasi"> --}}
    @endif
    <meta name="keywords" content="{{ isset($dataSeo) ? $dataSeo['keywords'] : 'travel jakarta lampung' }}">
    <meta name="author" content="Rama Tranz Lampung">
    <meta property="og:locale" content="en_US">
    <meta property="og:site_name" content="{{ isset($dataSeo) ? $dataSeo['site_title'] : 'Rama Tranz Travel' }}">
    @if (trim($__env->yieldContent('image')))
        <meta property="og:image" content="{{ Storage::disk('public')->url('') }}@yield('image') ">
    @else
        <meta property="og:image"
            content="{{ isset($seoPage->media) ? Storage::disk('public')->url($seoPage->media) : 'https://ramatranzlampung.com/frontend-assets/img/logo-1.png' }} ">
    @endif
    <meta property="og:image:width" content="240">
    <meta property="og:image:height" content="90">
    <meta property="og:type" content="website">
    <meta property="og:title"
        content="@if (trim($__env->yieldContent('title'))) @yield('title')- @endif {{ isset($dataSeo) ? $dataSeo['site_title'] : 'Rama Tranz Travel' }} - {{ isset($dataSeo) ? $dataSeo['title'] : 'Travel resmi dan terpercaya' }}">
    <meta property="og:description"
        content="{{ isset($seoPage) ? $seoPage->meta_desc : 'Nikmati perjalanan Jakarta-Lampung yang nyaman dan aman bersama Rama Tranz Travel. Pesan tiket sekarang dan jelajahi keindahan kedua destinasi' }}">
    <meta property="fb:app_id" content="">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="{{ isset($dataSeo) ? $dataSeo['site_title'] : 'Rama Tranz Travel' }}">
    <meta name="twitter:title"
        content="@if (trim($__env->yieldContent('title'))) @yield('title')- @endif {{ isset($dataSeo) ? $dataSeo['site_title'] : 'Rama Tranz Travel' }} - {{ isset($dataSeo) ? $dataSeo['title'] : 'Travel resmi dan terpercaya' }}">
    <meta name="twitter:description"
        content="{{ isset($seoPage) ? $seoPage->meta_desc : 'Nikmati perjalanan Jakarta-Lampung yang nyaman dan aman bersama Rama Tranz Travel. Pesan tiket sekarang dan jelajahi keindahan kedua destinasi' }}">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title"
        content="@if (trim($__env->yieldContent('title'))) @yield('title')- @endif {{ isset($dataSeo) ? $dataSeo['site_title'] : 'Rama Tranz Travel' }} - {{ isset($dataSeo) ? $dataSeo['title'] : 'Travel resmi dan terpercaya' }}">
    @if (trim($__env->yieldContent('image')))
        <meta name="msapplication-TileImage" content="{{ Storage::disk('public')->url('') }}@yield('image') ">
    @else
        <meta name="msapplication-TileImage"
            content="{{ isset($seoPage->media) ? Storage::disk('public')->url($seoPage->media) : 'https://ramatranzlampung.com/frontend-assets/img/logo-1.png' }}">
    @endif
    <link rel="manifest" href="{{ asset('frontend-assets') }}/favicon/manifest.json">
    <link rel="apple-touch-icon"
        href="{{ isset($dataSeo) ? Storage::disk('public')->url($dataSeo['image']) : 'https://ramatranzlampung.com/frontend-assets/img/logo-1.png' }}">
    <link rel="shortcut icon" type="image/png"
        href="{{ isset($dataSeo) ? Storage::disk('public')->url($dataSeo['image']) : 'https://ramatranzlampung.com/frontend-assets/favicon/favicon-96x96.png' }}">
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    @if (isset($gtagManager))
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id={{ $gtagManager->code }}" height="0"
                width="0" style="display:none;visibility:hidden"></iframe></noscript>
    @endif
    <!-- End Google Tag Manager (noscript) -->
    <div class="floating-container">
        <div class="floating-button"><img src="{{ url('frontend-assets/pic/facility/chat1.png') }}"
                data-at2x="{{ url('frontend-assets/pic/facility/chat1.png') }}" width="30" alt=""></div>
        <div class="label-container">
            <div class="label-text">Hubungi Kami</div>
            <i class="fa fa-play label-arrow"></i>
        </div>
        <div class="element-container">
            <a href="https://api.whatsapp.com/send?phone={{ $contacts && substr($contacts->wa_2, 0, 2) == '08' ? '62' . substr($contacts->wa_2, 1) : $contacts->wa_2 }}&text=Hallo%2C%20Saya%20ingin%20memesan%20tiket%20perjalanan%20di%20Rama%20Trans%20Travel.%20Untuk%20pemesanannya%20bagaimana%20ya%3F"
                class="bg-color" target="_blank">
                <span class="float-element tooltip-left a-tag">
                    <i class="flaticon-suntour-comment"></i>
                    <span class="info">WhatsApp 2</span>
                </span>
            </a>
            <a href="https://api.whatsapp.com/send?phone={{ $contacts && substr($contacts->wa_1, 0, 2) == '08' ? '62' . substr($contacts->wa_1, 1) : $contacts->wa_1 }}&text=Hallo%2C%20Saya%20ingin%20memesan%20tiket%20perjalanan%20di%20Rama%20Trans%20Travel.%20Untuk%20pemesanannya%20bagaimana%20ya%3F"
                class="bg-color" target="_blank">
                <span class="float-element tooltip-left a-tag">
                    <i class="flaticon-suntour-comment"></i>
                    <span class="info">WhatsApp 1</span>
                </span>
            </a>
            <a href="tel:{{ $contacts->phone_tr_2 }}" class="bg-color">
                <span class="float-element a-tag">
                    <i class="flaticon-suntour-phone"></i>
                    <span class="info">Telepon 2</span>
                </span>
            </a>
            <a href="tel:{{ $contacts->phone_tr_2 }}" class="bg-color">
                <span class="float-element a-tag">
                    <i class="flaticon-suntour-phone"></i>
                    <span class="info">Telepon 1</span>
                </span>
            </a>
        </div>
    </div>
    <div class="blur-bg"></div>


    @if (Request::is('/'))
        {{ null }}
    @else
        <!-- header page-->
        @include('frontend.layouts.header')
        <!-- ! header page-->
    @endif

    <!-- content page-->
    <div class="content-body">
        <section>
            <div class="content-body">
                <div class="container">
                    <h1 class="text-center pt-3" style="font-size: 18px">Penilaian Pelayanan</h1>
                    <h2 class="text-center" style="font-size: 18px">Rama Tranz Travel</h2>
                    <p style="display: none;">
                        1. Kemudahan dan Kenyamanan

                        Jasa travel memberikan kemudahan dan kenyamanan yang luar biasa bagi pelancong modern. Dari
                        pemesanan
                        tiket
                        online hingga penjemputan di depan pintu rumah, agen perjalanan berusaha untuk membuat
                        perjalanan
                        seefisien
                        mungkin. Layanan ini membebaskan pelancong dari kerumitan perencanaan detail perjalanan,
                        memungkinkan
                        mereka
                        untuk fokus pada pengalaman dan petualangan yang menanti di tempat tujuan.

                        2. Ragam Destinasi

                        Salah satu keunggulan utama jasa travel adalah ragam destinasi yang dapat diakses oleh
                        pelancong. Dari
                        kota-kota metropolitan yang sibuk hingga pulau terpencil, agen perjalanan menawarkan paket
                        perjalanan
                        yang
                        mencakup berbagai pilihan destinasi. Ini memungkinkan para pelancong untuk menyesuaikan
                        pengalaman
                        mereka
                        sesuai dengan preferensi pribadi, menjadikan setiap perjalanan sebagai kisah unik yang tak
                        terlupakan.

                        3. Paket Liburan

                        Jasa travel seringkali menawarkan paket liburan yang komprehensif, mencakup tiket pesawat,
                        akomodasi,
                        dan
                        seringkali tur lokal. Paket semacam itu tidak hanya memudahkan perjalanan tetapi juga dapat
                        menghemat
                        waktu
                        dan uang bagi pelancong. Para pelancong dapat memilih paket yang sesuai dengan anggaran mereka,
                        memastikan
                        bahwa mereka mendapatkan nilai yang optimal untuk setiap dolar yang diinvestasikan dalam
                        petualangan
                        mereka.

                        4. Memajukan Pariwisata Lokal

                        Jasa travel berperan penting dalam memajukan sektor pariwisata lokal. Dengan membawa sejumlah
                        besar
                        pelancong ke destinasi tertentu, mereka memberikan dorongan ekonomi yang signifikan melalui
                        pengeluaran
                        wisatawan untuk makanan, belanja, dan pengalaman lokal. Ini tidak hanya menguntungkan industri
                        pariwisata,
                        tetapi juga dapat menciptakan peluang pekerjaan baru dan meningkatkan taraf hidup komunitas
                        lokal.

                        5. Fasilitas dan Layanan Tambahan

                        Selain tiket pesawat dan akomodasi, jasa travel juga menawarkan berbagai fasilitas dan layanan
                        tambahan.
                        Mulai dari penyewaan mobil hingga tur petualangan, pelancong dapat dengan mudah menambahkan
                        elemen
                        tambahan
                        ke rencana perjalanan mereka. Ini membuka pintu untuk pengalaman yang lebih kaya dan mendalam,
                        memungkinkan
                        pelancong untuk menyesuaikan perjalanan mereka sesuai dengan minat dan keinginan pribadi.

                        Kesimpulan

                        Dengan mempertimbangkan kemudahan, kenyamanan, dan manfaat ekonomi yang ditawarkan, jasa travel
                        memainkan
                        peran kunci dalam memfasilitasi eksplorasi dunia. Dari destinasi populer hingga tempat-tempat
                        terpencil
                        yang
                        belum dijelajahi, agen perjalanan memungkinkan setiap individu untuk menemukan pesona dunia
                        dengan cara
                        yang
                        paling sesuai dengan kebutuhan dan keinginan mereka. Oleh karena itu, merencanakan perjalanan
                        dengan
                        bantuan
                        jasa travel tidak hanya tentang perpindahan dari satu tempat ke tempat lain, tetapi juga tentang
                        membangun
                        kenangan seumur hidup.</p>


                    <div id="notification"></div>
                    <form id="formReview" method="POST" enctype="multipart/form-data"
                        action="{{ url('input-review') }}">
                        @csrf
                        <div class="modal-body">
                            @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <!-- Display error message -->
                            @if (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <div class="form-group pb-1">
                                <label>Name</label>
                                <input type="text" id="name_review" name="name_review" class="form-control" />
                                @error('name_review')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group pb-1">
                                <label>No. HP</label>
                                <input type="text" id="no_hp" name="no_hp" class="form-control" />
                                @error('no_hp')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group pb-1">
                                <label>Komentar</label>
                                <textarea id="input_review" name="input_review" rows="4" cols="50" class="form-control"></textarea>
                                @error('input_review')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group pb-1">
                                <label>Rating</label>
                                <br>
                                <div class="star-rating">
                                    <span class="star" data-rating="1"></span>
                                    <span class="star" data-rating="2"></span>
                                    <span class="star" data-rating="3"></span>
                                    <span class="star" data-rating="4"></span>
                                    <span class="star" data-rating="5"></span>
                                    <input type="hidden" name="rating_review" id="rating_review">
                                </div>
                                @error('rating_review')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group pb-1">
                                <label for="image">Foto (Opsional)</label>
                                <input type="file" id="image_review" name="image_review" class="form-control"
                                    accept="image/*">
                            </div>
                            <div class="text-center mb-3">
                                <button type="submit" class="btn btn-success" style="display: inline-block;"
                                    id="submitReview">Submit</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>

    <!-- ! content page-->

    @if (Request::is('/'))
        {{ null }}
    @else
        <!-- footer-->
        @include('frontend.layouts.footer')
        <!-- ! footer-->
    @endif

    <script defer src="https://www.youtube.com/player_api"></script>
    <script type="text/javascript" src="{{ url('frontend-assets/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('frontend-assets/js/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('frontend-assets/js/bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ url('frontend-assets/js/owl.carousel.js') }}"></script>
    <script type="text/javascript" src="{{ url('frontend-assets/js/jquery.sticky.js') }}"></script>
    <script type="text/javascript" src="{{ url('frontend-assets/js/TweenMax.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('frontend-assets/js/cws_parallax.js') }}"></script>
    <script type="text/javascript" src="{{ url('frontend-assets/js/jquery.fancybox.pack.js') }}"></script>
    <script type="text/javascript" src="{{ url('frontend-assets/js/jquery.fancybox-media.js') }}"></script>
    <script type="text/javascript" src="{{ url('frontend-assets/js/isotope.pkgd.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('frontend-assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('frontend-assets/js/masonry.pkgd.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('frontend-assets/rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('frontend-assets/rs-plugin/js/jquery.themepunch.revolution.min.js') }}">
    </script>
    <script type="text/javascript"
        src="{{ url('frontend-assets/rs-plugin/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
    <script type="text/javascript"
        src="{{ url('frontend-assets/rs-plugin/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
    <script type="text/javascript"
        src="{{ url('frontend-assets/rs-plugin/js/extensions/revolution.extension.navigation.min.js') }}"></script>
    <script type="text/javascript"
        src="{{ url('frontend-assets/rs-plugin/js/extensions/revolution.extension.parallax.min.js') }}"></script>
    <script type="text/javascript"
        src="{{ url('frontend-assets/rs-plugin/js/extensions/revolution.extension.video.min.js') }}"></script>
    <script type="text/javascript"
        src="{{ url('frontend-assets/rs-plugin/js/extensions/revolution.extension.actions.min.js') }}"></script>
    <script type="text/javascript"
        src="{{ url('frontend-assets/rs-plugin/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
    <script type="text/javascript"
        src="{{ url('frontend-assets/rs-plugin/js/extensions/revolution.extension.migration.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('frontend-assets/js/jquery.validate.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('frontend-assets/js/jquery.form.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('frontend-assets/js/script.js') }}"></script>
    <script type="text/javascript" src="{{ url('frontend-assets/js/bg-video/cws_self_vimeo_bg.js') }}"></script>
    <script type="text/javascript" src="{{ url('frontend-assets/js/bg-video/jquery.vimeo.api.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('frontend-assets/js/bg-video/cws_YT_bg.js') }}"></script>
    <script type="text/javascript" src="{{ url('frontend-assets/js/jquery.tweet.js') }}"></script>
    <script type="text/javascript" src="{{ url('frontend-assets/js/jquery.scrollTo.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('frontend-assets/js/jquery.flexslider.js') }}"></script>
    <script type="text/javascript" src="{{ url('frontend-assets/js/retina.min.js') }}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="{{ url('frontend-assets/js/bootstrap.min.js') }} "></script>
    {{-- JS --}}
    <script>
        //<meta property="og:url" content="https://localhost/newus/ramatranzlampung/">
        var link = document.createElement('meta');
        link.setAttribute('property', 'og:url');
        link.content = document.location;
        document.getElementsByTagName('head')[0].appendChild(link);

        // <link rel="canonical" href="https://localhost/newus/ramatranzlampung">
        var canonical = document.createElement('link');
        canonical.setAttribute('rel', 'canonical')
        canonical.href = document.location
        document.getElementsByTagName('head')[0].appendChild(canonical);

        // <link rel="alternate" href="https://localhost/newus/ramatranzlampung/" hreflang="en-US">
        var alternate = document.createElement('link');
        alternate.setAttribute('rel', 'alternate')
        alternate.href = document.location
        alternate.setAttribute('hreflang', 'en-US')
        document.getElementsByTagName('head')[0].appendChild(alternate);

        $(document).ready(function() {
            $('.star-rating .star').on('click', function() {
                var rating = $(this).data('rating');
                $('#rating_review').val(rating);

                $(this).addClass('active').prevAll().addClass('active');
                $(this).nextAll().removeClass('active');
            });
        });

        $(document).ready(function() {
            $('#formReview').submit(function(e) {
                e.preventDefault();

                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(response) {
                        // Sukses
                        if (response.status === 'success') {
                            alert(response.message);

                            $('#name_review').focus();

                            $('#name_review').val('');
                            $('#no_hp').val('');
                            $('#input_review').val('');
                            $('#rating_review').val('');
                            $('#image_review').val('');
                        }
                    },

                    error: function(response) {
                        // Gagal (terjadi error validasi)
                        if (response.status === 422) {
                            var errors = response.responseJSON.errors;
                            $.each(errors, function(key, value) {
                                $('#' + key).after('<p class="text-danger">' + value[
                                    0] + '</p>');
                            });
                        } else {
                            // Tambahkan logika lainnya untuk error lainnya
                        }
                    }
                });
            });
        });
    </script>
    <!-- Google Tag Manager -->
    @if (isset($gtagManager))
        <script defer>
            (function(w, d, s, l, i) {
                w[l] = w[l] || [];
                w[l].push({
                    'gtm.start': new Date().getTime(),
                    event: 'gtm.js'
                });
                var f = d.getElementsByTagName(s)[0],
                    j = d.createElement(s),
                    dl = l != 'dataLayer' ? '&l=' + l : '';
                j.async = true;
                j.src =
                    'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
                f.parentNode.insertBefore(j, f);
            })(window, document, 'script', 'dataLayer', '{{ $gtagManager->code }}');
        </script>
    @endif
    <!-- End Google Tag Manager -->
    {{-- Analytics --}}
    @if (isset($analytics))
        <script defer src="https://www.googletagmanager.com/gtag/js?id={{ $analytics->code }}"></script>
        <script defer>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());
            gtag('config', '{{ $analytics->code }}');
        </script>
    @endif
    {{-- End Analytics --}}
    @if ($tagManager)
        <script defer src="https://www.googletagmanager.com/gtag/js?id={{ $tagManager->codeTag }}"></script>
        <script defer>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', '{{ $tagManager->codeTag }}');
        </script>
    @endif
    @yield('script')
</body>

</html>
