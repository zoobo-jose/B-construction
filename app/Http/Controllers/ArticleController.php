<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Categori;
use Illuminate\Database\Eloquent\Builder;

class ArticleController extends Controller
{
    //
    /**
 	* list des articles.
 	*
 	* @param  \Illuminate\Http\Request  $request
 	*/
	public function listArticles(Request $request)
	{
		$NUMBER_ARTICLE_BY_PAGINATION=9;
		$querystringArray =  $request->only(['categori','search','order','min_price','max_price']); 

    	$categori = $request->categori;
		$search=$request->search;
		$order= $request->order;
		$min_price=$request->min_price;
		$max_price=$request->max_price;

		$articles=Article::when($categori,function($qwery)use($categori){
			$qwery->where('categori_id',$categori);
		})->when($search,function($qwery)use($search){
			$qwery->where(function (Builder $subQuery) use ($search) {
                $subQuery->where('name', 'like', '%'.$search.'%')
				->orWhere('description', 'like', '%'.$search.'%');
            });
		})->when($order,function($qwery)use($order){
			if($order=='new'){
				$qwery->orderBy('created_at', 'desc');
			}elseif($order=='featured'){
				//plus populaire

			}elseif($order=='sales'){
				//plus vendu
			}
		})->when($min_price,function($qwery)use($min_price){
			$qwery->where('prix', '>=', $min_price);
		})->when($max_price,function($qwery)use($max_price){
			$qwery->where('prix', '<=', $max_price);
		})->paginate($NUMBER_ARTICLE_BY_PAGINATION);


		$categoris=Categori::all();
		$articles_sidebar=Article::all()->take(3);
        return view('pages/product-list',compact('articles','querystringArray','categoris','articles_sidebar'));
	}
	 //
    /**
 	* affiche un article.
 	*
 	* @param  \Illuminate\Http\Request  $request
 	*/
	 public function displayArticle(Request $request)
	 {
		$NUMBER_ARTICLE_BY_PAGINATION=3;
		$articles_sidebar=Article::all()->take(3);
		$categoris=Categori::all();
		$article=Article::find($request->id);
		if( $request->has('id')){
			$article=Article::find($request->id);
		}
		$articles_connexes=Article::all()->where('categori_id',$article->categori_id);
		 return view('pages/product-detail',compact('article','categoris','articles_sidebar','articles_connexes'));
	 }

}
