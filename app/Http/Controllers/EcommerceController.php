<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use App\Models\SubCategoryModel;
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
    public function list($slug = '',$subslug='')
    {
        $getCategory = CategoryModel::getSingleSlug($slug);
        $getSubCategory = SubCategoryModel::getSingleSlug($subslug);

        if (!empty($getCategory)&& !empty($getSubCategory)) {
            $data['getSubCategory'] = $getSubCategory;
            $data['getCategory'] = $getCategory;
            return view('Ecommerce.List', $data);
        }

        if (!empty($getCategory)) {
            $data['getCategory'] = $getCategory;
            return view('Ecommerce.List', $data);
        } else {
            abort(404);
        }
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
