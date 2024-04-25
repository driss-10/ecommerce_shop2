<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use App\Models\User;


class AdminController extends Controller
{
    public function list(){
        $data['getRecord'] = User::getAdmin();
        $data['header_title']='admin';
        return view('admin.admin.list',$data); 
    }

    
    public function add(){
       
        $data['header_title']='Add New Admin';
        return view('admin.admin.add',$data); 
    }

    public function insert(Request $request){
        $user = New User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->name);
        $user->status = $request->status;
        $user->is_admin = 1;
        $user->save();
        return  redirect('admin/admin/list')->with('success', "admin successfully created");
    }

    public function edite($id)
    {
        $data['getRecord'] = User::getSingle($id);
        $data['header_title']='Edite dmin';
        return view('admin.admin.edite',$data); 

    }

    public function update($id, Request $request){
        $user = User::getSingle($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if(!empty($request->password)){

         $user->password = Hash::make($request->name);
        }

        $user->status = $request->status;
        $user->is_admin = 1;
        $user->save();
        return  redirect('admin/admin/list')->with('success', "admin successfully updated");
}
        public function delete($id)
        {
            $user = User::getSingle($id);       
            $user->is_delete = 1;
            $user->save();
            return  redirect()->back()->with('success', "admin successfully deleted");

            

        }
}
