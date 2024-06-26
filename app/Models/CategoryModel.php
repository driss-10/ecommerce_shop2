<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    use HasFactory;

    protected $table = 'category';

    static public function getRecord()
    {
        return self::select('category.*', 'users.name as created_by_name')
            ->join('users', 'users.id', '=', 'category.created_by')
            ->where('category.is_delete', '=', 0)
            ->orderBy('category.id', 'desc')
            ->get();
    }

    static public function getSingle($id)
    {
        return self::find($id);
    }
    static public function getSingleSlug($slug)
    {
        return self::where('slug', '=', $slug)
            ->where('category.status', '=', 0)
            ->where('category.is_delete', '=', 0)
            ->first();
    }

    static public function getRecordActive()
    {
        return self::select('category.*')
            ->join('users', 'users.id', '=', 'category.created_by')
            ->where('category.is_delete', '=', 0)
            ->where('category.status', '=', 0)
            ->orderBy('category.name', 'asc')
            ->get();
    }

    static public function getRecordActiveHome()
    {
        return self::select('category.*')
            ->join('users', 'users.id', '=', 'category.created_by')
            ->where('category.is_delete', '=', 0)
            ->where('category.is_home', '=', 1)
            ->where('category.status', '=', 0)
            ->orderBy('category.id', 'asc')
            ->get();
    }
    static public function getRecordMenu()
    {
        return self::select('category.*')
            ->join('users', 'users.id', '=', 'category.created_by')
            ->where('category.is_delete', '=', 0)
            ->where('category.status', '=', 0)
            ->get();
    }

    public function getImage()
    {
        if(!empty($this->image_name) && file_exists('image/category/'.$this->image_name))
        {
            return url('image/category/'.$this->image_name);
        }
        else
        {
            return "";
        }

    }
   
    
    
}
