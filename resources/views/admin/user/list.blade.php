@extends('admin/layout/base',['title'=>'admin-categori'])

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Clients </h1>
    <p class="mb-4">
        Ce tableau presente la liste des clients inscrit sur la plateforme
    </p>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Clients ({{count($users)}})</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-white bg-dark">
                        <tr>
                            <th>N°</th>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>email</th>
                            <th>mobile</th>
                            <th>mode de paiement</th>
                            <th>pays</th>
                            <th>etat</th>
                            <th>ville</th>
                            <th>zipcode</th>
                            <th>nbr achat</th>
                        </tr>
                    </thead>
                    <tfoot class="text-white bg-dark">
                        <tr>
                            <th>N°</th>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>email</th>
                            <th>mobile</th>
                            <th>mode de paiement</th>
                            <th>pays</th>
                            <th>etat</th>
                            <th>ville</th>
                            <th>zipcode</th>
                            <th>nbr achat</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <th>{{$loop->index+1}}</th>
                            <th>{{$user->surname}}</th>
                            <th>{{$user->name}}</th>
                            <th>{{$user->email}}</th>
                            <th>{{$user->mobile}}</th>
                            <th>{{$user->payment_mode}}</th>
                            <th>{{$user->pays}}</th>
                            <th>{{$user->etat}}</th>
                            <th>{{$user->ville}}</th>
                            <th>{{$user->zipcode}}</th>
                            <th>{{count($user->articles_sold)}}</th>
                        </tr>
                        @endforeach
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection