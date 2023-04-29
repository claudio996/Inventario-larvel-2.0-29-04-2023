@extends('layouts.panel')

@section('content')

<div class="card shadow mt-5">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Items editar</h3>


                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{ url('items/update/'.  $items->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{method_field('put')}} 

                    <input type="hidden" value="{{ $items->id }}">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $items->name }}" aria-describedby="nameHelp">
                        <div id="emailHelp" class="form-text">Into your name for category</div>
                    </div>

                    <div class="mb-3">
                        <label for="number" class="form-label">Numero de insumo</label>
                        <input type="number" class="form-control" id="numero" name="numero" value="{{ $items->numero }}" aria-describedby="numero">
                    </div>

                    <div class="mb-3">
                        <label for="serial" class="form-label">Serial Number</label>
                        <input type="text" class="form-control" id="serialNumber" name="serialNumber" value="{{ $items->serialNumber }}" aria-describedby="numero">
                    </div>

                    <div class="mb-3">
                        <!--DINAMIC SELECT !-->
                        <label for="" class="form-label">Select your categorie</label>
                        <div class="mb-3">
                            <select name="cat_id" id="cat_id" class="form-control">
                                @foreach($categories as $cat)

                                <option value="{{ $cat->id }}" {{ ($items->categorie_id == $cat->id) ? 'selected' : '' }}>
                                    {{ $cat->name }}
                                </option>

                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Serial Number</label>
                        <input type="text" class="form-control" id="status" name="status" value="{{ $items->status }}" aria-describedby="numero">
                    </div>


                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>

            </div>

        </div>
    </div>

</div>

@endsection