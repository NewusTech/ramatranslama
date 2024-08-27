@extends('frontend.layouts.app')
@section('title',env('APP_NAME', 'Default Name') . ' Terpercaya, Terbaik, dan Termurah - 1')
@section('content')

    <div class="content-body">
        <div class="tp-banner-container">
            <div class="tp-banner-slider">
                <ul>
                    @foreach ($carousel as $slider)
                        <li data-masterspeed="700" data-slotamount="7" data-transition="fade">
                            <img src="{{ url('frontend-assets/rs-plugin/assets/loader.gif') }}"
                                data-lazyload="{{ Storage::disk('s3')->url($slider->image) }}" loading="lazy">
                            <div class="tp-caption sl-content"
                                data-transform_in="y:-150px;opacity:0;s:1500;e:Power3.easeInOut;"
                                data-transform_out="y:150px;opacity:0;s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                                data-start="400">
                                <p class="sl-title-top">{{ $slider->title_top }}</p>
                                <div class="sl-title">{{ $slider->title }}</div>
                                <div class="sl-title-bot">{{ $slider->title_bot }}
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        
        <!-- <div class="tp-banner-container text-center">
            <div class="card-header">
                Featured
            </div>
            <img src="img/carbgg.jpg" style="width:100%; height:30vh">
            <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            </div>
        </div> -->

        <!-- Modal Booking-->
        <div class="modal fade" id="modalBookingIndex" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitle">Booking #<span id="titlelayanan"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ url('order-store') }}" method="POST" enctype="multipart/form-data"
                        onsubmit="return formSubmitIndex()">
                        @csrf
                        <div class="modal-body">
                            <div id="msgError" class="alert alert-danger" style="display:none"></div>
                            <!-- {{-- <form> --}} -->
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" placeholder="Nama" id="name" name="name"
                                    class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>No. Hp</label>
                                <input type="number" placeholder="" id="telp" name="telp"
                                    class="form-control newus-form-number" />
                            </div>
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input type="date" id="date" name="date" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>Waktu</label>
                                <select id="time" name="time" class="form-control">
                                    <option value="" disabled selected>--Pilih Waktu--</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Rute</label>
                                <input type="text" id="rute" name="rute" readonly class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>Tempat Duduk</label>
                                <input type="text" placeholder="Contoh : 1 Orang" id="numberorder" name="numberorder"
                                    class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>Titik Jemput</label>
                                <input type="text" id="location" name="location"
                                    placeholder="Contoh = Permata Kost - Jl. Swakarya 1 no. H-28A Rt. 09 RW 02 Dwikora II"
                                    class="form-control" />
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Modal -->

        {{-- RUTE --}}
        <section class="newus-rute-index">
            <div class="content-body">
                <div class="container" style="padding-bottom: 12px;">
                    <h2 class="title-section mb-5" style="font-size: 20px"><span>Pilih Rute </span>Transportasi</h2>
                    <div class="search-hotels mb-40 pattern">
                        <div class="tours-container">
                            <div class="tours-box">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form method="get" class="form search" action="{{ route('tarif') }}">
                                            <div class="tours-search">
                                                <div class="col-md-3 col-sm-12 newus-filter-rute">
                                                    <div class="selection-box">
                                                        <i class="flaticon-suntour-map box-icon"></i>
                                                        <select id="asal" name="asal"
                                                            class="country_to_state country_select" style="width: 80%">
                                                            <option selected disabled>Berangkat dari...</option>
                                                            @foreach ($asals as $item)
                                                                <option value="{{ $item }}">{{ $item }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <i class="fa fa-times" id="clearAsal"></i>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-sm-12 newus-filter-rute">
                                                    <div class="selection-box">
                                                        <i class="flaticon-suntour-map box-icon"></i>
                                                        <select id="tujuan" name="tujuan" class=""
                                                            style="width: 80%">
                                                            <option selected disabled>Tujuan...</option>
                                                            @foreach ($tujuans as $item)
                                                                <option value="{{ $item }}">{{ $item }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <i class="fa fa-times" id="clearTujuan"></i>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-sm-12 newus-filter-rute">
                                                    <div class="selection-box">
                                                        <i class="fa fa-clock-o box-icon"></i>
                                                        <select name="jam" id="jam" style="width: 80%">
                                                            <option value="" selected disabled>-- Pilih Waktu --
                                                            </option>
                                                            <option value="08.00">08.00</option>
                                                            <option value="12.00">12.00</option>
                                                            <option value="15.00">15.00</option>
                                                            <option value="17.00">17.00</option>
                                                            <option value="19.00">19.00</option>
                                                            <option value="20.00">20.00</option>
                                                        </select>
                                                        <i class="fa fa-times" id="clearJam"></i>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn
                                                    @if (env('APP_NAME') == 'Rama Tranz Lampung')
                                                        
                                                        btn-primary
                                                    @else
                                                        btn-warning
                                                    @endif" 
                                                    style="border: 0; width: 10%;">Cari
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if ($layanan->count())
                        <div class="row section-home available-car">
                            <div>
                                @foreach ($layanan as $layanans)
                                <a href="{{ route('detail-jasa-transportasi.jasaId', $layanans->slug) }}">
                                    <div class="col-md-4 col-sm-12 mb-1"
                                        style="border: 1px solid #ebeaea; border-radius: 2px; overflow: hidden; padding: 10px">
                                        <div class="acr-box">
                                            <div class="acr-box-in">
                                                <div class="acr-img">
                                                    <img src="{{ Storage::disk('s3')->url($layanans->image) }}"
                                                        alt="you might like">
                                                </div>
                                                <div class="acr-content">
                                                    <div class="ct-name">{{ $layanans->title }}</div>
                                                    <div class="ct-cost">
                                                        <div class="jadwal-jemput">
                                                            <h4>Jadwal Jemput</h4>
                                                            <table class="tabel-jadwal-jemput">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>PAGI</td>
                                                                        <td>:</td>
                                                                        <td>{{ $layanans->jam_pagi ? $layanans->jam_pagi : '-' }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>SIANG</td>
                                                                        <td>:</td>
                                                                        <td>{{ $layanans->jam_siang ? $layanans->jam_siang : '-' }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>SORE</td>
                                                                        <td>:</td>
                                                                        <td>{{ $layanans->jam_sore ? $layanans->jam_sore : '-' }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>MALAM</td>
                                                                        <td>:</td>
                                                                        <td>{{ $layanans->jam_malam ? $layanans->jam_malam : '-' }}
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>

                                                    <div class="ct-reserve">
                                                        <a class="btn 
                                                            @if (env('APP_NAME') == 'Rama Tranz Lampung')
                                                                btn-primary
                                                            @else
                                                                
                                                                btn-warning
                                                            @endif
                                                            details-button text-white"
                                                            data-toggle="modal" data-item="{{ $layanans }}"
                                                            data-target="#modalBookingIndex">Pesan</a>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="acr-bg">
                                                <img src="{{ Storage::disk('s3')->url($layanans->image) }}">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                @endforeach
                            </div>
                        </div>
                        <div class="pb-5">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md">
                                        <a href="{{ route('tarif') }}" class=" btn
                                                    @if (env('APP_NAME') == 'Rama Tranz Lampung')  
                                                        btn-warning
                                                    @else
                                                    btn-primary  
                                                    @endif">Selengkapnya
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="main">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="470" height="290" viewBox="0 0 470 290">
                                <defs>
                                    <path class="fundo" id="prefix__a"
                                        d="M5.063 128.67c-2.513 15.192 5.633 31.093 17.898 38.941 5.99 3.832 13.34 6.528 16.471 13.254 4.868 10.452-3.879 22.437-13.113 28.515-9.236 6.078-20.5 10.9-24.704 21.683-2.771 7.108-1.685 15.387 1.058 22.507 10.06 26.112 39.393 37.547 65.479 36.15 26.086-1.396 50.827-12.407 76.416-18.075 87.873-19.465 180.005 24.717 267.728 4.47 13.65-3.151 27.4-8.081 37.943-17.99 11.883-11.167 18.632-28.016 19.65-45.023.97-16.225-4.34-34.495-17.744-41.806-7.834-4.273-17.196-4.1-25.7-1.774-5.43 1.483-10.767 3.808-16.369 3.848-5.601.038-11.763-3-13.386-8.808-1.707-6.107 2.182-12.41 6.642-16.577 9.072-8.474 21.203-12.707 29.441-22.126 7.927-9.063 11.264-22.574 8.574-34.716-2.692-12.141-11.326-22.538-22.188-26.715-27.683-10.645-57.844 18.377-86.152 9.873-2.101-.63-4.312-1.605-5.418-3.641-1.08-1.988-.834-4.51-.214-6.716 3.468-12.348 16.939-20.21 17.528-33.102.32-7.008-3.504-13.564-8.325-18.251-33.126-32.2-81.125 6.102-114.9 18.194-55.542 19.884-112.157 36.49-167.849 55.963-20.81 7.275-44.91 18.606-48.766 41.922z" />
                                </defs>
                                <g fill="none" fill-rule="evenodd">
                                    <path fill="#FFF" d="M0 0H1366V800H0z" transform="translate(-448 -157)" />
                                    <g transform="translate(-448 -157) translate(448 157)">
                                        <mask id="prefix__b" fill="#fff">
                                            <use xlink:href="#prefix__a" />
                                        </mask>
                                        <use fill="#F6F6F7" xlink:href="#prefix__a" />
                                        <path fill="#EDEDF0" fill-rule="nonzero" d="M-14.199 211.2H481.36V301.2H-14.199z"
                                            mask="url(#prefix__b)" />
                                        <g class="paes">
                                            <g class="pao-baixo">
                                                <path fill="#FBB965"
                                                    d="M2.79 131.737s-2.073 3.155-2.479 6.868c-.406 3.713-.747 9.666 1.24 13.372 1.985 3.707 12.69 20.8 65.175 21.02 53.15.225 69.188-15.685 70.59-18.977 2.605-6.118 1.838-21.327.06-22.283-1.777-.956-44.044-3.204-72.446-4.057-28.402-.854-49.872-1.968-62.14 4.057"
                                                    transform="translate(161 68)" />
                                                <path fill="#E6A95F"
                                                    d="M34.648 167.758c-8.863-1.526-23.515-6.939-30.292-14.218-6.775-7.28-2.096-8.803 3.508-5.387 5.605 3.415 24.569 11.557 54.124 12.263 29.555.706 61.424-6.946 72.2-17.053 0 0 2.705-1.47 2.768 1.509.062 2.98.428 7.948-2.769 10.507-3.196 2.558-34.805 23.526-99.54 12.379"
                                                    transform="translate(161 68)" />
                                                <path fill="#FFDA7F"
                                                    d="M5.679 131.837c-6.522 1.646-.275 6.91 9.492 12.14 9.767 5.229 28.24 10.257 44.267 10.015 16.028-.243 37.48-.481 52.543-5.333 15.06-4.852 16.223-9.55 17.998-13.298 1.774-3.748-107.32-7.809-124.3-3.524"
                                                    transform="translate(161 68)" />
                                            </g>
                                            <g class="pao-cima">
                                                <path fill="#FBB868"
                                                    d="M71.37 0C49.008.035-2.43.631 1.18 51.16c0 0-.018 10.84 62.825 10.84 62.844 0 72.591-9.633 73.721-11.173C142.284 44.623 147.583-.117 71.37 0"
                                                    transform="translate(161 68)" />
                                                <path fill="#E6A95F"
                                                    d="M34.552 61c-7.628-1.006-23.98-2.904-27.586-5.506-3.606-2.604-7.448-2.895-5.39-10.826.842-3.242 7.976-.619 11.264.839 3.289 1.458 21.239 6.047 42.989 6.673 21.75.625 57.126-1.679 67.42-5.458 9.806-3.598 13.662-7.027 15.493-5.228 2.396 2.351 1.687 8.008-4.913 12.215-6.252 3.985-27.53 7.2-49.434 7.76-21.904.56-38.604 1.012-49.843-.469"
                                                    transform="translate(161 68)" />
                                                <path fill="#FFEAD4"
                                                    d="M45.508 13.114c-.368.549-.54 1.598-.503 2.445.017.392.297.604.45.287.143-.297.222-.617.303-.978.087-.387.197-.735.238-1.15.042-.44-.257-.95-.488-.604M42.092 9.016c-.694.13-1.446.61-1.774 1.098-.168.248-.3.512-.317.792-.017.313.154.503.29.776.249.494 1.245.392 1.22-.162-.014-.274.33-.612.54-.817.367-.361.75-.62.923-1.075.154-.404-.413-.7-.882-.612M51.621 9.247c-.182-.409-.68-.325-.615.364.063.687.007 1.485.25 2.067.19.458.694.473.737-.25.043-.759-.109-1.592-.372-2.181M32.55 15.101c-1.206.547-1.849 1.662-1.414 2.552.188.384 1.21.504 1.46.077.188-.32.407-.629.616-.942.243-.363.63-.675.767-1.064.173-.486-.753-.93-1.43-.623M29.793 9.012c-.26-.108-.498.532-.62.942-.166.565-.205 1.033-.149 1.674.053.59.424.405.493-.048-.002.014.102-.302.138-.4.093-.247.18-.497.262-.76.113-.359.144-1.297-.124-1.408M38.384 6.056c-.737-.211-1.406.211-1.881.674-.53.514-.607 1.19-.39 1.829.167.5 1.09.632 1.326.096.127-.285.31-.53.533-.764.304-.32.72-.44.944-.848.237-.429-.053-.85-.532-.987M21.722 10.101c-.484-.28-1.16.08-1.542.378-.57.444-.957.924-1.152 1.628-.21.764.802 1.182 1.296.663.4-.42.901-.746 1.308-1.172.319-.334.594-1.205.09-1.497M23.513 15.078c-.385.414-.505 1.566-.513 2.381-.005.47.333.749.47.35.206-.592.422-1.34.517-2.047.082-.598-.253-.921-.474-.684M38.964 14.6c-.26-.324-1.293-.581-2.192-.6-.626-.012-.971.28-.65.452.459.244 1.155.57 2.063.547.56-.014.936-.205.78-.4M51.58 3.028c-.54-.1-.912.074-1.399.401-.45.304-.83.813-1.092 1.395-.344.76.386 1.437.866 1.076.662-.5 1.41-.857 1.914-1.641.255-.397.126-1.152-.29-1.23M66.234 9c-.923 0-2.062.305-2.227.708-.074.182.437.384.836.247.537-.185 1.29-.187 1.832-.364.59-.193.337-.591-.441-.591M60.589 9.375c-.101-.522-.482-.493-.556.048-.12.852.102 1.815.423 2.412.213.396.543.02.544-.494.002-.736-.283-1.302-.411-1.966M69.955 3.569c-.44-.473-1.713-.712-2.727-.479-.37.085-.24.315.044.396.601.173 1.168.408 1.848.503.49.069 1.042-.199.835-.42M73.956 10.626c-.231-.836-.735-1.255-1.316-1.507-.24-.104-.5-.147-.75-.1-.148.028-.273.063-.407.161-.032.022-.373.238-.223.161-.282.148-.382.791-.057.979.117.067.22.24.333.325.168.128.336.247.508.364.327.219.564.609.873.868.537.45 1.27-.42 1.04-1.251M66.549 15.017c-.83-.233-.486 2.056-.435 2.528.055.51.678.664.741.08.068-.628.42-2.405-.306-2.608M54.803 16.301c-.065-.347-.1-.709-.19-1.038-.107-.393-.44-.32-.532.052-.186.746-.052 2.313.405 2.636.225.16.545-.077.512-.623-.024-.375-.13-.676-.195-1.027M39.534 21.024c-.423.212-.58 1.352-.523 2.174.066.946.664 1.13.785.144.065-.538.22-1.041.203-1.612-.016-.528-.238-.82-.465-.706M15.946 21.201c-.04-.142-.134-.197-.214-.2-.311-.02-.464.621-.576 1.05-.124.468-.188.945-.14 1.461.053.562.486.699.57.088.053-.375.146-.754.233-1.107.108-.439.265-.815.127-1.292M14.918 16.274c-.067-.169-.25-.279-.46-.274-.571.015-1.05.232-1.55.61-.562.422-.976 1.023-.899 1.675.081.697.993.942 1.574.476.407-.326.746-.755 1.058-1.149.364-.462.441-.923.277-1.338M62.906 5.209c-.447-.277-1.34-.251-1.957-.083-.279.077-.57.172-.738.298-.069.051-.108.105-.15.16-.025.038-.037.076-.038.115.043.077.042.09-.003.037-.154.243.622.357.925.173.227-.051.444-.104.705-.13.521-.054 1.021-.089 1.286-.315.092-.078.088-.182-.03-.255M52.906 8.291c-.191-.24-.402-.204-.634-.28-.218-.073-.326.255-.245.491.117.34.438.509.697.497.26-.01.37-.472.182-.708M80.437 1.283c-.385-.22-.844-.327-1.272-.266-.497.071-.7.363-1.033.724-.356.388.07 1.143.54.93l-.065-.083c.095.05.192.08.295.09.177.032.31.074.477.16.373.189.702.503 1.023.78.348.301 1.738.788 1.586-.245-.141-.963-.789-1.652-1.551-2.09M78.955 8.082c-.134-.55-.259-1.126-.366-1.703-.102-.548-.457-.476-.541.05-.073.453-.057.877.01 1.331.083.548.286.874.512 1.17.11.144.276.048.357-.132.097-.215.088-.476.028-.716M87.395 8c-.77.016-1.317.338-2.032.43-.505.065-.477.525.046.56.713.047 1.359-.082 2.053-.14.468-.04 1.35.253 1.516-.164.191-.483-.906-.7-1.583-.685M81.958 14.767c-.103-.44-.306-.8-.377-1.279-.095-.644-.518-.678-.57.063-.07.998.19 1.845.53 2.34.293.426.566-.494.417-1.124M99.918 9.365c-.177-.18-.36-.23-.56-.337-.295-.16-.508.405-.225.646.181.155.805.626.863.04.012-.119-.003-.273-.078-.349M93.308 4.792c-.387-.436-.932-.682-1.466-.78-.809-.145-1.17 1.02-.47 1.477.65.427 1.772 2.34 2.503 1.097.376-.641-.178-1.356-.567-1.794M91.498 10.138c-.32.55-.428 1.334-.494 2.18-.043.546.266.928.442.494.21-.512.38-1.126.522-1.741.139-.605-.204-1.393-.47-.933M103.977 8.863c-.265-1.177-1.477-2.153-2.51-1.784-.548.195-.653 1.156-.104 1.442.294.153.53.397.762.655.326.36.549.611.988.784.564.223.992-.535.864-1.097M100.988 4.781c.03-.437-.169-.702-.568-.724-.906-.33-1.89.849-2.3 1.608-.47.873.538 1.63 1.223 1.22.683-.406 1.786-1.108 1.645-2.104M110.532 7.06c-.238-.218-.568.203-.463.619l.012.045c-.01.096-.001.204 0 .297 0 .14-.016.294-.025.434-.012.181-.043.357-.053.539-.013.245.016.45.06.612.091.33.32.515.53.304.108-.11.286-.37.335-.709.04-.276.058-.554.07-.836.024-.568-.189-1.052-.466-1.306M108.458 14.127c-.434-.548-.995-.921-1.662-1.103-.746-.203-1.116.933-.445 1.28.216.11.4.251.557.443.204.248.42.648.672.84.348.262.868.645 1.249.23.437-.478-.064-1.305-.37-1.69M117.71 13.184c-.282.276-.558.555-.852.815-.143.126-.333.256-.446.42-.108.156-.174.34-.284.489-.392.535.193 1.412.694.973.104-.091.318-.086.446-.134.16-.062.324-.11.486-.169.51-.186.872-.578 1.145-1.11.418-.816-.553-1.907-1.188-1.284M97.93 18.019c-.834-.165-1.209.791-.697 1.348.495.538 1.83 2.49 2.627 1.2.636-1.034-1.044-2.373-1.93-2.548M124.69 17.006c-.372.072-.428.396-.629.626-.202.23.139.496.376.3.22-.181.506-.403.559-.676.032-.168-.129-.285-.307-.25M115.979 19.839c-.079-.499-.153-.976-.264-1.445-.205-.86-.853-.174-.689.73.089.49.148.982.25 1.46.196.907.849.182.703-.745M78.957 24.496c.068-.31.05-.616-.02-.91-.077-.321-.14-.65-.183-1.002-.099-.82-.671-.76-.736.076-.056.71.019 1.361.23 1.918.132.348.265.461.467.377-.18.076.075.038.116.016.071-.038.117-.183.135-.33.01-.08.063-.472-.009-.145M61.924 22.403c-.057-.057-.16-.13-.189-.2-.132-.33-.73-.229-.735.1-.004.27.047.533.379.665.186.073.458.02.543-.14l.027-.053c.06-.114.083-.266-.025-.372M106.798 22.22c-.107-.292-.757-.304-.794.028-.032.293.107.618.488.731.229.068.532-.032.507-.257-.021-.186-.137-.329-.201-.502M70.884 28.197c-.13-.291-.716-.24-.83.025-.131.304-.034.606.41.754.101.033.24.034.334-.012.326-.16.181-.553.086-.767"
                                                    transform="translate(161 68)" />
                                                <g class="olhos">
                                                    <path fill="#633"
                                                        d="M51.976 32.505c.27 2.748-1.735 5.197-4.476 5.47-2.748.274-5.199-1.732-5.476-4.48-.27-2.748 1.735-5.197 4.483-5.47 2.748-.274 5.192 1.733 5.469 4.48M93.976 28.505c.27 2.748-1.735 5.197-4.483 5.47-2.748.273-5.192-1.733-5.469-4.48-.27-2.748 1.735-5.197 4.483-5.47 2.748-.274 5.192 1.733 5.469  4.48M65.03 45.127c2.1-5.726 9.106-6.606 13.113-2.171.408.462-.277 1.204-.725.77-3.981-3.892-9.17-2.951-11.83 1.745-.187.333-.68-.002-.558-.344 "
                                                        transform="translate(161 68)" />
                                                </g>
                                            </g>
                                        </g>
                                        <g fill-rule="nonzero" stroke="#979797" stroke-linecap="round"
                                            stroke-width="1.8" class="left-sparks">
                                            <path d="M23.684 5.789L30 1.158" transform="rotate(-90 157 13)" />
                                            <path d="M0 5.789L6.316 1.158"
                                                transform="rotate(-90 157 13) matrix(-1 0 0 1 6.316 0)" />
                                            <path d="M15.789 4.632L15.789 0" transform="rotate(-90 157 13)" />
                                        </g>
                                        <g fill-rule="nonzero" stroke="#979797" stroke-linecap="round"
                                            stroke-width="1.8" class="right-sparks">
                                            <path d="M23.684 5.789L30 1.158" transform="matrix(0 -1 -1 0 318 170)" />
                                            <path d="M0 5.789L6.316 1.158"
                                                transform="matrix(0 -1 -1 0 318 170) matrix(-1 0 0 1 6.316 0)" />
                                            <path d="M15.789 4.632L15.789 0" transform="matrix(0 -1 -1 0 318 170)" />
                                        </g>
                                        <path fill="#4B4B62" class="path" fill-rule="nonzero" stroke="#4B4B62"
                                            stroke-width="2"
                                            d="M198.754 186c1.56 0 2.246-.703 2.246-2.3v-41.4c0-1.597-.686-2.3-2.246-2.3h-9.608c-1.56 0-2.247.703-2.247 2.3v19.678h-5.802c-1.185 0-1.934-.83-1.934-2.172V142.3c0-1.597-.686-2.3-2.246-2.3h-9.67c-1.56 0-2.247.703-2.247 2.3v22.425c0 7.283 3.244 10.606 11.355 10.606H186.9v8.369c0 1.597.687 2.3 2.247 2.3h9.608zm32.277 1c15.3 0 18.969-5.248 18.969-13.056V152.12c0-7.808-3.67-13.12-18.969-13.12-15.3 0-19.031 5.312-19.031 13.12v21.824c0 7.808 3.732 13.056 19.031 13.056zm.969-12c-4.25 0-5-1.27-5-2.986v-17.091c0-1.652.75-2.923 5-2.923 4.313 0 5 1.27 5 2.923v17.09c0 1.716-.688 2.987-5 2.987zm62.754 11c1.56 0 2.246-.703 2.246-2.3v-41.4c0-1.597-.686-2.3-2.246-2.3h-9.608c-1.56 0-2.247.703-2.247 2.3v19.678h-5.802c-1.185 0-1.934-.83-1.934-2.172V142.3c0-1.597-.686-2.3-2.246-2.3h-9.67c-1.56 0-2.247.703-2.247 2.3v22.425c0 7.283 3.244 10.606 11.355 10.606H282.9v8.369c0 1.597.687 2.3 2.247 2.3h9.608z" />
                                    </g>
                                </g>
                            </svg>

                        </div>
                        <div class="text-center">
                            <h2 class="blog-title">Opps!</h2>
                            <div class="recom-price"><span class="font-4"
                                    style="font-weight: 600; text-transform: capitalize">Data
                                    tidak ditemukan!...</span>
                            </div>
                            <div class="recom-price"><span class="font-4">Sepertinya belum ada data yang diunggah pada
                                    halaman
                                    ini.</span>
                            </div>

                        </div>
                    @endif
                </div>
            </div>
        </section>
        {{-- END RUTE --}}

        <!-- page section-->
        <section class="page-section pb-0">
            <div class="container">
                <div class="row" data-aos="fade-up" data-aos-duration="500">
                    <div class="col-md-12" style="margin-bottom:40px">
                        <h6 class="title-section-top font-4">Lokasi</h6>
                        <h2 class="title-section"><span>Loket RamaTranz</span> Travel</h2>
                        <div class="cws_divider mb-25 mt-5"></div>
                        <p>Loket Ramatranz Travel tersebar di beberapa provinsi untuk memudahkan mobilitas Anda</p>
                    </div>
                    <div class="col-md-4">
                    </div>
                </div>
            </div>

            <div class="features-tours-full-width" data-aos="fade-up" data-aos-duration="600">
                <div class=" features-tours-wrap clearfix">
                    @foreach ($parentOutlet as $outlet)
                        <div class="features-tours-item">
                            <div class="features-media"><img class="img-loket lazy-load" loading="lazy" alt="parent"
                                    data-src="{{ Storage::disk('s3')->url($outlet->image) }}">
                                <div class="features-info-top">
                                </div>
                                <div class="features-info-bot">
                                    <h4 class="title"><span class="font-4">Lokasi</span> {{ $outlet->nama_provinsi }}
                                    </h4>
                                    <a href="{{ route('locationId', $outlet->slug) }}" class="button 
                                        @if (env('APP_NAME') == 'Rama Tranz Lampung')
                                            btn-primary
                                        @else
                                            
                                            btn-warning
                                        @endif">Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- ! page section-->

        <!-- section features-->
        <section class="page-section pb-70 bg-gray-3">
            <div class="container">
                <div class="row" data-aos="zoom-in" data-aos-duration="500">
                    <div class="col-md-12">
                        <h6 class="title-section-top font-4">Layanan</h6>
                        <h2 class="title-section"><span>Terbaik Kami</span></h2>
                        <div class="cws_divider mb-25 mt-5"></div>
                        <p>Dengan armada terbaru dan tenaga profesional, kami siap mengantarkan ke kota tujuan dengan Aman
                            dan Nyaman. </p>
                    </div>
                </div>
                <div class="row" data-aos="zoom-in" id="newus-layanan-terbaik" data-aos-duration="600">
                    <!-- service item-->
                    @foreach ($unggulan as $item)
                        <div class="col-sm-4 mb-40">
                            <div class="service-item icon-right color-icon"><i
                                    class="{{ $item->icon }} cws-icon type-1 color-2"></i>
                                <h3>{{ $item->title }}</h3>
                                <p class="mb-0">{{ $item->desc }} </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- ! section features-->

        <!-- page section about-->
        <section class="page-section pb-0">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 lazy-load" data-aos="fade-right" data-aos-duration="500"><img loading="lazy"
                            alt="tentang" data-src="{{ Storage::disk('s3')->url($tentang->media) }}" alt
                            class="mt-minus-20 lazy-load" style="width: 100%"></div>
                    <div class="col-md-6" data-aos="fade-left" data-aos-duration="500">
                        <!-- section title-->
                        <h2 class="title-section mt-0 mb-0"><span>{{ $tentang->title }}</span></h2>
                        <!-- ! section title-->
                        <div class="cws_divider with-plus short-3 mb-20 mt-10"></div>
                        <p class="mb-20">{!! $tentang->short_description !!}</p>
                        <p class="mb-30">{!! $tentang->content !!}</p>
                        <a href="{{ route('kontak-kami') }}" class="btn
                                                    @if (env('APP_NAME') == 'Rama Tranz Lampung')  
                                                        btn-warning
                                                    @else
                                                    btn-primary  
                                                    @endif alt mt-30 mb-30">Hubungi Kami</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- ! page section about-->

        <!-- recomended section-->
        <section class="small-section bg-gray-3">
            <div class="container">
                <div class="row" data-aos="fade-right" data-aos-duration="500">
                    <div class="col-md-12">
                        <h6 class="title-section-top font-4">Layanan</h6>
                        <h2 class="title-section"><span>Ramatranz</span> Travel</h2>
                        <div class="cws_divider mb-25 mt-5"></div>
                        <p>Nikmati berbagai layanan Ramatrans Travel yang akan memudahkan Anda</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12 d-flex flex-wrap justify-content-between">
                        @foreach ($jenisLayanan as $layanan)
                            <div class="col-lg-3 col-md-6 col-sm-12 mb-4 p-5">
                                <div class="card" style="border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); overflow: hidden;">
                                    <a href="{{ route('layananCategoryId', $layanan->slug) }}">
                                        <img class="card-img-top" loading="lazy" 
                                            src="{{ Storage::disk('s3')->url($layanan->media) }}" 
                                            alt="{{ $layanan->title }}" 
                                            style="border-bottom: 1px solid #ddd;">
                                            
                                    </a>
                                    <div class="card-body text-center" style="background-color: #f8f9fa; padding: 20px;">
                                        <p class="card-text" style="font-size: 1rem; font-weight: 500; color: #333;">
                                            <a href="{{ route('layananCategoryId', $layanan->slug) }}" class="text-dark" style="text-decoration: none;">
                                                {{ $layanan->title }}
                                            </a>
                                        </p>
                                        <p class="card-text" style="font-size: 1rem;">
                                            <a href="{{ route('layananCategoryId', $layanan->slug) }}" class="text-dark" style="text-decoration: none;">
                                            Paket unggulan RamaTranz Travel

                                            </a>
                                        </p>
                                        <a href="https://api.whatsapp.com/send?phone={{ $hq && substr($hq->phone_1, 0, 2) == '08' ? '62' . substr($hq->phone_1, 1) : $hq->phone_1 }}&text=Hallo%2C%20Saya%20ingin%20memesan%20tiket%20perjalanan%20di%20Rama%20Trans%20Travel.%20Untuk%20pemesanannya%20bagaimana%20ya%3F"
                                            target="_blank" 
                                            class="btn 
                                            @if (env('APP_NAME') == 'Rama Tranz Lampung') 
                                                btn-primary 
                                            @else 
                                                btn-warning 
                                            @endif"
                                            style="margin-top: 10px; padding: 10px 20px;">
                                            Pesan
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- ! recomended section-->

        <!-- testimonials section-->
        <section class="small-section cws_prlx_section bg-blue-40" style="background-color: #040b16">
            <div class="container">
                <div class="row" data-aos="fade-right" data-aos-duration="500">
                    <div class="col-md-12">
                        <h6 class="title-section-top font-4">Feedback</h6>
                        <h2 class="title-section alt-2"><span>Review</span> Pelanggan</h2>
                        <div class="cws_divider mb-25 mt-5"></div>
                    </div>
                </div>
                <div class="row" data-aos="fade-left" data-aos-duration="500">
                    <!-- testimonial carousel-->
                    <div class="owl-three-item">
                        <!-- testimonial item-->
                        @foreach ($feedback as $feedItem)
                            <div class="testimonial-item">
                                <div class="testimonial-top">
                                    @if ($feedItem->image)
                                        <div class="author"> <img loading="lazy" class="lazy-load"
                                                data-src="{{ Storage::disk('s3')->url($feedItem->image) }}"
                                                alt="feedback" style="width: 120px;height: 120px;"></div>
                                    @endif
                                </div>
                                <!-- testimonial content-->
                                <div class="testimonial-body">
                                    <h5 class="title"><span>{{ $feedItem->title }}</span></h5>
                                    <div class="stars stars-{{ $feedItem->rating }}"></div>
                                    <p class="align-center">{{ $feedItem->desc }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- ! testimonials section-->

        <!-- gallery section-->
        <section class="small-section">
            <div class="container">
                <div class="row" data-aos="fade-right" data-aos-duration="500">
                    <div class="col-md-12">
                        <h6 class="title-section-top font-4">Koleksi</h6>
                        <h2 class="title-section"><span>Galeri</span> Foto</h2>
                        <div class="cws_divider mb-25 mt-5"></div>
                        <p class="mb-30"></p>
                    </div>
                </div>

                <!-- Swiper -->
                <div class="row portfolio-grid">
                    <div class="body">
                        <div class="swiper mySwiper" style="padding-bottom: 60px">
                            <div class="swiper-wrapper">
                                @foreach ($gallery as $photo)
                                    <div class="swiper-slide" style="width: 300px; height: 300px;">
                                        <a href="{{ Storage::disk('s3')->url($photo->image) }}" class="fancy">
                                            <div class="portfolio-media"><img
                                                    data-src="{{ Storage::disk('s3')->url($photo->image) }}"
                                                    alt="gallery" loading="lazy" class="lazy-load">
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
                <!-- Swiper JS -->
            </div>

            <div class="container">
                <div class="text-center mb-4">
                    <h2 class="sa-title popcat">Blog</h2>
                    <p class="heading-info">Rama Tranz Travel, Melayani travel jakarta lampung</p>
                </div>

                <div class="row">
                    @foreach ($blogs as $blog)
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                <img src="{{ Storage::disk('s3')->url($blog->image) }}" class="card-img-top" alt="{{ $blog->title }}">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">
                                        <a href="{{ route('detail-blog.blogId', $blog->slug) }}" class="text-primary">
                                            {{ $blog->title }}
                                        </a>
                                    </h5>
                                    <p class="card-text">{{ Str::limit($blog->excerpt, 95, '...') }}</p>
                                    <a href="{{ route('detail-blog.blogId', $blog->slug) }}" class="btn btn-primary mt-auto">
                                        Read More
                                    </a>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">{{ $blog->published_at }}</small>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="text-center mt-4">
                    <a href="{{ url('/blog') }}" class="btn btn-warning">Selengkapnya</a>
                </div>
            </div>
            <!-- End of Section 4 -->
        </section>
        <!-- ! gallery section-->

       

        <!-- gallery section-->
        <section class="small-section" style="padding-top: 0px">
            <div class="container">
                <div class="row" data-aos="fade-right" data-aos-duration="500">
                    <div class="col-md-12">
                        <h6 class="title-section-top font-4">RamaTrans Travel</h6>
                        <h2 class="title-section"><span>Frequently Asked Questions</span> (FAQ)</h2>
                        <div class="cws_divider mb-25 mt-5"></div>
                        <p>Beberapa hal yang biasanya ditanyakan</p>
                    </div>
                </div>

                <!-- toggles & accordion section-->
                <div class="element-section mb-50 mt-30">
                    <div class="row">
                        <div class="col-md-6 mb-md-30">
                            <img loading="lazy" data-src="{{ url('frontend-assets/img/faqs.svg') }}" alt="FAQ"
                                class="lazy-load" style="margin-top: -10px" width="85%" height="230px">
                        </div>
                        <div class="col-md-6 mb-md-30">
                            <div class="toggle style-2">
                                @foreach ($faqs as $faq)
                                    <div class="content-title @if ($loop->first) active @endif"> <span
                                            class="active"><i class="active-icon"></i>{{ $faq->question }}</span>
                                    </div>
                                    <div class="content">{{ $faq->answer }}</div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
                <!-- ! toggles section-->
            </div>
        </section>
        <!-- ! gallery section-->

        <!-- call out section-->
        <section class="page-section cws_prlx_section bg-white-80 pb-60 pt-60" 
        style="
        background-color: 
        @if (env('APP_NAME') == 'Rama Tranz Lampung')
            
            #007bffcc; /* Warna kuning pudar */
        @else
            #ffc107cc; /* Warna biru pudar */
        @endif">
            <div class="container">
                <div class="call-out-box">
                    <div class="call-out-wrap alt">
                        <h3 class="title-section alt-2 gray" data-aos="fade-right" data-aos-duration="500"
                            style="font-size: 23px; margin-top: 16px;">Anda
                            Butuh Bantuan?</h3>
                        <a href="{{ route('kontak-kami') }}" class="cws-button border-left large alt mb-20"
                            data-aos="fade-left" data-aos-duration="500">Hubungi Kami</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- ! call out section-->
        <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/ehi8DMG4Ci0" allowfullscreen></iframe>
        </div>

    </div>

@endsection


@section('script')
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: "auto",
            coverflowEffect: {
                rotate: 20,
                stretch: 0,
                depth: 200,
                modifier: 1,
                slideShadows: true,
            },
            loop: true,
            autoplay: {
                delay: 1200,
                disableOnInteraction: false,
            }
        });

        $(document).ready(function() {
            var asalSelect = document.getElementById('asal');
            var tujuanSelect = document.getElementById('tujuan');
            var jamSelect = document.getElementById('jam');

            $('#clearTujuan').on('click', function() {
                // Clear the selected option
                tujuanSelect.selectedIndex = 0;
                $(tujuanSelect).change();

                // fetch_data();
            });

            $('#clearAsal').on('click', function() {
                // Clear the selected option
                asalSelect.selectedIndex = 0;
                $(asalSelect).change();

                // fetch_data();
            });

            $('#clearJam').on('click', function() {
                // Clear the selected option
                jamSelect.selectedIndex = 0;
                $(jamSelect).change();

            });

            asalSelect.addEventListener('change', function() {
                // fetch_data();
            });

            tujuanSelect.addEventListener('change', function() {
                // fetch_data();
            });

            jamSelect.addEventListener('change', function() {
                // fetch_data();
            });

        });

        $(document).ready(function() {
            $(".details-button").on("click", function() {
                var itemId = $(this).data("item");
                $("#titlelayanan").text(itemId.title);
                $('#rute').val(itemId.title);
                var selectElement = $("#time");
                selectElement.empty();

                if (itemId.jam_pagi) {
                    selectElement.append($("<option></option>").attr("value", itemId.jam_pagi).text(itemId
                        .jam_pagi));
                }
                if (itemId.jam_siang) {
                    selectElement.append($("<option></option>").attr("value", itemId.jam_siang).text(itemId
                        .jam_siang));
                }
                if (itemId.jam_sore) {
                    selectElement.append($("<option></option>").attr("value", itemId.jam_sore).text(itemId
                        .jam_sore));
                }
                if (itemId.jam_malam) {
                    selectElement.append($("<option></option>").attr("value", itemId.jam_malam).text(itemId
                        .jam_malam));
                }
                console.log(itemId)
            });
        });

        $(document).on('click', '.details-button', function(e) {
            e.preventDefault();
            var item = $(this).data('item');
        })

        function formSubmitIndex(idForm) {
            var name = $('#name').val();
            var telp = $('#telp').val();
            var date = $('#date').val();
            var time = $('#time').find(":selected").val();
            var rute = $('#rute').val();

            var numberorder = $('#numberorder').val();
            var location = $('#location').val();

            if (name.trim() == '') {
                alert('Silakan isi nama terlebih dahulu.');
                $('#name').focus();
                return false;
            }

            if (telp.trim() == '') {
                alert('Silakan isi nomor hp terlebih dahulu.');
                $('#telp').focus();
                return false;
            }

            if (date.trim() == '') {
                alert('Silakan isi tanggal berangkat terlebih dahulu.');
                $('#date').focus();
                return false;
            }

            if (location.trim() == '') {
                alert('Silakan isi titik jemput terlebih dahulu.');
                $('#location').focus();
                return false;
            }

            window.open('https://api.whatsapp.com/send?phone=628117298168' + '&text=Nama%3A%20' + name +
                '+%20%0ANo.%20hp%3A%20' + telp + '%20%0ATanggal%20%3A%20' +
                date + '%20%20%0Awaktu%20%20%3A%20' + time + '%20%0ARute%20%3A%20' + rute +
                '%20%20%0ATempat%20Duduk%3A%20' + numberorder + '%0ATitik%20Jemput%3A%20' + location + '')
        }

        document.addEventListener("DOMContentLoaded", function() {
            var lazyImages = document.querySelectorAll('.lazy-load');

            var lazyLoad = function(target) {
                var io = new IntersectionObserver(function(entries, observer) {
                    entries.forEach(function(entry) {
                        if (entry.isIntersecting) {
                            var img = entry.target;
                            img.src = img.dataset.src;
                            img.classList.remove('lazy-load');
                            observer.disconnect();
                        }
                    });
                });

                io.observe(target);
            };

            lazyImages.forEach(function(img) {
                lazyLoad(img);
            });
        });
    </script>

@endsection
