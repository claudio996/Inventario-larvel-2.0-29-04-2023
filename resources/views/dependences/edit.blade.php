@extends('layouts.panel')

@section('content')


<div class="card shadow mt-5">
  <div class="card-header border-0">
    <div class="row align-items-center">
      <div class="col">
        <h3 class="mb-0">Dependences</h3>


        @if (count($errors) > 0)
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif

        <form action="{{ url('dependences/update/'.  $dependences->id) }}" method="POST">
          @csrf
          @method('PUT')
          <input type="hidden" value="{{ $dependences->id }}">
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" value="{{ $dependences->name }}" name="name" aria-describedby="nameHelp">
            <div id="emailHelp" class="form-text">Into your name for dependence</div>
          </div>

          <div class="mb-3">
            <label for="type" class="form-label">Name</label>
            <input type="text" class="form-control" id="type" value="{{ $dependences->type }}" name="type" aria-describedby="nameHelp">
            <div id="emailHelp" class="form-text">Into your type from dependences</div>
          </div>

          <div class="mb-3">
            <label for="name" class="form-label">Capacity</label>
            <input type="text" class="form-control" id="capacity" value="{{ $dependences->capacity }}" name="capacity" aria-describedby="nameHelp">
            <div id="emailHelp" class="form-text">Into your capacity</div>
          </div>

          
          <button type="submit" class="btn btn-primary">Guardar</button>
        </form>

      </div>

    </div>
  </div>

</div>

@endsection