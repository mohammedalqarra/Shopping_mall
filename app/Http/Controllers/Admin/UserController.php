<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {



        $users = User::where('type', 'user')->orderByDesc('id')->paginate(5);

        if (request()->has('user')) {
            $users = User::where('name', 'like', '%' . request()->user . '%')->orderBy('id', 'desc')->paginate(10);
        } else {
            $users = User::orderByDesc('id')->paginate(10);
        }

        return view('admin.users.index', compact('users'));
    }
    public function destroy($id)
    {

        User::destroy($id);
        return redirect()->route('admin.users.index')->with('msg', 'User deleted successfully')->with('type', 'danger');
    }
}