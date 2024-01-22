<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function profil(Request $request)
    {
        return view('admin.profile');
    }
}
