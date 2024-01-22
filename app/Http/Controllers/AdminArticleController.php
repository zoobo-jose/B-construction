<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Categori;
use App\Models\Image;
use App\Models\Pdf;
use Illuminate\Support\Facades\Storage;

class AdminArticleController extends Controller
{
    private $QUANTUTY_PDF=2;
    public function list(Request $request)
	{
        $articles=Article::all();
        return view('admin.article.list',compact('articles'));
    }

    public function one(Request $request)
	{
        $article=Article::find($request->id);
        $categoris=Categori::All();
        return view('admin.article.one',compact('article','categoris'));
    }

    public function update(Request $request)
	{
        $message=[
            'message'=>"Plan mis a jour",
            "error"=> false
           ];
        $article=Article::find($request->id);
        $article->name=$request->name;
        $article->description=$request->description;
        $article->prix=$request->prix;
        $article->categori_id=$request->categori_id;
        $article->save();
        $categoris=Categori::All();
        return view('admin.article.one',compact('article','categoris','message'));
    }
    
    public function updateImage(Request $request)
	{
        $article=Article::find($request->article_id);
        $image=Image::find($request->image_id);
        $file = $request->file('file');
        $description=$request->description;
        $image->description=$description;
        if($file){
                //enregistrer le fichier
                $url_file=Storage::disk('local')->put('images', $file);
                //supprimer l'ancien fichier
                Storage::disk('local')->delete($image->url);
                //modifier l'image
                $image->url=$url_file;
        }

        $image->save();

        $categoris=Categori::All();
        return view('admin.article.one',compact('article','categoris'));
    }

    public function addImage(Request $request)
	{
        $article=Article::find($request->article_id);
        $image=new Image;
        $file = $request->file('file');
        $description=$request->description;
        $created_at=date('Y-m-d H:i:s');
        $image->description=$description;
        $image->created_at=$created_at;
        $image->article_id=$request->article_id;
        if($file){
                //enregistrer le fichier
                $url_file=Storage::disk('local')->put('images', $file);
                //modifier l'image
                $image->url=$url_file;
                $image->save();
        }
         
        $categoris=Categori::All();
        return view('admin.article.one',compact('article','categoris'));
    }

    public function deleteImage(Request $request)
	{
        $article=Article::find($request->article_id);
        $image=Image::find($request->image_id);
        if($image){
                //supprimer le fichier
                Storage::disk('local')->delete($image->url);
                $image->delete();
               
        }

        $categoris=Categori::All();
        return view('admin.article.one',compact('article','categoris'));
    }

    public function updatePdf(Request $request)
	{
        $article=Article::find($request->article_id);
        $pdf=Pdf::find($request->pdf_id);
        $file = $request->file('file');
        $description=$request->description;
        $pdf->description=$description;
        if($file){
                //enregistrer
                $url_file=Storage::disk('local')->put('pdfs', $file);
                //supprimer l'ancien
                Storage::disk('local')->delete($pdf->url);
                //modifier le pdf
                $pdf->url=$url_file;
        }
        $pdf->save();

        $categoris=Categori::All();
        return view('admin.article.one',compact('article','categoris'));
    }

    public function addPdf(Request $request)
	{
        $article=Article::find($request->article_id);
        $pdfs=Pdf::where('article_id',$request->article_id)->get();
        if(count($pdfs)<$this->QUANTUTY_PDF){
            $pdf=new Pdf;
            $file = $request->file('file');
            $description=$request->description;
            $created_at=date('Y-m-d H:i:s');
            $pdf->description=$description;
            $pdf->created_at=$created_at;
            $pdf->article_id=$request->article_id;
            if($file){
                    //enregistrer le fichier
                    $url_file=Storage::disk('local')->put('pdfs', $file);
                    //modifier 
                    $pdf->url=$url_file;
                    $pdf->save();
            }
        }
         
        $categoris=Categori::All();
        return view('admin.article.one',compact('article','categoris'));
    }

    public function deletePdf(Request $request)
	{
        $article=Article::find($request->article_id);
        $pdf=Pdf::find($request->pdf_id);
        if($pdf){
                //supprimer le fichier
                Storage::disk('local')->delete($pdf->url);
                $pdf->delete();
               
        }

        $categoris=Categori::All();
        return view('admin.article.one',compact('article','categoris'));
    }
    

}
