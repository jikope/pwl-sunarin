@extends('template.template')

@section('content')
<h2>Edit User</h2>
<form method="POST" action="{{ route('users.update', ['user' => $user]) }}">
    @method('PUT')
    @csrf

    <div class="row mb-3">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" disabled>

            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

        <div class="col-md-6">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email" disabled>

            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>

        <div class="col-md-6">
            <select class="form-select form-control @error('role') is-invalid @enderror" name="role" id="role" aria-label="Default select example" required>
                <option>Select available role</option>
                <option value="editor" {{$user->getRoleNames()[0] == 'editor' ? 'selected' : ''}} >Editor</option>
                <option value="contributor" {{$user->getRoleNames()[0] == 'contributor' ? 'selected=true' : ''}} >Contributor</option>
            </select>

            @error('role')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Update') }}
            </button>
        </div>
    </div>
</form>
</form>
@endsection
