@extends('layouts.app')

@section('content')
<div class="h-100 my-2 d-flex justify-content-center align-items-center border-bottom py-3">
    @foreach($category as $c)
    <a href="#">
        <h5 class="  mx-3">{{$c->category}}</h5>
    </a>
    @endforeach

</div>

<div class="container">
    <div class="row">
        <div class="col-4 py-3">
            <div class="input-group mb-3">
                <input type="text" class="form-control mr-3" placeholder="Type Keyword Here" aria-describedby="basic-addon2">
                <div class="input-group-append pl-3">
                    <button class="btn btn-primary" type="button">Search</button>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container p-5">
    <h3>Artikel Terbaru</h3>
    <div class="shadow card row">
        @foreach($data as $d)
        <div class="col-4 p-4">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="https://static.remove.bg/remove-bg-web/dc31eaf79444b51662da45dcd6cf26fcda20b5dd/assets/start-1abfb4fe2980eabfbbaaa4365a0692539f7cd2725f324f904565a9a744f8e214.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{$d->title}}</h5>
                    <a href="{{ URL::to('latest/'.$d->id)}}" class="btn btn-primary">Read</a>
                </div>
            </div>
        </div>
        @endforeach
        {{ $data->links('pagination::bootstrap-4') }}
    </div>

</div>
@endsection
