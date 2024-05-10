<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\SliderModel;



class HomeController extends Controller
{
    public function Home()
    {

        $data['getSlider'] = SliderModel::getRecordActive();
        
        return view('Ecommerce.Home',$data);
    }
}
