<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;

class ProductController extends Controller
{
    #danh sach
    public function index()
    {
        $list = Product::where('status', '<>', '0')->orderBy('created_at', 'desc')->get();
        return view('backend.product.index', compact('list'));
    }

    #THEM
    public function create()
    {
        $categories = Category::where('status', '<>', '0')->get();
        $brands = Brand::where('status', '<>', '0')->get();

        $html_category_id = '';
        $html_brand_id = '';

        foreach ($categories as $category) {
            $html_category_id .= "<option value='" . $category->id . "'>" . $category->name . "</option>";
        }

        foreach ($brands as $brand) {
            $html_brand_id .= "<option value='" . $brand->id . "'>" . $brand->name . "</option>";
        }

        return view('backend.product.create', compact('html_category_id', 'html_brand_id'));
    }



    public function store(ProductStoreRequest $request)
    {
        $row = new Product();
        $row->name = $request->name;
        $row->slug = Str::of($request->name)->slug('-');
        $row->category_id = $request->category_id;
        $row->brand_id = $request->brand_id;
        $row->detail = $request->detail;
        $row->qty = $request->qty;
        $row->price = $request->price;
        $row->price_sale = $request->price_sale;
        //$Product->level = $request->level;        
        $row->metakey = $request->metakey;
        $row->metadesc = $request->metadesc;
        $row->created_at =date('Y-m-d H:i:s');
        $row->created_by = 1;
        $row->status = $request->status;
        
        $file = $request->file('image');
        if ($file != NULL) {
            $extention = $file->getClientOriginalExtension();
            if (in_array($extention, ['png', 'jpg', 'jpeg', 'webp'])) {
                $fileName = $row->slug.'.'.$extention;
                $file->move(public_path('images/product'), $fileName);
                $row->image = $fileName;
            }
        }
        
        //$category->image=$request->image;
        $row->save();
        return redirect()->route('product.index')->with('message', ['type' => 'success','msg' => 'Thêm mẫu tin thành công!']);
    }

  
    public function show($id)
    {
        $row = Product::find($id);
        if($row==NULL)
        {
            return redirect()->route('product.index')->with('message', ['type' => 'danger','msg' => 'Mẫu tin không tồn tại!']);
        }
        $title = 'Chi tiết mẫu tin';
        return view('backend.product.show',compact('row','title'));
    }

   
    public function edit($id)
    {
        $row = Product::find($id);

        if ($row == NULL) {
            return redirect()->route('product.index')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }

        $categories = Category::where('status', '<>', '0')->get();
        $brands = Brand::where('status', '<>', '0')->get();

        $html_category_id = '';
        $html_brand_id = '';

        foreach ($categories as $category) {
            if ($category->id == $row->category_id) {
                $html_category_id .= "<option selected value='" . $category->id . "'>" . $category->name . "</option>";
            } else {
                $html_category_id .= "<option value='" . $category->id . "'>" . $category->name . "</option>";
            }
        }

        foreach ($brands as $brand) {
            if ($brand->id == $row->brand_id) {
                $html_brand_id .= "<option selected value='" . $brand->id . "'>" . $brand->name . "</option>";
            } else {
                $html_brand_id .= "<option value='" . $brand->id . "'>Sau: " . $brand->name . "</option>";
            }
        }

        $title = 'Cập nhật mẫu tin';
        return view('backend.product.edit', compact('row', 'title', 'html_category_id', 'html_brand_id'));
    }


   
    public function update(ProductUpdateRequest $request, $id)
    {
        $row = new Product();
        $row->name = $request->name;
        $row->slug = Str::of($request->name)->slug('-');
        $row->category_id = $request->category_id;
        $row->brand_id = $request->brand_id;
        $row->detail = $request->detail;
        $row->qty = $request->qty;
        $row->price = $request->price;
        $row->price_sale = $request->price_sale;
        //$Product->level = $request->level;        
        $row->metakey = $request->metakey;
        $row->metadesc = $request->metadesc;
        $row->created_at =date('Y-m-d H:i:s');
        $row->created_by = 1;
        $row->status = $request->status;
        $file = $request->file('image');
        if ($file != NULL) {
            $extention = $file->getClientOriginalExtension();
            if (in_array($extention, ['png', 'jpg', 'jpeg', 'webp'])) {
                $fileName = $row->slug.'.'.$extention;
                $file->move(public_path('images/product'), $fileName);
                $row->image = $fileName;
            }
        }
        
        //$category->image=$request->image;
        $row->save();
        return redirect()->route('product.index')->with('message', ['type' => 'success','msg' => 'Cập nhật mẫu tin thành công!']);
    }

    
    public function destroy($id)
    {
        $row = Product::find($id);
        if($row==NULL)
        {
            return redirect()->route('product.index')->with('message', ['type' => 'danger','msg' => 'Mẫu tin không tồn tại!']);
        }
        $row->delete();
        return redirect()->route('product.trash')->with('message', ['type' => 'success','msg' => 'Xóa mẫu tin thành công!']);
    }


    public function trash()
    {
        $list = Product::where('status', '=', '0')->orderBy('created_at', 'desc')->get();
        return view('backend.product.trash', compact('list'));
    }


    
    public function delete($id)
    {
        $row = Product::find($id);
        if($row==NULL)
        {
            return redirect()->route('product.index')->with('message', ['type' => 'danger','msg' => 'Mẫu tin không tồn tại!']);
        }
        else
        {
         $row->status = 0;
         $row->updated_at =date('Y-m-d H:i:s');
         $row->updated_by = 1;
         $row->save();
        return redirect()->route('product.index')->with('message', ['type' => 'success','msg' => 'Xóa vào thùng rác thành công!']);
        }
        
    }


    public function restore($id)
    {
        $row = Product::find($id);
        if($row==NULL)
        {
            return redirect()->route('product.index')->with('message', ['type' => 'danger','msg' => 'Mẫu tin không tồn tại!']);
        }
        else
        {
            $row->status = 2;
            $row->updated_at=date('Y-m-d H:i:s');
            $row->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
            $row->save();
        return redirect()->route('product.index')->with('message', ['type' => 'success','msg' => 'Khôi phục thành công!']);
        }
        
    }
    
    
    public function status($id)
    {
        $row = Product::find($id);
        if($row==NULL)
        {
            return redirect()->route('product.index')->with('message', ['type' => 'danger','msg' => 'Mẫu tin không tồn tại!']);
        }
        else
        {
         $row->status = ($row->status == 1) ? 2 : 1;
         $row->updated_at =date('Y-m-d H:i:s');
         $row->updated_by = 1;
         $row->save();
        return redirect()->route('product.index')->with('message', ['type' => 'success','msg' => 'Thay đổi trạng thái thành công!']);
        }
        
    }
}
