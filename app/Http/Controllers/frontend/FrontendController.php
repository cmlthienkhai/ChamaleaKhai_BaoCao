<?php

namespace App\Http\Controllers\frontend;

use App\Mail\ContactMail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Topic;
use App\Models\Category;
use App\Models\Product;
use App\Models\Contact;
use App\Models\Brand;
use App\Models\User;




class FrontendController extends Controller
{
    /**
     * Action hiển thị danh sách bài viết
     */
        public function showPosts()
    {
        $posts = Post::paginate(3);

        return view('frontend.posts.posts', compact('posts'));

    }
        public function showdetail($id)
    {
        $post = Post::find($id);

        return view('frontend.posts.post_detail', compact('post'));
    }

     public function index()
{
    $topics = Topic::with('posts')->get();
    $posts = Post::paginate(3); // Lấy 10 bài viết mỗi trang

    return view('frontend.topic.index', compact('topics', 'posts'));
}

     public function contact()
    {
        return view('frontend.contact.contact');

    }
     
     public function category2($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        // Các xử lý khác nếu cần

        return view('frontend.category.index', compact('category'));
    }
     
   // Trong hàm productsByCategory của FrontendController
    public function productsByCategory($slug, Request $request)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $perPage = 6; // Số lượng sản phẩm mỗi trang
        $products = Product::where('category_id', $category->id)
            ->paginate($perPage);

        return view('frontend.category.index', compact('category', 'products'));
    }

   public function storeContact(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:1000',
        'email' => 'required|email|max:255',
        'message' => 'required|string',
        'phone' => 'nullable|string|max:20', // Thêm quy tắc cho số điện thoại (nếu có)
    ]);

    Contact::create([
        'user_id' => auth()->user()->id, // Nếu bạn muốn liên kết với user hiện tại
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'content' => $request->input('message'),
        'phone' => $request->input('phone'),
        'title' => $request->input('title'),
        'detail' => $request->input('detail'),
        'replaydetail' => $request->input('replaydetail'),// Điều này phụ thuộc vào cách bạn muốn xử lý title
        // Các trường khác bạn muốn lưu
    ]);
     // Gửi email thông báo đến admin

    return redirect()->route('frontend.contact')->with('success', 'Thông tin liên hệ của bạn đã được gửi thành công.');
}
   
    public function show($slug)
    {
         $brand = Brand::where('slug', $slug)->first();

        if ($brand) {
            $list_product = Product::where('brand_id', $brand->id)->paginate(3);

            return view('frontend.brand.index', compact('brand', 'list_product'));
        }
    }
    //brand
      public function brand()
    {
        $brands = Brand::paginate(3);
        return view('frontend.brand.index', compact('brands'));
    }
    
    //category
    public function category()
    {
        $category = Category::paginate(6);
        return view('frontend.category.index', compact('category'));
    }
     public function ProductsCategory($id)
{
    $category = Category::find($id);

    if (!$category) {
        abort(404);
    }

    $list_product = Product::where('category_id', $id)
        ->where('status', '<>', 0)
        ->paginate(6); // Thay đổi số lượng sản phẩm trên mỗi trang tùy theo yêu cầu

    return view('frontend.category.product-category', compact('category', 'list_product'));
}

public function ProductsBrand($id)
{
    $brand = Brand::find($id);

    if (!$brand) {
        abort(404);
    }

    $list_product = Product::where('brand_id', $id)
        ->where('status', '<>', 0)
        ->paginate(6); // Thay đổi số lượng sản phẩm trên mỗi trang tùy theo yêu cầu

    return view('frontend.brand.products-brand', compact('brand', 'list_product'));
}
    public function login()
        {
            // Mã nguồn cho phương thức đăng nhập
            return view('frontend.login.login'); // Ví dụ: Trả về view cho trang đăng nhập
        }
    public function sigup()
        {
            // Mã nguồn cho phương thức đăng nhập
            return view('frontend.login.sigup'); // Ví dụ: Trả về view cho trang đăng nhập
        }
    public function postlogin(Request $request)
    {   
        $username=$request->username;
        $password=$request->password;
        $user=array('password'=>$password);
        if(filter_var($username, FILTER_VALIDATE_EMAIL)){
            $user['email']=$username;
        }
        else{
            $user['username']=$username;
        }
        
      

       if(Auth::attempt($user))
       {
        return redirect()->route('frontend.home');
       }
       else
       {
        
        $error='Thông tin đăng nhập chưa chính xác';
        return view('frontend.login.login',compact('error'));
        }
    }


    
}