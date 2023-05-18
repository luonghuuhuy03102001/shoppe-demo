<?php 
 namespace App\Http\Services\Slider;
 use Illuminate\Support\Str;
 use App\Models\Slider;
use App\Models\Slider as ModelsSlider;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

 class SliderService { 
    public function insert($request) {
        try {
            Slider::create($request->input());
            $request->session()->flash('success', 'Thêm mới Slider thành công');
        } catch (\Exception $err) {
            $request->session()->flash('error', 'Thêm Slider thất bại');
            Log::info($err->getMessage());
            return false;
        }
        return true;
    }


    public function get() {
        return Slider::orderByDesc('id')->paginate(15);
    }

    public function show() {
        return Slider::where('active', 1)->orderByRaw('sort_by')->get();
    }

    public function update($request, $slider) {
        try {
            $slider->fill($request->input());
            $slider->save();
            $request->session()->flash('success', 'Cập nhật Slider thành công');
        } catch (\Exception $err) {
            $request->session()->flash('error', 'Cập nhật Slider thất bại');
            Log::info($err->getMessage());
            return false;
        }
        return true;
    }

    public function destroy($request) {
        $slider = Slider::where('id', $request->input('id'))->first();
        if($slider) {
            $path = str_replace('storage', 'public', $slider->thumb);
            Storage::delete($path);
            $slider->delete();
            return true;
        }

        return false; 
    }
 }