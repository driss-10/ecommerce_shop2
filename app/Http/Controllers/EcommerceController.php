<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use Illuminate\Http\Request;

class EcommerceController extends Controller
{
    public function Home()
    {
        return view('Ecommerce.Home');
    }
    public function Shop($slug)
    {
       /*  $getCategory = CategoryModel::getSingleSlug($slug);
        if (!empty($getCategory)) {
            $data['getCategory'] = $getCategory; */
            return view('Ecommerce.Shop');
        /* } else {
           abort(404);
         } */
    }
    public function Contact()
    {
        return view('Ecommerce.Contact');
    }
    public function ShoppingCart()
    {
        return view('Ecommerce.ShoppingCart');
    }
    public function About()
    {
        return view('Ecommerce.About');
    }
    public function CheckOut()
    {
        return view('Ecommerce.CheckOut');
    }
    public function ShopDetails()
    {
        return view('Ecommerce.ShopDetails');
    }
}
