<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\SliderModel;
use Str;
use Auth;


class SlideController extends Controller
{
    public function list(){
        $data['getRecord'] = SliderModel::getRecord();
        $data['header_title']='Slide';
        return view('admin.slider.list',$data); 

    }


    public function add(){
       
        $data['header_title']='Add New slider ';
        return view('admin.slider.add',$data); 
    }

    public function insert(Request $request)
    {
       
        $slider = new SliderModel;
        $slider ->title = trim($request->title);
        $slider ->image_name = trim($request->image_name);
        $slider ->button_name= trim($request->button_name);
        $slider ->button_link= trim($request->button_link);

        $file = $request->file('image_name');
        $ext = $file->getClientOriginalExtension();
        $randomStr = Str::random(10);
        $filename = strtolower($randomStr) . '.' . $ext;
        $file->move('image/slider/', $filename);


        
        $slider -> image_name = trim($filename);
        $slider -> status = trim($request->status);
        $slider ->save();

        return  redirect('admin/slider/list')->with('success', "Slider successfully created");


    }  
    public function edite($id)
    {
        $data['getRecord'] = SliderModel::getSingle($id);
        $data['header_title']='Edite slider';
        return view('admin.slider.edite',$data); 

    }

    public function update($id,Request $request)
    {
        
        
        $slider= SliderModel::getSingle($id);
        $slider ->title = trim($request->title);
        $slider ->image_name = trim($request->image_name);
        $slider ->button_name= trim($request->button_name);
        $slider ->button_link= trim($request->button_link);
        if(!empty($request->file('image_name')))
        {
             $file = $request->file('image_name');
        $ext = $file->getClientOriginalExtension();
        $randomStr = Str::random(10);
        $filename = strtolower($randomStr) . '.' . $ext;
        $file->move('image/slider/', $filename);
        $slider -> image_name = trim($filename);

        }
       


        
        $slider -> status = trim($request->status);
        $slider ->save();

        return  redirect('admin/slider/list')->with('success', "Slider successfully updated");

    }
    public function delete($id){  
        $slider =  SliderModel::getSingle($id);
        $slider ->is_delete = 1;
        $slider ->save();
        
        return  redirect('admin/slider/list')->with('success', "Slider successfully deleted");

    }

    
}
