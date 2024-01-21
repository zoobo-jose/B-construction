<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Panier;

class AdminPanierController extends Controller
{
    public function list(Request $request)
	{
        $paniers=Panier::where('sold',true)->get();
        $total_amount=0;
        foreach($paniers as $pan){
            $total_amount+=$pan->article->prix;
        }
        return view('admin.panier.list',compact('paniers','total_amount'));
    }
}
