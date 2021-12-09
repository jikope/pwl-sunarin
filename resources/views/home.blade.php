<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
<div class="container mt-5 p-5">
<form method="post">
@csrf
  <div class="mb-3">
    <div class="row">
    <input type="email" name="email" class="form-control col-10" placeholder="search" id="exampleInputEmail1" aria-describedby="emailHelp">
    <input type="submit" class= "col-2 my-3 btn btn-primary" value ="search">
    </div>
  </div>
  </form>
<h2>Username</h2>
<h5>User</h5>
<div class="section mt-5">
<h4>Latest klik</h4>
<h4>recommendation</h4>
<div class="row my-3">
@foreach($recommended as $rec)

<div class="card col-3 m-1" style="width: 18rem;">
<div class="card-body">
  <h5 class="card-title">{{$rec->title}}</h5>
</div>
</div>
@endforeach
</div>
<h4>Latest news</h4>
<div class="row">
  @foreach($data as $d)

  <div class="card col-3 m-1" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">{{$d->title}}</h5>
    <a href="/latest/{{$d->id}}" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
  @endforeach
  </div>
</div>
</div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script>
  axios.post('http://localhost:5000/suggest', {
    user_id: 1,
    latest: [2]
  })
  .then(function (response) {
    console.log(response);
  })
  .catch(function (error) {
    console.log(error);
  });
  </script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>
