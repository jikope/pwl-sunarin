@extends('template.template')
@section('content')
<div class="container mt-5 card shadow p-5">
    <h4 class="mb-3">Tambah Kategori </h4>

    <form action="{{ route('category.store') }}" method="post">
        @csrf
        <div class="form-group">
            <span>Nama kategori</span>
            <input class="form-control" name="category_name" type="text" placeholder="contoh: technology, sport" />
        </div>
        <button class="btn btn-primary" type="submit">Submit</button>
    </form>
</div>
@endsection
