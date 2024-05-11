<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\PartnerModel;
use Str;

class PartnerController extends Controller
{
    public function list(){
        $data['getRecord'] = PartnerModel::getRecord();
        $data['header_title']='Partner';
        return view('admin.partner.list',$data); 

    }


    public function add(){
       
        $data['header_title']='Add New Partner ';
        return view('admin.partner.add',$data); 
    }

    public function insert(Request $request)
    {
       
        $Partner = new PartnerModel;
        $Partner ->button_link= trim($request->button_link);
        $file = $request->file('image_name');
        $ext = $file->getClientOriginalExtension();
        $randomStr = Str::random(10);
        $filename = strtolower($randomStr) . '.' . $ext;
        $file->move('image/partner/', $filename);


        
        $Partner ->image_name = trim($filename);
        $Partner ->status = trim($request->status);
        $Partner ->save();

        return  redirect('admin/partner/list')->with('success', "partner successfully created");


    }  
    public function edite($id)
    {
        $data['getRecord'] = PartnerModel::getSingle($id);
        $data['header_title']='Edite slider';
        return view('admin.partner.edite',$data); 

    }

    public function update($id,Request $request)
    {
        
        
        $Partner= PartnerModel::getSingle($id);
        $Partner ->button_link= trim($request->button_link);
        if(!empty($request->file('image_name')))
        {
             $file = $request->file('image_name');
        $ext = $file->getClientOriginalExtension();
        $randomStr = Str::random(10);
        $filename = strtolower($randomStr) . '.' . $ext;
        $file->move('image/partner/', $filename);
        $Partner ->image_name = trim($filename);

        }
       


        
        $Partner ->status = trim($request->status);
        $Partner ->save();

        return  redirect('admin/partner/list')->with('success', "partner successfully updated");

    }
    public function delete($id){  
        $Partner =  PartnerModel::getSingle($id);
        $Partner ->is_delete = 1;
        $Partner ->save();
        
        return  redirect('admin/partner/list')->with('success', "partner successfully deleted");

    }
}
