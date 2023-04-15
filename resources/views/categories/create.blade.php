@extends('layouts.panel')

@section('content')
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

        <form action="{{ url('/categories/store') }}" method="POST">
          @csrf
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp">
            <div id="emailHelp" class="form-text">Into your name for category</div>
          </div>

          <div class="mb-3">
            <select class="form-control" aria-label=".form-select-lg example" name="status">
              <option   disabled>Select status for category</option>
              <option value="1">ACTIVE</option>
              <option value="0">INACTIVE</option>

            </select>
          </div>


          <button type="submit" class="btn btn-primary">Guardar</button>
        </form>

      </div>

    </div>
  </div>

</div>



@endsection