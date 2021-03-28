<?php

namespace App\Http\Controllers\Web;

use App\Models\Slider;
use App\Models\Document;
use App\Models\Training;
use App\Models\LandingPage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function index() {
        $landing = LandingPage::all();
        $slider = Slider::where('status', 1)->get();
        $training = Training::all();
        return view('pages.landing-page', [
            'heading' => findKey($landing, 'heading'),
            'subheading' => findKey($landing, 'subheading'),
            'avatar_kontak' => findKey($landing, 'avatar-kontak'),
            'name_kontak' => findKey($landing, 'name-kontak'),
            'number_kontak' => findKey($landing, 'number-kontak'),
            'tipe_kontak' => findKey($landing, 'tipe-kontak'),
            'slider' => $slider,
            'training' => $training
        ]);
    }

    public function show($month, $year, $slug) {
        $training = Training::with(['gallery' => function($q) {
            $q->where('status', 1);
        }, 'partner'])->findTraining($slug, $month, $year);
        $landing = LandingPage::all();
        $document = Document::where('training_id', $training->id)->get();
        return view('pages.show_pelatihan', [
            'avatar_kontak' => findKey($landing, 'avatar-kontak'),
            'name_kontak' => findKey($landing, 'name-kontak'),
            'number_kontak' => findKey($landing, 'number-kontak'),
            'tipe_kontak' => findKey($landing, 'tipe-kontak'),
            'training' => $training,
            'document' => $document
        ]);
    }

    public function telegram(Request $request) {
        $TELE_API = env('TELEGRAM_BOT_TOKEN', FALSE);
        $name = $request->name;
        $number = $request->number;
        $keterangan = $request->keterangan;
        $data = [
            'chat_id' => '@knowledge_admin',
            'text' => "Nama: $name \nNomor: $number \nketerangan: $keterangan"
        ];
        $response = file_get_contents("https://api.telegram.org/bot$TELE_API/sendMessage?" . http_build_query($data) );
        return redirect()->back()->with(['success' => "Berhasil kirim pesan"]);
    }
}
