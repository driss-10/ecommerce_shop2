<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\SubCategoryModel;
use App\models\CategoryModel;
use Auth;


class SubCategoryController extends Controller
{
    public function list()
    {
        $data['getRecord'] = SubCategoryModel::getRecord();
        $data['header_title'] = ' SubCategory';
        return view('admin.sub_category.list', $data);
    }

    public function add()
    {
        $data['getCategory'] = CategoryModel::getRecord();
        $data['header_title'] = 'Add New SubCategory';
        return view('admin.sub_category.add', $data);
    }


    public function insert(Request $request)
    {
        request()->validate([
            'slug' => 'required|unique:sub_category'
        ]);
        $subcategory = new SubCategoryModel;
        $subcategory->category_id = trim($request->category_id);
        $subcategory->name = trim($request->name);
        $subcategory->slug = trim($request->slug);
        $subcategory->status = trim($request->status);
        $subcategory->meta_title = trim($request->meta_title);
        $subcategory->meta_keywords = trim($request->meta_keywords);
        $subcategory->created_by = Auth::user()->id;
        $subcategory->save();

        return  redirect('admin/sub_category/list')->with('success', "SubCategory successfully updated");
    }

    public function update($id, Request $request)
    {
        request()->validate([
            'slug' => 'required|unique:sub_category,slug,' . $id
        ]);

        $category = SubCategoryModel::getSingle($id);
        $category->category_id = trim($request->category_id);
        $category->name = trim($request->name);
        $category->slug = trim($request->slug);
        $category->status = trim($request->status);
        $category->meta_title = trim($request->meta_title);
        $category->meta_keywords = trim($request->meta_keywords);
        $category->save();

        return  redirect('admin/sub_category/list')->with('success', "SubCategory successfully updated");
    }

    public function edite($id)
    {
        $data['getCategory'] = CategoryModel::getRecord();
        $data['getRecord'] = SubCategoryModel::getSingle($id);
        $data['header_title'] = 'Edit SubCategory';
        return view('admin.sub_category.edite', $data);
    }

    public function delete($id)
    {
        $category =  SubCategoryModel::getSingle($id);
        $category->delete();
        return  redirect()->back()->with('success', "SubCategory successfully deleted");
    }

    public function get_sub_category(Request $request)
    {
        $category_id = $request->id;
        $get_sub_category =  SubCategoryModel::getRecordSubCategory($category_id);
        $html = '';
        $html .= '<option value="">Select</option>';
        foreach ($get_sub_category as $value) {
            $html .= '<option value="' . $value->id . '">' . $value->name . '</option>'; // Changed value to id
        }
        $json['html'] = $html;
        return response()->json($json);
    }
}
