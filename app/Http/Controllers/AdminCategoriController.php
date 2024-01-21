<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Categori;

class AdminCategoriController extends Controller
{
    
     //
    /**
 	* list des articles.
 	*
 	* @param  \Illuminate\Http\Request  $request
 	*/
	public function list(Request $request)
	{
        $categoris=Categori::all();
        return view('admin.categori.list',compact('categoris'));
    }

    public function add(Request $request)
    {
       $name=$request->name;
       $description=$request->description;
       $created_at=date('Y-m-d H:i:s');
       $result=Categori::where('name',$name)->get();
       $message=[
        'message'=>"la categorie ".$name." existe déjà",
        "error"=> true
       ];

           if ($result->isEmpty()) { 
               $new = Categori::create([
                   'description' => $description,
                   'name' => $name,
                   'created_at' => $created_at,
                ]);
                $new->save();
                $message=[
                   'message'=>"categorie ".$name." ajouté ",
                   "error"=>false
               ];
           }
           return view('admin.categori.add',compact('message'));
    }

    public function updateForm(Request $request,$id)
    {
        $categori=Categori::find($id);
        return view('admin.categori.update',compact('categori'));
    }

    public function update(Request $request)
    {
       $id=$request->id;
       $name=$request->name;
       $description=$request->description;
       $updated_at=date('Y-m-d H:i:s');
       $result=Categori::where('name',$name)->get();
       $message=[
        'message'=>"la categorie ".$name." existe déjà",
        "error"=> true
       ];

           if ($result->isEmpty()) { 
               $new = Categori::find($id);
               $new->name=$name;
               $new->description=$description;
               $new->updated_at=$updated_at;
               $new->save();
                $message=[
                   'message'=>"categorie mis a jour ",
                   "error"=>false
               ];
           }
           $categori=Categori::find($id);
           return view('admin.categori.update',compact('categori','message'));
    }

    public function remove(Request $request,$id){
        $message=[
            'deleted'=>false,
            'message'=>"Cette categorie n'existe pas",
        ];
        $categori=Categori::find($id);
        if($categori){
            $categori->delete();
            $message['message']='Categorie supprimee';
        }
        $categoris=Categori::all();
       
        return view('admin.categori.list',compact('categoris','message'));
    }
}
