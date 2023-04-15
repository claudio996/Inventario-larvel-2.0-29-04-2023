@extends('layouts.panel')

@section('content')
<div class="card shadow mt-5">
  <div class="card-header border-0">
    <div class="row align-items-center">
      <div class="col">
        <h3 class="mb-0">Dependency</h3>

        @if (count($errors) > 0)
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif

        <form action="{{ url('/dependences/store') }}" method="POST">
          @csrf
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp">
            <small style="color:red">Select name</small>
          </div>

          <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <input type="text" class="form-control" id="capacity" name="type" aria-describedby="nameHelp">
            <small style="color:red">Specifed type of dependency</small>
          </div>

          <div class="mb-3">
            <label for="name" class="form-label">Size</label>
            <input type="text" class="form-control" id="capacity" name="capacity" aria-describedby="nameHelp">
            <small style="color:red">Specifed size of dependency</small>

          </div>

          <div class="mb-3">
            <select class="form-control" aria-label=".form-select-lg example" name="status">
              <option disabled>Select status for </option>
              <option value="1">ACTIVE</option>
              <option value="0">INACTIVE</option>
            </select>
            <small style="color:red">Select status</small>
          </div>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
      </div>

    </div>
  </div>

</div>



@endsection