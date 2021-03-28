<?php

namespace App\Http\Controllers\Web;

use App\Models\Gallery;
use App\Models\Partner;
use App\Models\Training;
use App\Models\RawDetail;
use Illuminate\Http\Request;
use App\Traits\ImageHandlerTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateGalleryRequest;
use App\Http\Requests\CreatePartnerRequest;
use App\Http\Requests\UpdateGalleryRequest;
use App\Http\Requests\UpdatePartnerRequest;
use App\Models\Document;
use App\Models\Faq;

class DetailMateriController extends Controller
{
    use ImageHandlerTrait;
    private $pathImage = "upload/gallery/";
    private $pathImagePartner = "upload/partner/";
    
    public function show($month, $year, $slug)
    {
        $training = Training::findTraining($slug, $month, $year);
        $raw_detail = RawDetail::all();
        return view('pages.dashboard.materi.show', compact('training', 'raw_detail', 'slug', 'month', 'year'));
    }

    public function create(Request $request, $month, $year, $slug, $type) {
        if($type == 'partner') {
            return $this->index_partner($request, $month, $year, $slug);
        } else if($type == 'gallery') {
            return $this->index_gallery($request, $month, $year, $slug);
        } else if($type == 'document') {
            return $this->index_document($request, $month, $year, $slug);
        } else if($type == 'faq') {
            return $this->index_faq($request, $month, $year, $slug);
        } else {
            abort(404);
        }
    }

    public function index_gallery(Request $request, $month, $year, $slug) {
        $training = Training::findTraining($slug, $month, $year);
        $raw_data = RawDetail::where('code', 'gallery')->first();
        $gallery = Gallery::where('training_id', $training->id)->latest()->paginate(10);
        $data = $request->all();
        $type = 'gallery';
        return view('pages.dashboard.gallery.index', compact('training', 'type', 'gallery', 'data', 'raw_data', 'slug', 'month', 'year'));
    }

    public function create_gallery($month, $year, $slug) {
        return view('pages.dashboard.gallery.create', compact('slug', 'month', 'year'));
    }

