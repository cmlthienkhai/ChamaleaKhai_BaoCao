<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        // Lấy giá trị từ trường input 'keyword'
        $keyword = $request->input('keyword');

        try {
            // Sử dụng like để tìm kiếm tên sản phẩm chứa từ khóa
            $list_product = Product::where('name', 'like', '%' . $keyword . '%')->get();
            
            // Trả về view với danh sách sản phẩm tìm được
            return view('frontend.search', compact('list_product'));
        } catch (\Exception $e) {
            // Xử lý ngoại lệ, ghi log, hoặc trả về phản hồi lỗi
            return response()->json(['error' => 'Đã xảy ra lỗi trong quá trình xử lý yêu cầu.'], 500);
        }
    }
}
