@extends('layouts.app')

@section('content')
    <div class="container p-5 mt-5">
       <img style="width:100%" src="{{$data->image}}" alt="">
       <h2 class="mt-3">{{$data->title}}</h2>
       <small>{{$data->updated_at}}</small>
       <p>
       {!!$data->content!!}
       </p>
    </div>
    <suggest-component></suggest-component>
@endsection