<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Categori;
use App\Models\Image;
use App\Models\Pdf;
use App\Models\Panier;
use App\Models\Wish;
use Illuminate\Support\Facades\Storage;

class AdminArticleController extends Controller
{
    private $QUANTITY_PDF = 2;

    public function list(Request $request)
    {
        $articles = Article::all();
        return view('admin.article.list', compact('articles'));
    }

    public function one(Request $request)
    {
        $article = Article::find($request->id);
        $categoris = Categori::All();
        return view('admin.article.one', compact('article', 'categoris'));
    }

    public function update(Request $request)
    {
        $message = [
            'message' => "Plan mis a jour",
            "error" => false
        ];
        $article = Article::find($request->id);
        $article->name = $request->name;
        $article->description = $request->description;
        $article->prix = $request->prix;
        $article->categori_id = $request->categori_id;
        $article->save();
        $categoris = Categori::All();
        return view('admin.article.one', compact('article', 'categoris', 'message'));
    }
    public function addForm(Request $request)
    {

        $categoris = Categori::All();
        $article= new Article;
        return view('admin.article.add', compact('categoris','article'));
    }
    public function add(Request $request)
    {
        $message = [
            'message' => "Plan ajouter",
            "error" => false
        ];
        $article = new Article;
        //information de base
        $article->name = $request->name;
        $article->description = $request->description;
        $article->prix = $request->prix;
        $article->categori_id = $request->categori_id;

        $img = $request->file('image');
        $pdf_file1 = $request->file('pdf1');
        $pdf_file2 = $request->file('pdf2');
        if ($img&&$img->isReadable()) {
            if ($pdf_file1&&$pdf_file1->isReadable()) {
                if ($pdf_file2&&$pdf_file2->isReadable()) {
                    $created_at = date('Y-m-d H:i:s');
                    $article->created_at = $created_at;
                    $article->save();
                    //image
                    $img_description = $request->description_image;
                    if ($img) {
                        $image = new Image;
                        //enregistrer le fichier
                        $url_file = Storage::disk('local')->put('images', $img);
                        //modifier l'image
                        $image->article_id = $article->id;
                        $image->url = $url_file;
                        $image->created_at = $created_at;
                        $image->description = $img_description;
                        $image->save();
                    }
                    //pdf1
                    $pdf_file = $pdf_file1;
                    $pdf_description = $request->description_pdf1;
                    if ($pdf_file) {
                        $pdf = new Pdf;
                        //enregistrer le fichier
                        $url_file = Storage::disk('local')->put('pdfs', $pdf_file);
                        //modifier l'image
                        $pdf->article_id = $article->id;
                        $pdf->url = $url_file;
                        $pdf->created_at = $created_at;
                        $pdf->description = $img_description;
                        $pdf->save();
                    }
                    //pdf2
                    $pdf_file =  $pdf_file2;
                    $pdf_description = $request->description_pdf2;
                    if ($pdf_file) {
                        $pdf = new Pdf;
                        //enregistrer le fichier
                        $url_file = Storage::disk('local')->put('pdfs', $pdf_file);
                        //modifier l'image
                        $pdf->article_id = $article->id;
                        $pdf->url = $url_file;
                        $pdf->created_at = $created_at;
                        $pdf->description = $img_description;
                        $pdf->save();
                    }
                } else {
                    $message['error'] = true;
                    $message['message'] = "Le fichier pdf1 rencontre un problem! si vous etes sur linux , verifiez si vous avez les droit en ecriture sur ce fichier";
                }
            } else {
                $message['error'] = true;
                $message['message'] = "Le fichier pdf1 rencontre un problem! si vous etes sur linux , verifiez si vous avez les droit en ecriture sur ce fichier";
            }
        } else {
            $message['error'] = true;
            $message['message'] = "L'image rencontre un problem! si vous etes sur linux , verifiez si vous avez les droit en ecriture sur ce fichier";
        }

        $categoris = Categori::All();
        return view('admin.article.add', compact('article', 'categoris', 'message'));
    }

