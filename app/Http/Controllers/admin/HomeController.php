<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\SliderModel;
use App\models\CategoryModel;
use App\models\PartnerModel;





class HomeController extends Controller
{
    public function Home()
    {

        $data['getSlider'] = SliderModel::getRecordActive();
        $data['getCategory'] = CategoryModel::getRecordActiveHome();
        $data['getPartner'] = PartnerModel::getRecordActive();



        
        return view('Ecommerce.Home',$data);
    }
}
