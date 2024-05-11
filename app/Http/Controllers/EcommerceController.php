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
   



        $getProductSingle = ProductModel::getSingleSlug($slug);
    



        $getCategory = CategoryModel::getSingleSlug($slug);
        $getSubCategory = SubCategoryModel::getSingleSlug($subslug);
        $data['getColor'] = ColorModel::getRecordActive();
        $data['getBrand'] = BrandModel::getRecordActive();

        if (!empty($getProductSingle)) {

            $data['meta_title'] = $getProductSingle->title;
            $data['getProduct'] = $getProductSingle;
            $data['getRelatedProduct'] = ProductModel::getRelatedProduct($getProductSingle->id, $getProductSingle->sub_category_id);



            return view('Ecommerce.ShopDetails', $data);
        } else if (!empty($getCategory) && !empty($getSubCategory)) {
            $data['meta_title'] = $getSubCategory->meta_title;
            $data['meta_Description'] = $getSubCategory->meta_Description;
            $data['meta_Keywords'] = $getSubCategory->meta_Keywords;


            $data['getSubCategory'] = $getSubCategory;
            $data['getCategory'] = $getCategory;
            //afficher product

            $data['getProduct'] = ProductModel::getProduct($getCategory->id, $getSubCategory->id);

            $data['getSubCategoryFillter']  = SubCategoryModel::getRecordSubCategory($getCategory->id);
            return view('Ecommerce.List', $data);
        }

        if (!empty($getCategory)) {

            $data['getSubCategoryFillter']  = SubCategoryModel::getRecordSubCategory($getCategory->id);

            $data['getCategory'] = $getCategory;

            $data['meta_title'] = $getCategory->meta_title;
            $data['meta_Description'] = $getCategory->meta_Description;
            $data['meta_Keywords'] = $getCategory->meta_Keywords;

            $data['getProduct'] = ProductModel::getProduct($getCategory->id);


            return view('Ecommerce.List', $data);
        } else {
            abort(404);
        }
    }
    public function getProductSearch(Request $request)
    {
       

      

        $data['meta_title'] = 'search';
        $data['meta_Description'] = '';
        $data['meta_Keywords'] = '';

        $getProduct = ProductModel::getProduct();
       
        $data['getColor'] = ColorModel::getRecordActive();
        $data['getBrand'] = BrandModel::getRecordActive();
       
        $data['getProduct'] = $getProduct;
        return view('Ecommerce.List', $data);
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
}
