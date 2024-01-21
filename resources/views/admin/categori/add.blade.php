@extends('admin/layout/base',['title'=>'admin-categori'])

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"> Ajoutez une categori</h1>
   
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Formulaire</h6>
        </div>
        <div class="card-body">
            <form class="user" method="POST" action="{{ route('admin.categori.add') }}">
                @csrf
                <div class="form-group">
                    <label class="text-gray-800 ont-weight-bold" > Nom </label>
                    <input type="text" name="name" class="form-control form-control-user">
                </div>
                <div class="form-group">
                    <label class="text-gray-800 ont-weight-bol" name="description"> Description </label>
                    <textarea type="text" name="description" class="form-control form-control-user"></textarea>
                </div>
                <div class="d-flex align-items-center justify-content-center">
                    <button class="btn btn-user bg-gradient-primary text-gray-100">
                        Ajouter
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>
@if(isset($message))
<script type="text/javascript">
    Swal.fire("{{$message['message']}}");
</script>
@endif
@endsection