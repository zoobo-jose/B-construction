@extends('admin/layout/base',['title'=>'admin-categori'])

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Plans architecturaux </h1>
    <p class="mb-4">
        Ce tableau presente la liste des plans architecturaux
    </p>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">plans ({{count($articles)}})</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-white bg-dark">
                        <tr>
                            <th>N°</th>
                            <th>image</th>
                            <th>nom</th>
                            <th>description</th>
                            <th>prix (XAF)</th>
                            <th>categorie</th>
                            <th>nbr vente(s)</th>
                            <th>voir</th>
                             <!--
                            <th>modifier</th>
                             -->
                            <th>supprimer</th>
                        </tr>
                    </thead>
                    <tfoot class="text-white bg-dark">
                        <tr>
                            <th>N°</th>
                            <th>image</th>
                            <th>nom</th>
                            <th>description</th>
                            <th>prix (XAF)</th>
                            <th>categorie</th>
                            <th>nbr vente(s)</th>
                            <th>voir</th>
                             <!--
                            <th>modifier</th>
                             -->
                            <th>supprimer</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($articles as $art)
                        <tr>
                            <th>{{$loop->index+1}}</th>
                            <th><img src="{{asset($art->image->url)}}" style="object-fit:contain;width:150px;height:100px;background-color:black;" alt=""></th>
                            <th>{{$art->name}}</th>
                            <th>{{$art->description}}</th>
                            <th>{{$art->prix}}</th>
                            <th>{{$art->categori->name}}</th>
                            <th>{{count($art->ventes)}}</th>
                            <th>
                                <a class="btn bg-gradient-primary text-gray-100" href="{{route('admin.article',['id'=>$art->id])}}">voir</a>
                            </th>
                            <!--
                            <th>
                                <a class="btn bg-gradient-primary text-gray-100" href="">modifier</a>
                            </th>
                            -->
                            <th>
                                <form method="POST" action="{{ route('admin.article.delete') }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="id" value={{$art->id}}>
                                    <button class="btn bg-gradient-danger text-gray-100">
                                        supprimer
                                    </button>
                                </form>
                            </th>
                        </tr>
                        @endforeach
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection