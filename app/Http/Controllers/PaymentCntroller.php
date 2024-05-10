<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use App\Models\ProductSizeModel;
use App\Models\Cart;
use App\Models\ColorModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentCntroller extends Controller
{
    /*   public function addCart(Request $request)
    {
        $getProduct = ProductModel::getSingle($request->Product_id);
       
     $total = $getProduct->price;
    
        
        if (!empty($request->size_id)) {
            $size_id = $request->size_id;
            $getSize = ProductSizeModel::getSingle($size_id);
      
        } else {
            $size_id = 0;
        }
        dd($total);
        dd($request->all());
        /*   if (Auth::id()) {
            return redirect()->back();
        } else {
            return redirect('Ecommerce.Login');
        }
    } */
    public function addCart(Request $request, $id)
    {

        /*  if (Auth::id()) {
            return redirect()->back();
        } else {
            return redirect('Login');
        }*/
        $getProduct = ProductModel::find($id);
        $getColor= ColorModel::find($id);
        $cart = new Cart;
        $cart->name;
        $cart->phone;
        $cart->address;
        $cart->title = $getProduct->title;
        $cart->price = $getProduct->price;
        $cart->color = $getColor->color;
        $cart->size = $getProduct->size;
        $cart->quantity = $request->quantity;
        dd($cart);
        $cart->save();
    }
}
