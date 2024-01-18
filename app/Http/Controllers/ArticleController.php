<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Categori;

class ArticleController extends Controller
{
    //
    /**
 	* Store a new user.
 	*
 	* @param  \Illuminate\Http\Request  $request
 	* @return \Illuminate\Http\Response
 	*/
	public function listArticles(Request $request)
	{
		$querystringArray =  $request->only(['categori','search','order']); 
    	$categori = $request->categori;
		$articles=Article::when($categori,function($qwery)use($categori){
			$qwery->where('categori_id',$categori);
		})->paginate(9);
		$categoris=Categori::all();
		$articles_sidebar=Article::all()->take(3);
        return view('pages/product-list',compact('articles','querystringArray','categoris','articles_sidebar'));
	}

}
