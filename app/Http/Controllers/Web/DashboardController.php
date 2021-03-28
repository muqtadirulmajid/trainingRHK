<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\LandingPage;
use App\Models\Slider;
use App\Traits\ImageHandlerTrait;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    use ImageHandlerTrait;

    public function index() {
        return view('pages.dashboard.index');
    }
    
    public function landing_page(Request $request) {
        $landing_page = LandingPage::paginate(10);
        $data = $request->all();
        return view('pages.dashboard.landing.index', compact('landing_page', 'data'));
    }

    public function edit_landing_page ($code) {
        $landing = LandingPage::where('code', $code)->first();
        return view('pages.dashboard.landing.edit', compact('landing'));
    }

    public function update_landing_page(Request $request, $code) {
        $landing = LandingPage::where('code', $code)->first();
        $value = $request->value;
        if($request->hasFile('value')) {
            $this->validate($request, [
                'value' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
            ]);
            if($landing->value != '') {
                $this->unlinkImage('upload/avatar/', $landing->value);
            }
            $request->merge([
                'image' => $request->value
            ]);
            $value = $this->uploadImage($request, 'upload/avatar/');
        }
        $landing->update([
            'value' => $value ?? ''
        ]);
        return redirect()->route('dashboard.landing_page')->with(['success' => "Berhasil update data"]);
    }

    public function slider(Request $request) {
        $slider = Slider::paginate(10);
        $data = $request->all();
        return view('pages.dashboard.slider.index', compact('slider', 'data'));
    }

    public function slider_store(Request $request) {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
            'status' => 'required'
        ]);
        if($request->hasFile('image')) {
            $image = $this->uploadImage($request, 'upload/slider/');
        }
        Slider::create([
            'name' => $image ?? '',
            'image' => $image ?? '',
            'status' => $request->status
        ]);

        return redirect()->route('dashboard.slider')->with(['success' => "Berhasil menambah slider"]);
    }

    public function set_status_slider($id, $status) {
        $slider = Slider::find($id);
        $slider->update([
            'status' => $status
        ]);
        return redirect()->route('dashboard.slider')->with(['success' => "Berhasil update slider"]);
    }

    public function slider_destroy($id) {
        $slider = Slider::find($id);
        if($slider->image != '') {
            $this->unlinkImage('upload/slider/', $slider->image);
        }
        $slider->delete();
        return redirect()->route('dashboard.slider')->with(['success' => "Berhasil hapus slider"]);
    }

    public function slider_edit($id) {
        $slider = Slider::find($id);
        return view('pages.dashboard.slider.edit', compact('slider'));
    }

    public function slider_update(Request $request, $id) {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
            'status' => 'required'
        ]);
        $slider = Slider::find($id);
        if($request->hasFile('image')) {
            if($slider->image != '') {
                $this->unlinkImage('upload/slider/', $slider->image);
            }
            $image = $this->uploadImage($request, 'upload/slider/');
        }
        $slider->update([
            'name' => $image ?? '',
            'image' => $image ?? '',
            'status' => $request->status
        ]);
        return redirect()->route('dashboard.slider')->with(['success' => "Berhasil update slider"]);
    }

    public function materi() {
        
    }
}
