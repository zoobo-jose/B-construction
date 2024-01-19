<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Newsletter\Facades\Newsletter;

class NewsletterController extends Controller
{

    public function store(Request $request)
    {
        request()->validate(['email' => 'required|email']);
        Newsletter::subscribe($request->email,[],'newsletter');
        // dd($request->email,Newsletter::hasMember($request->email),Newsletter::getLastError());
        // Newsletter::subscribe('rincewind@discworld.com');
        return redirect('/');
    }
}
