@extends('layouts.app')

@section('content')
  
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