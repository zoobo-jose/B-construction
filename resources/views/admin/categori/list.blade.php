@extends('admin/layout/base',['title'=>'admin-categori'])

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Categories de plan</h1>
    <p class="mb-4">
        Ce tableau presente la liste des categories que vous pouvez attribuer a un plan architectural
    </p>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Categoris ({{count($categoris)}})</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead  class="text-white bg-dark">
                        <tr>
                            <th>N°</th>
                            <th>Nom</th>
                            <th>Description</th>
                            <th>modifier</th>
                            <th>supprimer</th>
                        </tr>
                    </thead>
                    <tfoot class="text-white bg-dark">
                        <tr>
                            <th>N°</th>
                            <th>Nom</th>
                            <th>Description</th>
                            <th>modifier</th>
                            <th>supprimer</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($categoris as $cat)
                        <tr>
                            <th>{{$loop->index+1}}</th>
                            <th>{{$cat->name}}</th>
                            <th>{{$cat->description}}</th>
                            <th>
                                <a class="btn bg-gradient-primary text-gray-100" href="{{route('admin.categori.update.form',['id'=>$cat->id])}}">modifier</a>
                            </th>
                            <th>
                                <form class="user" method="POST" action="{{ route('admin.categori.remove',['id'=>$cat->id]) }}">
                                    @csrf
                                    @method('delete')
                                    <button class="btn bg-gradient-primary text-gray-100">
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
@if(isset($message))
<script type="text/javascript">
    Swal.fire("{{$message['message']}}");
</script>
@endif
@endsection