<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EcommerceController extends Controller
{
    public function Home()
    {
        return view('Ecommerce.Home');
    }
    public function Shop()
    {
        return view('Ecommerce.Shop');
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
