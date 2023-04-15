@extends('layouts.panel')

@section('content')
<div class="card shadow mt-5">
  <div class="card-header border-0">
    <div class="row align-items-center">
      <div class="col">
        <h1 class="mb-4">Add Item</h1>

        @if (count($errors) > 0)
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
      </div>

    </div>
  </div>

</div>

@endsection