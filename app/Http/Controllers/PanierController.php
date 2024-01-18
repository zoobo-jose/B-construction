<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Panier;
use App\Models\Article;

class PanierController extends Controller
{
    /**
 	* affiche un article.
 	*
 	* @param  \Illuminate\Http\Request  $request
 	*/
	 public function displayPanier(Request $request)
	 {
        $user=User::find(Auth::user()->id);
        $total_prize=0;
        foreach($user->articles_no_sold as $art){
            $total_prize+=$art->prix;
        }
		 return view('pages/cart',compact('total_prize'));
	 }
     public function addArticle(Request $request)
	 {
        $user=User::find(Auth::user()->id);
        $article_id=$request->article_id;
        $created_at=date('Y-m-d H:i:s');
        $n_article=count($user->articles_no_sold);
        $article=Article::find($article_id);

        if($article){

            $result=Panier::where('user_id',$user->id)
            ->where('article_id',$article_id)
            ->where('sold',false)->get();

            if ($result->isEmpty()) { 
                $panier = Panier::create([
                    'article_id' => $article_id,
                    'user_id' => $user->id,
                    'created_at' => $created_at,
                 ]);
                 $panier->save();
                 return response()->json([
                    'message'=>"l'article ".$article->name." ajouté au panier",
                    "nbr_articles"=> $n_article+1,
                    "error"=>false
                ]);
            }else{
                return response()->json([
                    'message'=>"l'article ".$article->name." est déjà dans le panier",
                    "error"=> true
                ]);
            }
        }else{
            return response()->json([
                'message'=>"l'article n'existe pas",
                "error"=> true
            ]);
        }
       
	 }
     public function removeArticle(Request $request)
	 {
        $article_id=$request->article_id;
        $user=User::find(Auth::user()->id);
        $article=Article::find($article_id);
        $article_removed=[
            'deleted'=>false,
            'article_name'=>$article->name,
        ];

        $panier=Panier::where('user_id',$user->id)
        ->where('article_id',$article_id)
        ->where('sold',false)->first();
        if($panier){
            $panier->delete();
            $article_removed['deleted']=true;
        }
        $article_id=$request->article_id;
        $total_prize=0;
        foreach($user->articles_no_sold as $art){
            $total_prize+=$art->prix;
        }
		return view('pages/cart',compact('total_prize','article_removed'));
	 }
}
