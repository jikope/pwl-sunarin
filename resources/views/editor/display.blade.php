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
    <h4 class="mb-3">Daftar Tulisan User</h4>
    <a class="mb-3" href="{{URL::to('/article/add')}}"> <button class="btn btn-primary">+</button> </a>
    <table class="table table-stripped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Category</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($data as $d)
    <tr>
      <th scope="row">1</th>
      <td>{{$d->title}}</td>
      <td>{{$d->category}}</td>
      <td>
      <button class="btn m-1 btn-warning">Edit</button>
      <form action="{{URL::to('article/'.$d->id.'/complete')}}" method="post">
      <input type="hidden" name="_method" value="delete">
      <button class="btn m-1 btn-danger">Delete</button>
      </form>

      <a href="{{URL::to('article/'.$d->id.'/publish')}}"><button class="btn m-1 btn-primary">Publish</button></a>
      <a href="{{URL::to('article/'.$d->id.'/decline')}}"><button class="btn m-1 btn-primary">decline</button></a>
      </td>
    </tr>
   @endforeach
  </tbody>
</table>
{{ $data->links('pagination::bootstrap-4') }}
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