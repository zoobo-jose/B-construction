@extends('admin/layout/base',['title'=>'admin-article'])

@section('content')

<div class="container-fluid">
    <span>
        <a href="{{route('admin.articles')}}"> liste</a>
    </span>
   <h3>Article</h3>
   <h5>information de base</h5>
   <form class="card shadow mb-4" method="POST" action="{{ route('admin.article.add') }}">
    @csrf
    <div class="card-body">
          <div class="form-group">
            <label for="formGroupExampleInput">Nom</label>
            <input type="text" class="form-control" id="formGroupExampleInput" 
            name="name" required placeholder="nom">
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">Description</label>
            <textarea type="text" class="form-control" id="formGroupExampleInput2" 
            name="description" required placeholder="Another input"></textarea>
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput">Prix</label>
            <input min="0" type="number" class="form-control" id="formGroupExampleInput"
            name="prix" required >
          </div>
          <div class="form-group">
            <label for="inputState">Categorie</label>
            <select id="inputState" class="form-control" name="categori_id" required>
              @foreach ($categoris as $cat)
                    <option value="{{$cat->id}}" >{{$cat->name}}</option>
              @endforeach
           </select>
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput">Image</label>
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="image" accept=".png,.jpg,.jpeg,.webp">
                <label class="custom-file-label" for="validatedCustomFile">Nouvelles image...</label>
                <div class="invalid-feedback">Example invalid custom file feedback</div>
              </div>
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput">pdf 1</label>
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="pdf1" accept=".pdf">
                <label class="custom-file-label" for="validatedCustomFile">Nouveau pdf...</label>
                <div class="invalid-feedback">Example invalid custom file feedback</div>
              </div>
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput">pdf 2</label>
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="pdf2" accept=".pdf">
                <label class="custom-file-label" for="validatedCustomFile">Nouveau pdf...</label>
                <div class="invalid-feedback">Example invalid custom file feedback</div>
              </div>
          </div>
          <button type="submit" class="btn bg-gradient-primary text-white">Ajouter</button>
    </div>
   </form>
</div>
@if(isset($message))
<script type="text/javascript">
    Swal.fire("{{$message['message']}}");
</script>
@endif


@endsection