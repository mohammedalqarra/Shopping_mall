<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{

    // public function index($local = 'en')
    // {
    //     App::setlocale($local);
    //     return view('admin.index');
    // }


    public function index()
    {
        return view('admin.index');
    }
}