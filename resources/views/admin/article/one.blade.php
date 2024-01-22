@extends('admin/layout/base',['title'=>'admin-article'])

@section('content')

<div class="container-fluid">
    <span>
        <a href="{{route('admin.articles')}}"> liste</a>
    </span>
   <h3>Article</h3>
   <h5>information de base</h5>
   <form class="card shadow mb-4" method="POST" action="{{ route('admin.article.update') }}">
    @csrf
    @method('put')
    <input type="hidden" name="id" value={{$article->id}}>
    <div class="card-body">
          <div class="form-group">
            <label for="formGroupExampleInput">Nom</label>
            <input type="text" class="form-control" id="formGroupExampleInput" 
            name="name" required value="{{$article->name}}">
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">Description</label>
            <textarea type="text" class="form-control" id="formGroupExampleInput2" 
            name="description" required placeholder="Another input">{{$article->description}}</textarea>
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput">Prix</label>
            <input min="0" type="number" class="form-control" id="formGroupExampleInput"
            name="prix" required value="{{$article->prix}}">
          </div>
          <div class="form-group">
            <label for="inputState">Categorie</label>
            <select id="inputState" class="form-control" name="categori_id" required>
              @foreach ($categoris as $cat)
              @if($cat->id==$article->categori_id)
                    <option value="{{$cat->id}}" selected>{{$cat->name}}</option>
              @else
                    <option value="{{$cat->id}}" >{{$cat->name}}</option>
              @endif
              @endforeach
           </select>
          </div>
          <button type="submit" class="btn bg-gradient-primary text-white">Mettre a jour</button>
    </div>
   </form>

    <!--debut les images -->
   <h5>Images</h5>
   <div class="parent-div-img">
    @foreach ($article->images as $img)
    <div class="div-img shadow">
        <h6>Image {{$loop->index+1}}</h6>
        <img src="{{asset($img->url)}}" alt="">
        <form method="POST" action="{{ route('admin.article.update.image') }}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <input type="hidden" name="article_id" value="{{$article->id}}">
            <input type="hidden" name="image_id" value="{{$img->id}}">
            <div class="form-group">
                <label for="formGroupExampleInput2">Description</label>
                <textarea type="text" class="form-control" id="formGroupExampleInput2" 
                name="description"  placeholder="Another input">{{$img->description}}</textarea>
            </div>
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="file" accept=".png,.jpg,.jpeg,.webp">
                <label class="custom-file-label" for="validatedCustomFile">Nouvelles image...</label>
                <div class="invalid-feedback">Example invalid custom file feedback</div>
              </div>
              <button type="submit" class="btn bg-gradient-primary text-white">Mettre a jour</button>
        </form>
        <form method="POST" action="{{ route('admin.article.delete.image') }}">
            @csrf
            @method('delete')
            <input type="hidden" name="article_id" value="{{$article->id}}">
            <input type="hidden" name="image_id" value="{{$img->id}}">
            <button type="submit" class="btn bg-gradient-danger text-white">supprimer</button>
        </form>
    </div>
    @endforeach
    <div class="div-img shadow">
        <h6>Ajouter une image</h6>
        <form method="POST" action="{{ route('admin.article.add.image') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="article_id" value="{{$article->id}}">
            <div class="form-group">
                <label for="formGroupExampleInput2">Description</label>
                <textarea type="text" class="form-control" id="formGroupExampleInput2" 
                name="description" required placeholder="description"></textarea>
              </div>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="validatedCustomFile" name="file" required accept=".png,.jpg,.jpeg,.webp">
                <label class="custom-file-label" for="validatedCustomFile">Nouvelles image...</label>
                <div class="invalid-feedback">Example invalid custom file feedback</div>
              </div>
            <button type="submit" class="btn bg-gradient-primary text-white">Ajouter</button>
        </form>
    </div>
   </div>
   <h5>Pdfs</h5>
   <div class="parent-div-img">
    @foreach ($article->pdfs as $pdf)
    <div class="div-img shadow">
        <h6>pdf {{$loop->index+1}}</h6>
        <iframe src="{{asset($pdf->url)}}"></iframe>
        <form method="POST" action="{{ route('admin.article.update.pdf') }}" enctype="multipart/form-data">
          @csrf
          @method('put')
          <input type="hidden" name="article_id" value="{{$article->id}}">
          <input type="hidden" name="pdf_id" value="{{$pdf->id}}">
          <div class="form-group">
            <label for="formGroupExampleInput2">Description</label>
            <textarea type="text" class="form-control" id="formGroupExampleInput2" 
            name="description"  placeholder="Another input">{{$pdf->description}}</textarea>
        </div>
            <div class="custom-file">
                <input type="file" name="file" class="custom-file-input" id="validatedCustomFile" required accept=".pdf">
                <label class="custom-file-label" for="validatedCustomFile">Nouveau pdf...</label>
                <div class="invalid-feedback">Example invalid custom file feedback</div>
              </div>
              <button type="submit" class="btn bg-gradient-primary text-white">Mettre a jour</button>
        </form>
        <form method="POST" action="{{ route('admin.article.delete.pdf') }}">
          @csrf
          @method('delete')
          <input type="hidden" name="article_id" value="{{$article->id}}">
          <input type="hidden" name="pdf_id" value="{{$pdf->id}}">
          <button type="submit" class="btn bg-gradient-danger text-white">supprimer</button>
      </form>
    </div>
    @endforeach
    @if(count($article->pdfs)<2)
    <div class="div-img shadow">
      <h6>Ajouter un pdf</h6>
      <form method="POST" action="{{ route('admin.article.add.pdf') }}" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="article_id" value="{{$article->id}}">
          <div class="form-group">
              <label for="formGroupExampleInput2">Description</label>
              <textarea type="text" class="form-control" id="formGroupExampleInput2" 
              name="description" required placeholder="description"></textarea>
            </div>
          <div class="custom-file">
              <input type="file" class="custom-file-input" id="validatedCustomFile" name="file" required accept=".pdf">
              <label class="custom-file-label" for="validatedCustomFile">Nouveau pdf...</label>
              <div class="invalid-feedback">Example invalid custom file feedback</div>
            </div>
          <button type="submit" class="btn bg-gradient-primary text-white">Ajouter</button>
      </form>
    </div>
    @endif
   </div>
</div>
@if(isset($message))
<script type="text/javascript">
    Swal.fire("{{$message['message']}}");
</script>
@endif


@endsection