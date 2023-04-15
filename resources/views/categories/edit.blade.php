@extends('layouts.panel')

@section('content')

<?php echo $categories ?>

<div class="card shadow mt-5">
  <div class="card-header border-0">
    <div class="row align-items-center">
      <div class="col">
        <h3 class="mb-0">Categories</h3>


        @if (count($errors) > 0)
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif

        <form action="{{ url('categories/update/'.  $categories->id) }}" method="POST">
          @csrf
          @method('PUT')
          <input type="hidden" value="{{ $categories->id }}">
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" value="{{ $categories->name }}" name="name" aria-describedby="nameHelp">
            <div id="emailHelp" class="form-text">Into your name for category</div>
          </div>

          <button type="submit" class="btn btn-primary">Guardar</button>
        </form>

      </div>

    </div>
  </div>

</div>

@endsection