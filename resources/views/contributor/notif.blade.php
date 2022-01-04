@extends('template.template')
@section('content')
<div class="container">
  <notification-component :user="{{Auth::user()}}"></notification-component>
</div>
@endsection