    public function store_gallery(CreateGalleryRequest $request) {
        try {
            $training = Training::findTraining($request->slug, $request->month, $request->year);
            if($request->hasFile('image')) {
                $image = $this->uploadImage($request, $this->pathImage);
            }
            Gallery::create([
                'training_id' => $training->id,
                'image' => $image ?? '',
                'status' => $request->status
            ]);
            return redirect()->route('dashboard.detail_materi.create', [
                'slug' => $request->slug,
                'year' => $request->year,
                'month' => $request->month,
                'jenis' => 'gallery'
            ])->with(['success' => "Barhasil menambah gallery"]);
        } catch(\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function status_gallery($id, $status) {
        $gallery = Gallery::find($id);
        $gallery->update([
            'status' => $status
        ]);
        return redirect()->route('dashboard.detail_materi.create',[
            'slug' => $gallery->training->slug,
            'year' => $gallery->training->year,
            'month' => $gallery->training->month,
            'jenis' => 'gallery'
        ])->with(['success' => "Berhasil update gallery"]);
    }

    public function edit_gallery($id) {
        $gallery = Gallery::with(['training'])->find($id);
        return view('pages.dashboard.gallery.update', compact('gallery'));
    }

    public function update_gallery(UpdateGalleryRequest $request, $id) {
        try {
            $gallery = Gallery::find($id);
            if($request->hasFile('image')) {
                $this->unlinkImage($this->pathImage, $gallery->image);
                $image = $this->uploadImage($request, $this->pathImage);
            }
            $gallery->update([
                'image' => $image ?? '',
                'status' => $request->status
            ]);
            return redirect()->route('dashboard.detail_materi.create', [
                'slug' => $gallery->training->slug,
                'year' => $gallery->training->year,
                'month' => $gallery->training->month,
                'jenis' => 'gallery'
            ])->with(['success' => "Barhasil update gallery"]);
        } catch(\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy_gallery($id) {
        $gallery = Gallery::find($id);
        if($gallery->image != '') {
            $this->unlinkImage($this->pathImage, $gallery->image);
        }
        $slug = $gallery->training->slug;
        $year = $gallery->training->year;
        $month = $gallery->training->month;
        $gallery->delete();
        return redirect()->route('dashboard.detail_materi.create',[
            'slug' => $slug,
            'year' => $year,
            'month' => $month,
            'jenis' => 'gallery'
        ])->with(['success' => "Berhasil hapus gallery"]);
    }

    public function index_partner(Request $request, $month, $year, $slug) {
        $training = Training::findTraining($slug, $month, $year);
        $raw_data = RawDetail::where('code', 'partner')->first();
        $partner = Partner::where('training_id', $training->id)->latest()->paginate(10);
        $data = $request->all();
        $type = 'partner';
        return view('pages.dashboard.partner.index', compact('training', 'type', 'partner', 'data', 'raw_data', 'slug', 'month', 'year'));
    }

    public function create_partner($month, $year, $slug) {
        return view('pages.dashboard.partner.create', compact('slug', 'month', 'year'));
    }

    public function store_partner(CreatePartnerRequest $request) {
        try {
            $training = Training::findTraining($request->slug, $request->month, $request->year);
            if($request->hasFile('image')) {
                $image = $this->uploadImage($request, $this->pathImagePartner);
            }
            Partner::create([
                'training_id' => $training->id,
                'image' => $image ?? '',
                'name' => $request->name,
                'description' => $request->description
            ]);
            return redirect()->route('dashboard.detail_materi.create', [
                'slug' => $request->slug,
                'year' => $request->year,
                'month' => $request->month,
                'jenis' => 'partner'
            ])->with(['success' => "Barhasil menambah partner kerja"]);
        } catch(\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function edit_partner($id) {
        $partner = Partner::with(['training'])->find($id);
        return view('pages.dashboard.partner.update', compact('partner'));
    }

    public function update_partner(UpdatePartnerRequest $request, $id) {
        try {
            $partner = Partner::find($id);
            if($request->hasFile('image')) {
                $this->unlinkImage($this->pathImagePartner, $partner->image);
                $image = $this->uploadImage($request, $this->pathImagePartner);
            }
            $partner->update([
                'image' => $image ?? $partner->image,
                'name' => $request->name,
                'description' => $request->description
            ]);
            return redirect()->route('dashboard.detail_materi.create', [
                'slug' => $partner->training->slug,
                'year' => $partner->training->year,
                'month' => $partner->training->month,
                'jenis' => 'partner'
            ])->with(['success' => "Barhasil update partner kerja"]);
        } catch(\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy_partner($id) {
        $partner = Partner::find($id);
        if($partner->image != '') {
            $this->unlinkImage($this->pathImagePartner, $partner->image);
        }
        $slug = $partner->training->slug;
        $year = $partner->training->year;
        $month = $partner->training->month;
        $partner->delete();
        return redirect()->route('dashboard.detail_materi.create',[
            'slug' => $slug,
            'year' => $year,
            'month' => $month,
            'jenis' => 'partner'
        ])->with(['success' => "Berhasil hapus partner kerja"]);
    }

    public function index_document(Request $request, $month, $year, $slug) {
        $training = Training::findTraining($slug, $month, $year);
        $raw_data = RawDetail::where('code', 'gallery')->first();
        $document = Document::where('training_id', $training->id)->latest()->paginate(10);
        $data = $request->all();
        $type = 'document';
        return view('pages.dashboard.document.index', compact('training', 'type', 'document', 'data', 'raw_data', 'slug', 'month', 'year'));
    }


    public function index_faq(Request $request, $month, $year, $slug) {
        $training = Training::findTraining($slug, $month, $year);
        $faq = Faq::where('training_id', $training->id)->get();
        $type = 'faq';
        return view('pages.dashboard.faq.index', compact('training', 'faq', 'type', 'slug', 'month', 'year'));
    }

    public function faq_show($id) {
        $faq = Faq::find($id);
        return view('pages.dashboard.faq.show', compact('faq', 'id'));
    }

    public function faq_update(Request $request, $id) {
        $faq = Faq::find($id);
        $faq->update([
            'faq' => $request->faq
        ]);
        return redirect()->route('dashboard.detail_materi.create',[
            'slug' => $faq->training->slug,
            'year' => $faq->training->year,
            'month' => $faq->training->month,
            'jenis' => 'faq'
        ]);
    }
}
