@extends('template.template')
@section('content')
<div class="container">
    <h1>Proposal</h1>

    <ul>
        <li>Title: {{ $article->title }}</li>
        <li>Writer: {{ $article->writer->name }}</li>
        <li>Submitted at: {{ $article->updated_at }}</li>
    </ul>
    <h5>Article's Thumbnail</h5>
    <image src="{{ $article->image }}" width="500px" height="300px" />

    <h2>Proposal's Content</h2>

    <p>{!! $article->content !!}</p>

    <h5>Approval/Denial Message</h5>
    <form action="{{ route('proposal.action') }}" method="POST">
        @csrf
        <input name="article_id" type="hidden" value="{{ $article->id }}" />
        <input class="form-control" id="editor-message" name="message" type="text" placeholder="Your message" /> <br />
        <button class="btn btn-primary" type="submit" name="action" value="approve">Approve</button>
        <button class="btn btn-secondary" type="submit" name="action" value="deny">Deny</button>
    </form>
</div>
@endsection
