<?php

namespace App\Http\Controllers\Web;

use App\Models\Document;
use App\Models\Training;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Document\CreateDocumentRequest;
use App\Models\DocumentDetail;
use App\Models\DocumentSubDetail;

class DocumentController extends Controller
{
    public function store(CreateDocumentRequest $request) {
        try {
            $training = Training::findTraining($request->slug, $request->month, $request->year);
            $docuemnt = Document::create([
                'training_id' => $training->id,
                'name' => $request->name
            ]);
            return redirect()->route('dashboard.detail_materi.create', [
                'slug' => $request->slug,
                'year' => $request->year,
                'month' => $request->month,
                'jenis' => 'document'
            ])->with(['success' => "Berhasil menambah Dokumen Pelatihan"]);
        } catch(\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()])->withInput();
        }
    }

    public function show(Request $request, $id) {
        $document_asli = Document::find($id);
        $document = DocumentDetail::where('document_id', $id)->latest()->paginate(10);
        $data = $request->all();
        return view('pages.dashboard.document.show', compact('document','id', 'data', 'document_asli'));
    }

    public function store_detail(Request $request, $id) {
        $this->validate($request, [
            'type' => "required"
        ]);
        try {
            DocumentDetail::create([
                'document_id' => $id,
                'type' => $request->type
            ]);
            return redirect()->route('document.show', $id)->with(['success' => "Berhasil menambah Detail"]);
        } catch(\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()])->withInput();
        }
    }

    public function show_subdetail(Request $request, $id) {
        $document_asli = DocumentDetail::find($id);
        $document = DocumentSubDetail::with('document_detail.document')->where('document_detail_id', $id)->latest()->paginate(10);
        $data = $request->all();
        return view('pages.dashboard.document.show_subdetail', compact('document', 'data', 'id', 'document_asli'));
    }

    public function create_subdetail($id) {
        $document_asli = DocumentDetail::find($id);
        return view('pages.dashboard.document.create_subdetail', compact('id', 'document_asli'));
    }

    public function store_subdetail(Request $request, $id) {
        try {
            if($request->hasFile('file')) {
                $filename = time().'.'.$request->file->extension();  
                $request->file->move(public_path('upload/dokumen-pelatihan/'), $filename);
                $result = $filename;
            }
            DocumentSubDetail::create([
                'document_detail_id' => $id,
                'name' => $request->name,
                'file' => $result
            ]);
            return redirect()->route('document.subdetail.show', $id)->with(['success' => "Berhasil menambah dokumen"]);
        } catch(\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()])->withInput();
        }
    }

    public function destroy_document($id) {
        $document = Document::find($id);
        foreach ($document->detail as $key => $value) {
            foreach ($value->subdetail as $key2 => $value2) {
                if($value2->file != '') {
                    $file = 'upload/dokumen-pelatihan/'.$value2->file;
                    if (file_exists($file)) {
                        @unlink($file);
                    }
                }
            }
        }
        $slug = $document->training->slug;
        $year = $document->training->year;
        $month = $document->training->month;
        $document->delete();
        return redirect()->route('dashboard.detail_materi.create', [
            'slug' => $slug,
            'year' => $year,
            'month' => $month,
            'jenis' => 'document'
        ])->with(['success' => "Berhasil menghapus Dokumen Pelatihan"]);
    }

    public function destroy_document_detail($id) {
        $document = DocumentDetail::find($id);
        foreach ($document->subdetail as $key => $value) {
            if($value->file != '') {
                $file = 'upload/dokumen-pelatihan/'.$value->file;
                if (file_exists($file)) {
                    @unlink($file);
                }
            }
        }
        $id_document = $document->document_id;
        $document->delete();
        return redirect()->route('document.show', $id_document)->with(['success' => "Berhasil menghapus Detail Dokumen Pelatihan"]);
    }

    public function destroy_document_detail_sub($id) {
        $document = DocumentSubDetail::find($id);
        $file = 'upload/dokumen-pelatihan/'.$document->file;
        if (file_exists($file)) {
            @unlink($file);
        }
        $id_document = $document->document_detail_id;
        $document->delete();
        return redirect()->route('document.subdetail.show', $id_document)->with(['success' => "Berhasil menghapus Sub Detail Dokumen Pelatihan"]);
    }

    public function edit_document($id) {
        $document = Document::find($id);
        return view('pages.dashboard.document.edit_document', compact('document'));
    }

    public function edit_document_detail($id) {
        $document = DocumentDetail::find($id);
        return view('pages.dashboard.document.edit_document_detail', compact('document'));
    }

    public function edit_document_detail_sub($id) {
        $document = DocumentSubDetail::find($id);
        return view('pages.dashboard.document.edit_document_sub', compact('document'));
    }

    public function update_document(Request $request, $id) {
        $document = Document::find($id);
        $document->update([
            'name' => $request->name
        ]);
        return redirect()->route('dashboard.detail_materi.create', [
            'slug' => $document->training->slug,
            'year' => $document->training->year,
            'month' => $document->training->month,
            'jenis' => 'document'
        ])->with(['success' => "Berhasil update Dokumen Pelatihan"]);
    }

    public function update_document_detail(Request $request, $id) {
        $document = DocumentDetail::find($id);
        $document->update([
            'type' => $request->type
        ]);
        return redirect()->route('document.show', $document->document->id)->with(['success' => "Berhasil update Detail Dokumen Pelatihan"]);
    }

    public function update_document_detail_sub(Request $request, $id) {
        $document = DocumentSubDetail::find($id);
        if($request->hasFile('file')) {
            $file_path = 'upload/dokumen-pelatihan/'.$document->file;
            if (file_exists($file_path)) {
                @unlink($file_path);
            }
            $filename = time().'.'.$request->file->extension();  
            $request->file->move(public_path('upload/dokumen-pelatihan/'), $filename);
            $file = $filename;
        }
        $document->update([
            'name' => $request->name,
            'file' => $file ?? $document->file
        ]);
        return redirect()->route('document.subdetail.show', $document->document_detail_id)->with(['success' => "Berhasil menghapus Sub Detail Dokumen Pelatihan"]);
    }
}