    public function delete(Request $request){
        $article=Article::find($request->id);
        if($article){
            //supprimer les images
            foreach($article->images as $image){
                //supprimer le ficjier
                Storage::disk('local')->delete($image->url);
                $image->delete();
            }
            //supprimer les pdfs
            foreach($article->pdfs as $pdf){
                //supprimer le ficjier
                Storage::disk('local')->delete($pdf->url);
                $pdf->delete();
            }
            //supprimer les panier et wish
            Panier::where('article_id',$article->id)->delete();
            Wish::where('article_id',$article->id)->delete();
            //supprimer l'article
            $article->delete();
        }
        return back();
    }

    public function updateImage(Request $request)
    {
        $article = Article::find($request->article_id);
        $image = Image::find($request->image_id);
        $file = $request->file('file');
        $description = $request->description;
        $image->description = $description;
        if ($file&&$file->isReadable()) {
            //enregistrer le fichier
            $url_file = Storage::disk('local')->put('images', $file);
            //supprimer l'ancien fichier
            Storage::disk('local')->delete($image->url);
            //modifier l'image
            $image->url = $url_file;
        }

        $image->save();

        $categoris = Categori::All();
        return view('admin.article.one', compact('article', 'categoris'));
    }

    public function addImage(Request $request)
    {
        $article = Article::find($request->article_id);
        $image = new Image;
        $file = $request->file('file');
        $description = $request->description;
        $created_at = date('Y-m-d H:i:s');
        $image->description = $description;
        $image->created_at = $created_at;
        $image->article_id = $request->article_id;
        if ($file&&$file->isReadable()) {
            //enregistrer le fichier
            $url_file = Storage::disk('local')->put('images', $file);
            //modifier l'image
            $image->url = $url_file;
            $image->save();
        }

        $categoris = Categori::All();
        return view('admin.article.one', compact('article', 'categoris'));
    }

    public function deleteImage(Request $request)
    {
        $article = Article::find($request->article_id);
        $image = Image::find($request->image_id);
        if ($image) {
            //supprimer le fichier
            Storage::disk('local')->delete($image->url);
            $image->delete();
        }

        $categoris = Categori::All();
        return view('admin.article.one', compact('article', 'categoris'));
    }

    public function updatePdf(Request $request)
    {
        $article = Article::find($request->article_id);
        $pdf = Pdf::find($request->pdf_id);
        $file = $request->file('file');
        $description = $request->description;
        $pdf->description = $description;
        if ($file&&$file->isReadable()) {
            //enregistrer
            $url_file = Storage::disk('local')->put('pdfs', $file);
            //supprimer l'ancien
            Storage::disk('local')->delete($pdf->url);
            //modifier le pdf
            $pdf->url = $url_file;
        }
        $pdf->save();

        $categoris = Categori::All();
        return view('admin.article.one', compact('article', 'categoris'));
    }

    public function addPdf(Request $request)
    {
        $article = Article::find($request->article_id);
        $pdfs = Pdf::where('article_id', $request->article_id)->get();
        if (count($pdfs) < $this->QUANTITY_PDF) {
            $pdf = new Pdf;
            $file = $request->file('file');
            $description = $request->description;
            $created_at = date('Y-m-d H:i:s');
            $pdf->description = $description;
            $pdf->created_at = $created_at;
            $pdf->article_id = $request->article_id;
            if ($file && $file->isReadable()) {
                //enregistrer le fichier
                $url_file = Storage::disk('local')->put('pdfs', $file);
                //modifier 
                $pdf->url = $url_file;
                $pdf->save();
            }
        }

        $categoris = Categori::All();
        return view('admin.article.one', compact('article', 'categoris'));
    }

    public function deletePdf(Request $request)
    {
        $article = Article::find($request->article_id);
        $pdf = Pdf::find($request->pdf_id);
        if ($pdf) {
            //supprimer le fichier
            Storage::disk('local')->delete($pdf->url);
            $pdf->delete();
        }

        $categoris = Categori::All();
        return view('admin.article.one', compact('article', 'categoris'));
    }
}
