<?php 
 namespace App\Http\Services\Product;
 use App\Models\Product;
 use App\Models\Menu;
 use Illuminate\Support\Str;
 use Illuminate\Support\Facades\Session;
 use Illuminate\Support\Facades\Log;
 use Illuminate\Http\Request;

 class ProductAdminService { 

    public function getMenu()
    {
        return Menu::where('active', 1)->get();
    }

    protected function isValiPrice($request) {
        if($request->input('price') != 0 && $request->input('price_sale') != 0 
        && $request->input('price_sale') >= $request->input('price')
        ) {
            $request->session()->flash('error', 'Giá giảm phải nhỏ hơn giá gốc');
            return false;
        }

        if($request->input('price_sale') != 0 && (int)$request->input('price') == 0) {
            $request->session()->flash('error', 'Vui lòng nhập giá gốc');
            return false;
        }

        return true;
    }

    public function insert($request) {
        $isValiPrice = $this->isValiPrice($request);
        if($isValiPrice === false) {
            return false;
        }
        try {
            $request->except('_token');
            Product::create($request->all());

            $request->session()->flash('success', 'Tạo sản phẩm thành công');
        } catch (\Exception $error) {
            $request->session()->flash('error', 'Tạo sản phẩm thất bại');
            Log::info($error->getMessage());

            return false;
        }

        return true;
    }

    public function get()
    {
        return Product::with('menu')
            ->orderByDesc('id')->paginate(15);
    }

    public function update($request, $product) {
        $isValiPrice = $this->isValiPrice($request);
        if($isValiPrice === false) {
            return false;
        }

        try {
            $product->fill($request->input());
            $product->save();

            $request->session()->flash('success', 'Cập nhật danh mục thành công');
        } catch (\Exception $err) {
            $request->session()->flash('error', 'Cập nhật sản phẩm thất bại');
            Log::info($err->getMessage());
            return false;
        }

        return true;
        
    }

    public function delete($request) {
        $product = Product::where('id', $request->input('id'))->first();
        if ($product) {
            $product->delete();
            return true;
        }

        return false;
    }
 }