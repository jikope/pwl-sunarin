@extends('template.template')
@section('content')
    <div class="container mt-5 card shadow p-5">
    <h4 class="mb-3">
      @if(Request::segment(3)==='draft')
      draft
      @endif
      @if(Request::segment(3)==='complete')
      Selesi Ditulis
      @endif
      @if(Request::segment(3)==='published')
      Diterbitkan
      @endif
      </h4>


      
    @if(Request::segment(3)==='draft')
    <a class="mb-3" href="{{URL::to('/article/add')}}"> <button class="btn btn-primary">+</button> </a>
    @endif
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
        @if(Request::segment(3)==='draft')
        <a href="{{URL::to('/contributor/news/'.$d->id.'/edit')}}">
        <button class="btn m-1 btn-warning">Edit</button>
        </a>
        
      <form action="{{URL::to('/contributor/news/draft/'.$d->id.'/delete')}}" method="post">
      <input type="hidden" name="_method" value="delete">
      @csrf
      <button class="btn m-1 btn-danger">Delete</button>
      </form>

      <a href="{{URL::to('contributor/news/'.$d->id.'/complete')}}"><button class="btn m-1 btn-primary">Submit</button></a>
      
      @endif

      @if(Request::segment(1)==='editor')
    <a href="{{URL::to('editor/news/'.$d->id.'/publish')}}"><button class="btn m-1 btn-primary">Release</button></a>
    
    @endif
  </td>
    </tr>
   @endforeach
  </tbody>
</table>
{{ $data->links('pagination::bootstrap-4') }}
    </div>
@endsection