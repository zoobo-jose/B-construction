<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Wish;
use App\Models\Article;

class WishController extends Controller
{
     /**
 	* affiche un article.
 	*
 	* @param  \Illuminate\Http\Request  $request
 	*/
	 public function displayWish(Request $request)
	 {
		 return view('pages/wishlist');
	 }

     public function addArticle(Request $request)
	 {
        $user=User::find(Auth::user()->id);
        $article_id=$request->article_id;
        $created_at=date('Y-m-d H:i:s');
        $n_article_wish=count($user->articles_wishs);
        $article=Article::find($article_id);

        if($article){

            $result=Wish::where('user_id',$user->id)
            ->where('article_id',$article_id)->get();

            if ($result->isEmpty()) { 
                $wish = Wish::create([
                    'article_id' => $article_id,
                    'user_id' => $user->id,
                    'created_at' => $created_at,
                 ]);
                 $wish->save();
                 return response()->json([
                    'message'=>"l'article ".$article->name." ajouté a la liste de souhaits",
                    "nbr_articles_wish"=> $n_article_wish+1,
                    "error"=>false
                ]);
            }else{
                return response()->json([
                    'message'=>"l'article ".$article->name." est déjà dans la liste de souhaits",
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

        $wish=Wish::where('user_id',$user->id)
        ->where('article_id',$article_id)->first();
        if($wish){
            $wish->delete();
            $article_removed['deleted']=true;
        }
		return view('pages/wishlist',compact('article_removed'));
	 }
}
