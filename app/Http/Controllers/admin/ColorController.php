<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\ColorModel;
use Auth;

class ColorController extends Controller
{
    public function list()
    {
        $data['getRecord'] = ColorModel::getRecord();
        $data['header_title'] = 'Color';
        return view('admin.color.list', $data);
    }

    public function add()
    {

        $data['header_title'] = 'Add New Color';
        return view('admin.color.add', $data);
    }

    public function insert(Request $request)
    {
        $color = new ColorModel;
        $color->name = trim($request->name);
        $color->code = trim($request->code);
        $color->status = trim($request->status);
        $color->created_by = Auth::user()->id;
        $color->save();

        return  redirect('admin/color/list')->with('success', "Color successfully created");
    }
    public function edite($id)
    {
        $data['getRecord'] = ColorModel::getSingle($id);
        $data['header_title'] = 'Edite Color';
        return view('admin.color.edite', $data);
    }

    public function update($id, Request $request)
    {

        $category = ColorModel::getSingle($id);
        $category->name = trim($request->name);
        $category->code = trim($request->code);
        $category->status = trim($request->status);
        $category->save();

        return  redirect('admin/color/list')->with('success', "Color successfully updated");
    }

    public function delete($id)
    {
        $category =  ColorModel::getSingle($id);
        $category->delete();
        return  redirect('admin/color/list')->with('success', "Color successfully deleted");
    }
}
