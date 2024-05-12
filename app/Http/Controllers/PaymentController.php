<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use App\Models\ProductSizeModel;
use App\Models\Cart;
use App\Models\ColorModel;
use App\Models\ProductImageModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\returnSelf;

class PaymentController extends Controller
{
    public function addCart(Request $request)
    {
        $getProduct = ProductModel::getSingle($request->Product_id);

        $total = $getProduct->price;


        if (!empty($request->size_id)) {
            $size_id = $request->size_id;
            $getSize = ProductSizeModel::getSingle($size_id);
            $size_price = !empty($getSize->price) ? $getSize->price : 0;
            $total = $total + $size_price;
        } else {
            $size_id = 0;
        }
        $color_id = $request->color_id;

        Cart::add([
            'id' => $getProduct->id,
            'name' => 'Product',
            'price' => $total,
            'quantity' => $request->quantity,
            'attributes' => array(
                'color_id' => $color_id,
                'size_id' => $size_id,


            )


        ]);
        return redirect()->back()->with('message', 'Product Added Successfuly');
    }
    /* public function addCart(Request $request, $id)
    {





        if (Auth::id()) {
            $getProduct = ProductModel::getSingle($request->Product_id);
            $user = auth()->user();
            $cart = new Cart;
            $getProduct = ProductModel::find($id);
            $getColor = ColorModel::find($id);
            $getImage = ProductImageModel::find($id);
            $size_id = $request->size_id;
            $cart = new Cart;
            $cart->name = $user->name;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->title = $getProduct->title;
            $cart->price = $getProduct->price;
            $cart->image_name = $getImage->image_name;
            $cart->color = $getColor->name;
            $cart->size = $size_id;
            $cart->quantity = $request->quantity;
            $cart->save();
            return redirect()->back()->with('message', 'Product Added Successfuly');
        } else {
            return redirect('Login');
        }
    }*/

    public function Cart(Request $request)
    {
        $cartItems = Cart::getContent();
        $subtotal = Cart::getSubTotal();






        /*    if (Auth::id()) {
            $getProduct = ProductModel::getSingle($request->Product_id);
            $user = auth()->user();
            $cart = Cart::where('phone', $user->phone)->get();
            $count = Cart::where('phone', $user->phone)->count();
            return view('Ecommerce.ShoppingCart', compact('count', 'cart', 'getProduct'));
        } else {
            return redirect('Login');
        } */
        return view('Ecommerce.ShoppingCart', compact('cartItems', 'subtotal'));
    }
    public function delete($id)
    {
         Cart::remove($id);
    
        return redirect()->back();
    }
    
}
