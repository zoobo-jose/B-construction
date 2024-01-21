@extends('admin/layout/base',['title'=>'admin-categori'])

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Ventes </h1>
    <p class="mb-4">
        Ce tableau presente la liste des Ventes
    </p>
    <div >
        <span class="text-dark">Gain :</span>
        <span class="text-info" > {{$total_amount}} XAF</span>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Ventes ({{count($paniers)}})</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-white bg-dark">
                        <tr>
                            <th>N°</th>
                            <th>Client</th>
                            <th>client email</th>
                            <th>plan</th>
                            <th>prix</th>
                        </tr>
                    </thead>
                    <tfoot class="text-white bg-dark">
                        <tr>
                            <th>N°</th>
                            <th>Client</th>
                            <th>client email</th>
                            <th>plan</th>
                            <th>prix</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($paniers as $pan)
                        <tr>
                            <th>{{$loop->index+1}}</th>
                            <th>{{$pan->user->name}}</th>
                            <th>{{$pan->user->email}}</th>
                            <th>{{$pan->article->name}}</th>
                            <th>{{$pan->article->prix}}</th>
                        </tr>
                        @endforeach
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection