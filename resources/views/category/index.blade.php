@extends('template.template')
@section('content')
<div class="container mt-5 card shadow p-5">
    <h4 class="mb-3"> Daftar Kategori </h4>

    <table class="table table-stripped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Kategori</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $d)
            <tr>
                <th scope="row">{{$d->id}}</th>
                <td>{{$d->category}}</td>
                <td>

                    <form action="{{ route('category.delete', ['id' => $d->id]) }}" method="post">
                        <input type="hidden" name="_method" value="delete">
                        @csrf
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
