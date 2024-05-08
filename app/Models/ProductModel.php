<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ProductModel extends Model
{
    use HasFactory;

    protected $table = 'product';

    static public function checkSlug($slug)
    {
        return self::where('slug', '=', $slug)->count();
    }

    static public function getSingle($id)
    {
        return self::find($id);
    }

    static public function getRecord()
    {
        return self::select('product.*', 'users.name as created_by_name')
            ->join('users', 'users.id', '=', 'product.created_by')
            ->where('product.is_delete', '=', 0)
            ->orderBy('product.id', 'desc')
            ->paginate(20);
    }

    static public function getProduct($category_id = '', $subcategory_id = '')
    {
        $request = app('request');
        $return = ProductModel::select(
            'product.*',
            'users.name as created_by_name',
            'category.name as category_name',
            'category.slug as category_slug',

            'sub_category.name as sub_category_name',
            'sub_category.slug as sub_category_slug'
        )
            ->join('users', 'users.id', '=', 'product.created_by')
            ->join('category', 'category.id', '=', 'product.category_id')
            ->join('sub_category', 'sub_category.id', '=', 'product.sub_category_id');
        if (!empty($category_id)) {
            $return = $return->where('product.category_id', '=', $category_id);
        }

        if (!empty($subcategory_id)) {
            $return = $return->where('product.sub_category_id
            ', '=', $subcategory_id);
        }
        if (!empty($request->get('sub_category_id'))) {
            $subcategory_id = rtrim($request->get('sub_category_id'), ',');
            $subcategory_id_arry = explode(",", $subcategory_id);
            $return = $return->whereIn('product.sub_category_id', $subcategory_id_arry);
        }
        if (!empty($request->get('brand_id'))) {
            $brand_id = rtrim($request->get('brand_id'), ',');
            $brand_id_arry = explode(",", $brand_id);
            $return = $return->whereIn('product.brand_id', $brand_id_arry);
        }
        if (!empty($request->get('color_id'))) {
            $color_id = rtrim($request->get('color_id'), ',');
            $color_id_arry = explode(",", $color_id);
            $return = $return->join('product_color', 'product_color.product_id', '=', 'product.id');
            $return = $return->whereIn('product_color.color_id', $color_id_arry);
        }
        $return = $return->where('product.is_delete', '=', 0)
            ->where('product.status', '=', 0)
            /* ->groupBy('product.id') */
            ->orderBy('product.id', 'desc')
            ->paginate(30);
        return $return;
    }

    //images




    static public function getRelatedProduct($product_id, $sub_category_id)
    {
      
        $return = ProductModel::select(
            'product.*',
            'users.name as created_by_name',
            'category.name as category_name',
            'category.slug as category_slug',

            'sub_category.name as sub_category_name',
            'sub_category.slug as sub_category_slug'
        )
            ->join('users', 'users.id', '=', 'product.created_by')
            ->join('category', 'category.id', '=', 'product.category_id')
            ->join('sub_category', 'sub_category.id', '=', 'product.sub_category_id')
            ->where('product.id', '!=', $product_id)
            ->where('product.sub_category_id', '=', $sub_category_id)
            ->where('product.is_delete', '=', 0)
            ->where('product.status', '=', 0)
            
            
            ->orderBy('product.id', 'desc')
            ->limit(10)
            ->get();
        return $return;
    }
    static public function getImageSingle($product_id)
    {
        return ProductImageModel::where('product_id', '=', $product_id)->first();
    }
    static function getSingleSlug($slug)
    {
        return self::where('slug', '=', $slug)
            ->where('product.is_delete', '=', 0)
            ->where('product.status', '=', 0)
            ->first();
    }
    public function getColor()
    {
        return $this->hasMany(ProductColorModel::class, "product_id");
    }

    public function getSize()
    {
        return $this->hasMany(ProductSizeModel::class, "product_id");
    }

    public function getImage()
    {
        return $this->hasMany(ProductImageModel::class, "product_id")->orderBy('order_By', 'desc');
    }

    public function getSubcategory()
    {
        return $this->belongsTo(SubCategoryModel::class, 'sub_category_id');
    }
    public function getCategory()
    {
        return $this->belongsTo(CategoryModel::class, 'category_id');
    }
}
