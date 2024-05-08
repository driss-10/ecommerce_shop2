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
   public function getProductSearch(Request $request)
    {
        $test = ProductModel::with('getImage')->get();
        
        $search = $request->search;
        $data = ProductModel::with('getImage')->where('title', 'like','%'.$search. '%')->get();
         
        /*$data['meta_title'] = 'Search';
        $data['meta_Description'] = '';
        $data['meta_Keywords'] = '';

        $getProduct = ProductModel::getProduct();
        $page = 0;
        if(!empty($getProduct->nextPageUrl()))
        {
            $page_url = parse_url($getProduct->nextPageUrl());
            if(!empty($parse_url['query']))
            {
                parse_str($parse_url['query'], $get_array);
                $page = !empty($get_array['page']) ? $get_array['page'] : 0;
            }
        }
        $data['getColor'] = ColorModel::getRecordActive();
        $data['getBrand'] = BrandModel::getRecordActive();
        $data['page'] = $page;
        $data['getProduct'] = $getProduct;*/
        return view('Ecommerce.List', compact('data'));
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
            $data['meta_Description'] = $getProductSingle->meta_Description;
      
            $data['getProduct'] = $getProductSingle;

            return view('Ecommerce.ShopDetails', $data);


        }
        
        else if (!empty($getCategory) && !empty($getSubCategory)) {
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
 /*    public function ShopDetails()
    {
        if (!auth()->check()) {
            return redirect()->route('Login');
        }
        return view('Ecommerce.ShopDetails');
    } */
    public function ShopDetails($slug='')
{
    // Fetch the product details based on the slug
    $product = ProductModel::getSingleSlug($slug);

    if (!$product) {
        abort(404); // Product not found
    }

    // Add other necessary data for the view
    $data['meta_title'] = $product->title;
    $data['meta_Description'] = $product->meta_Description;
    $data['getProduct'] = $product;

    // Return the view with the data
    return view('Ecommerce.ShopDetails', $data);
}

}
