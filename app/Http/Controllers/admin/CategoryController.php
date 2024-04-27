<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\CategoryModel;
use Auth;


class CategoryController extends Controller
{
    public function list(){
        $data['getRecord'] = CategoryModel::getRecord();
        $data['header_title']='Category';
        return view('admin.category.list',$data); 

    }
    
    public function add(){
       
        $data['header_title']='Add New Category';
        return view('admin.category.add',$data); 
    }

    public function insert(Request $request)
    {
            request()->validate([
            'slug' => 'required|unique:category'
        ]);
        $category = new CategoryModel;
        $category -> name = trim($request->name);
        $category -> slug = trim($request->slug);
        $category -> status = trim($request->status);
        $category -> meta_title = trim($request->meta_title);
        $category -> meta_keywords = trim($request->meta_keywords);
        $category -> created_by = Auth::user()->id;
        $category ->save();

        return  redirect('admin/category/list')->with('success', "Category successfully created");


    }  
    public function edite($id)
    {
        $data['getRecord'] = CategoryModel::getSingle($id);
        $data['header_title']='Edite Category';
        return view('admin.category.edite',$data); 

    }

    public function update($id,Request $request)
    {
        request()->validate([
            'slug' => 'required|unique:category,slug,'.$id
        ]);
        
        $category = CategoryModel::getSingle($id);
        $category -> name = trim($request->name);
        $category -> slug = trim($request->slug);
        $category -> status = trim($request->status);
        $category -> meta_title = trim($request->meta_title);
        $category -> meta_keywords = trim($request->meta_keywords);
        $category ->save();

        return  redirect('admin/category/list')->with('success', "Category successfully updated");

    }

    public function delete($id){  
        $category =  CategoryModel::getSingle($id);
        $category ->delete();
        return  redirect('admin/category/list')->with('success', "Category successfully deleted");

    }

}