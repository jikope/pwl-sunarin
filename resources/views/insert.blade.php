<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Input Article</title>
  </head>
  <body>
    <div class="container mt-5 card shadow p-5">
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
    <textarea class="form-control" id="content" name="content" rows="3">
   {{$data->content ?? ''}} </textarea>
  </div>
  <input type="submit" id="btnSubmit" class="form-control">
  </form>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>

    </script>
  </body>
</html>