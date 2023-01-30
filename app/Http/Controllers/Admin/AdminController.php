<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use function PHPSTORM_META\type;

class AdminController extends Controller
{

    // public function index($local = 'en')
    // {
    //     App::setlocale($local);
    //     return view('admin.index');
    // }


    public function index()
    {
        //dd(Auth::user()->type);
        if (Auth::user()->type == 'user') {
            return redirect('/');
        }


        return view('admin.index');
    }
}
