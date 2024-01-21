<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminUserController extends Controller
{
    public function list(Request $request)
	{
        $users=User::all();
        return view('admin.user.list',compact('users'));
    }
}
