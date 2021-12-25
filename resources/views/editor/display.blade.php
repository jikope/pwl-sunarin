@extends('template.template')
@section('content')
@if(Request::segment(2) === "proposals")
<h4 class="mb-3">Daftar Proposal</h4>
@endif
@if(Request::segment(2) === "published")
<h4 class="mb-3">Daftar Artikel dipublikasi</h4>
@endif
<a class="mb-3" href="{{URL::to('/article/add')}}"> <button class="btn btn-primary">+</button> </a>
<table class="table table-stripped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Category</th>
            <th scope="col">Writer</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $d)
        <tr>
            <th scope="row">1</th>
            <td>{{$d->title}}</td>
            <td>{{$d->category}}</td>
            <td>{{$d->writer->name}}</td>
            <td>
                <a class="btn m-1 btn-warning" href="{{ route('proposal.show', ['id' => $d->id]) }}">View</a>
                <form action="{{URL::to('article/'.$d->id.'/complete')}}" method="post">
                    <input type="hidden" name="_method" value="delete">
                    <button class="btn m-1 btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $data->links('pagination::bootstrap-4') }}
</div>
@endsection
