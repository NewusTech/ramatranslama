@extends('frontend.layouts.app')
@section('title', env('APP_NAME', 'Default Name') . ', Keberangkatan Setiap Hari')
@section('content')

    <!-- breadcrumbs start-->
    <section style="background-color:#040b16" class="breadcrumbs">
        <div class="container">
            <div class="text-left breadcrumbs-item"><a href="{{ route('beranda') }}">home</a>
                <i>/</i><a href="javascript:void(0)" class="last"><span>Jadwal </span></a>
                <h2><span>Jadwal</span> </h2>
            </div>
        </div>
    </section>
    <!-- ! breadcrumbs end-->

    <div class="content-body">
        <div class="container page">
            <section class="page-section mb-0 pt-0 pb-50">
                <h2 class="title-section mt-0 mb-0"><span>Jadwal</span></h2>

                @php
                    $groupedData = $dataJadwal->groupBy('asal');
                    $cardsPerRow = 3;
                    $previousAsal = null;
                @endphp

                @foreach ($groupedData as $asal => $items)
                    @php
                        $itemsChunks = $items->chunk($cardsPerRow);
                    @endphp

                    @foreach ($itemsChunks as $chunk)
                        @if ($asal != $previousAsal)
                            <div class="row">
                                <div class="col-xs-12">
                                    <p style="font-size: 16px; font-weight: 500; margin: 0px; padding: 0px">Dari
                                        {{ $asal }}</p>
                                </div>
                            </div>
                        @endif

                        <div class="row">
                            @foreach ($chunk as $item)
                                <div class="col-xs-12 col-sm-4" style="margin-bottom: 5px">
                                    <div class="mx-2 mb-1"
                                        style="border: 1px solid #ddd; border-radius: 4px; overflow: hidden; padding: 10px">
                                        <img src="{{ url('frontend-assets/img/bg-landing.jpg') }}" alt="..."
                                            width="100%" height="170px">
                                        <div>
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <div class="row">
                                                        <div class="col-xs-8">
                                                            <p
                                                                style="font-size: 13px; margin: 0px; padding: 0px; font-weight: 600">
                                                                {{ $item->asal }} - {{ $item->tujuan }}
                                                            </p>
                                                            <p
                                                                style="font-size: 13px; margin: 0px; padding: 0px; font-weight: 600">
                                                                Waktu Jemput = {{ $item->mulai_jemput }}
                                                            </p>
                                                        </div>
                                                        <div class="col-xs-4 text-right">
                                                            <p
                                                                style="color: #00cc00; font-size: 13px; margin: 0px; padding: 0px; font-weight: 600">
                                                                Rp. {{ number_format($item->harga, 2, '.', ',') }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        @php
                            $previousAsal = $asal;
                        @endphp
                    @endforeach
                @endforeach


            </section>
        </div>
    </div>

@endsection
