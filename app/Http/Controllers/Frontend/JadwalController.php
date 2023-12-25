<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Analytics;
use App\Models\GtagManager;
use App\Models\Jadwal;
use App\Models\JenisLayanan;
use App\Models\Kontak;
use App\Models\Page;
use Illuminate\Support\Facades\URL;

class JadwalController extends Controller
{
    public function index()
    {
        $data['title'] = company_config('name');
        $data['image'] = '';
        $data['intro'] = 'Rama Trans adalah jasa Transportasi Terbaik.';
        $data['type'] = 'Home Screen';
        $data['url'] = URL::current();
        $contacts = Kontak::where('id', 1)->first();
        $tentang = Page::get()->first();
        $metades = env('APP_NAME', 'Default Name') . " memiliki jadwal yang  fleksibel dan keberangkatan yang tepat waktu.";
        $dataJadwal = Jadwal::get();
        $dataJadwalgroup = $dataJadwal->sortBy(function ($item) {
            return $item->asal;
        });
        $menuLayanan = JenisLayanan::select(['id', 'title', 'slug'])->orderBy('slug', 'ASC')->get();
        $tagManager = '';
        $seoPage = Page::where('slug', '=', 'jadwal')->first();
        $gtagManager = GtagManager::first();
        $analytics = Analytics::first();
        return view('frontend.jadwal.index', compact('data','metades','dataJadwal', 'dataJadwalgroup','contacts','tentang','menuLayanan','tagManager','seoPage','gtagManager','analytics'));
    }

}