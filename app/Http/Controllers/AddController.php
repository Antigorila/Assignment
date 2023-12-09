<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddController extends Controller
{
    public function addCategory()
    {
        return view('add.add_category');
    }
    public function addTask()
    {
        return view('add.add_task');
    }
}
