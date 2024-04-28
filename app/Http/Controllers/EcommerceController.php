<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use App\Models\ProductModel;
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
    public function list($slug = '', $subslug = '')
    {
        $getCategory = CategoryModel::getSingleSlug($slug);
        $getSubCategory = SubCategoryModel::getSingleSlug($subslug);


        if (!empty($getCategory) && !empty($getSubCategory)) {
            $data['Meta_title'] = $getSubCategory->Meta_title;
            $data['Meta_Description'] = $getSubCategory->Meta_Description;
            $data['Meta_Keywords'] = $getSubCategory->Meta_Keywords;

            $data['getSubCategory'] = $getSubCategory;
            $data['getCategory'] = $getCategory;
            //afficher product
            $data['getProduct'] = ProductModel::getProduct($getSubCategory->id, $getCategory->id);
            return view('Ecommerce.List', $data);
        }

        if (!empty($getCategory)) {
            $data['getCategory'] = $getCategory;

            $data['Meta_title'] = $getCategory->Meta_title;
            $data['Meta_Description'] = $getCategory->Meta_Description;
            $data['Meta_Keywords'] = $getCategory->Meta_Keywords;

            $data['getProduct'] = ProductModel::getProduct($getCategory->id);

            
            return view('Ecommerce.List', $data);
        } else {
            abort(404);
        }
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
