@extends('layouts.dashboard')

@section('content')
<form action="{{route('category-social-media.store')}}" method="post" enctype="multipart/form-data">
    @csrf
  <div class="mb-3">
    <label for="name" class="form-label">Email address</label>
    <input type="text" class="form-control" name="name" id="name" placeholder="name">
  </div>
  <div class="mb-3">
    <label for="formFile" class="form-label">Default file input example</label>
    <input class="form-control" type="file" id="formFile">
    </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
