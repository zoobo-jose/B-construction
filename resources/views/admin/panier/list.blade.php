@extends('admin/layout/base',['title'=>'admin-plans'])

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Vente </h1>
    <p class="mb-4">
        Ce tableau presente la liste des ventes
    </p>
    <span>
        <span class="text-dark"> Gain :</span>
        <span  class="text-info">{{$total_amount}} XAF</span>
    </span>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">ventes ({{count($paniers)}})</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-white bg-dark">
                        <tr>
                            <th>N°</th>
                            <th>nom client</th>
                            <th>email client</th>
                            <th>plan</th>
                            <th>prix (XAF)</th>
                        </tr>
                    </thead>
                    <tfoot class="text-white bg-dark">
                        <tr>
                            <th>N°</th>
                            <th>nom client</th>
                            <th>email client</th>
                            <th>plan</th>
                            <th>prix (XAF)</th>
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