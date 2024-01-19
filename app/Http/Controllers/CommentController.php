<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
     /**
 	* affiche un article.
 	*
 	* @param  \Illuminate\Http\Request  $request
 	*/
	 public function addComment(Request $request)
	 {
        $user_name=$request->user_name;
        $user_email=$request->user_email;
        $user_rate=$request->user_rate;
        $content=$request->user_name;
        $article_id=$request->article_id;
        $created_at=date('Y-m-d H:i:s');
        $n_comments= count(Comment::where('article_id', $article_id)->get());
        $comment = Comment::create([
            'article_id' => $article_id,
            'user_name' => $user_name,
            'user_email' => $user_email,
            'user_rate' => $user_rate,
            'content'=>$content,
            'created_at' => $created_at,
         ]);
         $comment->save();
        
         return response()->json([
            'message'=>"Commentaire envoyé",
            "n_comments"=> $n_comments+1,
            "error"=>false,
            'comment'=> $comment
        ]);
	 }
}
