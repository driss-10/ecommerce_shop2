<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SliderModel extends Model
{
    use HasFactory;

    protected $table = 'slide';

    static public function getRecord()
    {
    return self::select('slide.*')
        ->where('slide.is_delete', '=' , 0)
        ->orderBy('slide.id', 'desc')
        ->paginate(20);
        

    }

    static public function getRecordActive()
    {
    return self::select('slide.*')
        ->where('slide.is_delete', '=' , 0)
        ->where('slide.status', '=' , 0)
        ->orderBy('slide.id', 'asc')
        ->get();
        

    }

    static public function getSingle($id){
        return self::find($id);
    }

    public function getImage()
    {
        if(!empty($this->image_name) && file_exists('image/slider/'.$this->image_name))
        {
            return url('image/slider/'.$this->image_name);
        }
        else
        {
            return "";
        }

    }
}
