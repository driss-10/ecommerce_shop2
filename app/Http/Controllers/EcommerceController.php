<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use App\Models\ProductModel;
use App\Models\ColorModel;
use App\Models\BrandModel;
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
        $data['getColor'] = ColorModel::getRecordActive();
        $data['getBrand'] = BrandModel::getRecordActive();


        if (!empty($getCategory) && !empty($getSubCategory)) {
            $data['Meta_title'] = $getSubCategory->Meta_title;
            $data['Meta_Description'] = $getSubCategory->Meta_Description;
            $data['Meta_Keywords'] = $getSubCategory->Meta_Keywords;


            $data['getSubCategory'] = $getSubCategory;
            $data['getCategory'] = $getCategory;
            //afficher product
            
            $data['getProduct'] = ProductModel::getProduct($getCategory->id,$getSubCategory->id);

            $data['getSubCategoryFillter']  = SubCategoryModel::getRecordSubCategory($getCategory->id);
            return view('Ecommerce.List', $data);
        }

        if (!empty($getCategory)) {
          
            $data['getSubCategoryFillter']  = SubCategoryModel::getRecordSubCategory($getCategory->id);

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


    public function getPoductAjax(Request $request)
    {
        $getProduct = ProductModel::getProduct();
        return response()->json([
            "status" => true,
            "success" => view("Ecommerce._List", [
                "getProduct" => $getProduct,
            ])->render(),

        ], 200);
    }


    public function ShoppingCart()
    {
        if (!auth()->check()) {
            return redirect()->route('Login');
        }
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
        if (!auth()->check()) {
            return redirect()->route('Login');
        }
        return view('Ecommerce.ShopDetails');
    }
}
