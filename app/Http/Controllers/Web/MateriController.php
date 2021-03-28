<?php

namespace App\Http\Controllers\Web;

use App\Models\Training;
use Illuminate\Http\Request;
use App\Traits\ImageHandlerTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\Materi\CreateMateriRequest;
use App\Http\Requests\Materi\UpdateMateriRequest;
use App\Models\Faq;

class MateriController extends Controller
{
    use ImageHandlerTrait;
    private $pathImage = "upload/training/";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $training = Training::latest()->paginate(10);
        $data = $request->all();
        return view('pages.dashboard.materi.index', compact('training', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.dashboard.materi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateMateriRequest $request)
    {
        try {
            $dateStart = date('Y-m-d', strtotime($request->start));
            $dateEnd = date('Y-m-d', strtotime($request->end));
            if($dateStart > $dateEnd) {
                return redirect()->back()->with(['error' => 'Tanggal awal melebihi tanggal akhir']);
            }
            if($request->hasFile('image')) {
                $image = $this->uploadImage($request, $this->pathImage);
            }
            $training = Training::create([
                'title' => $request->title,
                'image' => $image,
                'start' => $dateStart,
                'end' => $dateEnd,
                'description' => $request->description,
                'description2' => $request->description2,
                'subtitle' => $request->subtitle
            ]);
            Faq::create([
                'training_id' => $training->id,
                'faq' => ''
            ]);
            return redirect()->route('dashboard.materi.index')->with(['success' => 'Berhasil menambah materi']);
        } catch(\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()])->withInput();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $training = Training::find($id);
        return view('pages.dashboard.materi.edit', compact('training'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMateriRequest $request, $id)
    {
        try {
            $dateStart = date('Y-m-d', strtotime($request->start));
            $dateEnd = date('Y-m-d', strtotime($request->end));
            if($dateStart > $dateEnd) {
                return redirect()->back()->with(['error' => 'Tanggal awal melebihi tanggal akhir']);
            }
            $training = Training::find($id);
            if($request->hasFile('image')) {
                $this->unlinkImage($this->pathImage, $training->image);
                $image = $this->uploadImage($request, $this->pathImage);
            }
            $training->update([
                'title' => $request->title,
                'image' => $image ?? $training->image,
                'start' => $dateStart,
                'end' => $dateEnd,
                'description' => $request->description,
                'description2' => $request->description2,
                'subtitle' => $request->subtitle
            ]);
            return redirect()->route('dashboard.materi.index')->with(['success' => 'Berhasil update materi']);
        } catch(\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()])->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $training = Training::find($id);
        $this->unlinkImage($this->pathImage, $training->image);
        $training->delete();
        return redirect()->back()->with(['success' => "Berhasil hapus data"]);
    }
}
