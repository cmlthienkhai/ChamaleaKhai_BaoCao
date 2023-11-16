<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Traits\CartTrait;
use App\Http\Services\CartService;

class CartController extends Controller
{
     use CartTrait; // Sử dụng trait CartTrait

    

    // Các phương thức khác trong CartController

    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function index()
{
      // Gọi các phương thức từ trait CartTrait
        $this->addToCart($product);
        $this->removeFromCart($product);
        
        // ...
    // Lấy thông tin giỏ hàng và xử lý
    $cartItems = session('cart', []); // Lấy thông tin giỏ hàng từ session
    $totalPrice = $this->calculateTotalPrice($cartItems); // Tính tổng giá của giỏ hàng

    // Trả về view hiển thị giỏ hàng với dữ liệu
    return view('frontend.cart.cart', compact('cartItems', 'totalPrice'));
}

   private function calculateTotalPrice($cartItems)
{
    // Kiểm tra xem $cartItems có phải là một mảng không
    if (!is_array($cartItems)) {
        // Xử lý lỗi hoặc trả về giá trị mặc định tùy thuộc vào yêu cầu của bạn
        return 0;
    }

    // Logic tính tổng giá của giỏ hàng
    // Ví dụ: duyệt qua từng item trong giỏ hàng và cộng dồn giá của từng item
    $totalPrice = 0;
    foreach ($cartItems as $item) {
        // Kiểm tra xem $item có phải là một mảng không
        if (is_array($item) && isset($item['price'])) {
            $totalPrice += $item['price'];
        }
    }
    return $totalPrice;
}
    public function show()
    {
        $products = $this->cartService->getProduct();

        return view('carts.list', [
            'title' => 'Giỏ Hàng',
            'products' => $products,
            'carts' => Session::get('carts')
        ]);
    }

    public function update(Request $request)
    {
        $this->cartService->update($request);

        return redirect('/carts');
    }

    public function remove($id = 0)
    {
        $this->cartService->remove($id);

        return redirect('/carts');
    }

    public function addCart(Request $request)
{
    $this->cartService->addCart($request);

    return view('carts.list');
}
    public function cart(Request $request)
    {
       
        return view('cart');
    }
    public function handleCountError(Request $request)
    {
        $value = $request->input('value'); // Lấy giá trị cần kiểm tra từ request hoặc nguồn dữ liệu khác

        if ($value !== null) {
            // Kiểm tra xem $value có phải là mảng hoặc Countable không
            if (is_array($value) || $value instanceof Countable) {
                $count = count($value);
                // Sử dụng giá trị đã đếm được ở đây
                return "Số phần tử: " . $count;
            } else {
                // Xử lý khi $value không phải là mảng hoặc Countable
                return "Giá trị không hợp lệ";
            }
        } else {
            // Xử lý khi $value là null
            return "Giá trị là null";
        }
        return view('count-error', ['result' => $result]);
    }
 

 public function addItem(Request $request)
    {
        $product_id = $request->input('product_id');
        $quantity = $request->input('quantity');

        // Lấy thông tin sản phẩm từ cơ sở dữ liệu hoặc nguồn dữ liệu khác

        // Tạo một đối tượng Cart
        $cart = new Cart;
        $cart->product_id = $product_id;
        $cart->quantity = $quantity;
        // Gán các thuộc tính khác của giỏ hàng

        // Lưu giỏ hàng vào cơ sở dữ liệu
        $cart->save();

        // Chuyển hướng hoặc trả về phản hồi tùy thuộc vào yêu cầu của bạn
    }
    
    public function showCart()
    {
        return view('frontend.cart.list'); // Chắc chắn rằng tên view đúng với tên của file blade bạn vừa chia sẻ.
    }
    public function Pay()
    {
        return view('frontend.cart.pay'); // Chắc chắn rằng tên view đúng với tên của file blade bạn vừa chia sẻ.
    }
    //////////////////
    public function giohang(Request $request)
    {
        $list_product = $request->input('product_id');
        $quantity = $request->input('quantity');

        // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
        $cart = session()->get('cart', []);

        if (isset($cart[$list_product])) {
            $cart[$list_product]['quantity'] += $quantity;
        } else {
            // Nếu sản phẩm chưa có trong giỏ hàng, thêm mới
            $product = San_pham::find($list_product);

            if (!$product) {
                abort(404);
            }

            $cart[$list_product] = [
                'name' => $product->name,
                'price_sale' => $product->price_sale,
                'quantity' => $quantity,
                'image' => $product->images,
                'id' => $product->id,
                
            ];
        }

        // Lưu thông tin giỏ hàng vào session
        session()->put('cart', $cart);

        return redirect()->route('frontend.home')->with('thongbao', 'Sản Phẩm Đã Được Thêm Vào Giỏ Hàng Thành Công ');
    }

    public function xemgiohang()
    {
        $viewData = [];
        $viewData["title"] = "Football TK";
        $list_product = Product::all();

        return view('frontend.cart.cart', compact('list_product'));
    }
    public function deletecart($id)
    {
        // Lấy thông tin giỏ hàng từ session
        $cart = session()->get('cart', []);

        // Kiểm tra xem sản phẩm có tồn tại trong giỏ hàng không
        if (isset($cart[$id])) {
            // Xóa sản phẩm khỏi giỏ hàng
            unset($cart[$id]);

            // Cập nhật lại giỏ hàng trong session
            session()->put('cart', $cart);

            return redirect()->route('cart.show')->with('thongbao', 'Sản phẩm đã được xóa khỏi giỏ hàng thành công');
        }

        return redirect()->route('cart.show')->with('thongbao', 'Sản phẩm không tồn tại trong giỏ hàng');
    }
    public function thanhtoan()
    {
        return view('pages.thanhtoan');
    }
    public function thanhcong(Request $request)
    {
        $cart = new Cart();
        $customer = new Customer();
        $customer->name = $request->input("Họ và tên");
        $customer->email = $request->input('email');
        $customer->address = $request->input('Địa chỉ');
        $customer->phone = $request->input('Số điện thoại');

        $customer->save();
        $cart->customer_id = $customer->customer_id;
        $cart = session()->get('cart');
        $total_price = 0;
        if ($cart) {
            $dem = count($cart);
            foreach ($cart as $item) {
                $gia = $item['quantity'] * $item['price'];
                // $total_price += $item['quantity'] * $item['price'];

                $cart = new Cart();
                $cart->customer_id = $customer->customer_id;
                $cart->product_name = $item['name'];
                $cart->product_qty = $item['quantity'];
                $cart->total = $price;
                // $giohang->TONG_TIEN_TT =$total_price;
                $cart->save();
            }
        }




        return redirect()->route('frontend.home')->with('thongbao', 'Bạn Đã Đặt Hàng Thành Công');
    }
}

