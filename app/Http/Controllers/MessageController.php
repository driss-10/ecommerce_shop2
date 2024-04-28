<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Message; 

class MessageController extends Controller
{
    public function ShowMessage()
    {
        $messages = Message::all();
        return view('admin.message.list', compact('messages'));
    }
}
