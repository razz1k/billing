@extends('layouts.app')

@section('content')
  <div class="container">
    <form action="{{route('profile.update')}}" method="POST">
      @method('put')
      @if($user->id == Auth::user()->id)
        @csrf
      @endif
      <div class="col-5">
        <div class="mb-1">
          <label for="first_name" class="form-label">First name</label>
          <input name="first_name"
                 type="text"
                 class="form-control @error('first_name') is-invalid @enderror"
                 id="first_name"
                 value="{{$user->first_name}}">
        </div>

        <div class="mb-1">
          <label for="last_name" class="form-label">Last name</label>
          <input name="last_name"
                 type="text"
                 class="form-control @error('last_name') is-invalid @enderror"
                 id="last_name"
                 value="{{$user->last_name}}">
        </div>

        <div class="mb-4">
          <label for="userEmail" class="form-label">Email address</label>
          <input name="email"
                 type="email"
                 class="form-control @error('email') is-invalid @enderror"
                 id="userEmail"
                 value="{{$user->email}}">
        </div>

        <button type="submit" class="btn btn-primary mb-3 @if($user->id !== Auth::user()->id) disabled @endif">
          Confirm identity
        </button>
      </div>
    </form>
  </div>
@endsection
