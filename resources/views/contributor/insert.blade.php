@extends('template.template')
@section('content')
  <div class="container mt-5 card shadow p-5">
    <h4 class="mb-5">Tambah Artikel</h4>
    @if(empty($data))
  <form action="" method="post"  enctype="multipart/form-data" >
  @else
  <form  method="post" enctype="multipart/form-data" >
  <input type="hidden" name="_method" value="put">
  @endif
  @csrf
  <div class="form-group">
    <label >Title</label>
    <input type="text" id="title" value="{{$data->title ?? ''}}"  name="title" class="form-control"  placeholder="name@example.com">
  </div>

  <div class="form-group">
    <label >Image</label>
    <input type="file" id="title" name="image" class="form-control"  placeholder="name@example.com">
  </div>
 
  <div class="form-group">
    <label >Category</label>
    <select name="category_id" class=" category form-control">
    @foreach($categories as $c)
      <option value="{{$c->id}}" >{{$c->category}}</option>
    @endforeach
  </select>

  </div>



  <div class="form-group">
    <label>Content</label>
    <textarea id="dark" cols="30" rows="10" name="content" >{{$data->content ?? ''}}} </textarea>
  </div>
  <button class="btn btn-primary" type="submit">Kirim</button>
  </form>
</div>
@endsection