@extends('layouts.panel')

@section('content')



<div class="card shadow mt-5">

    <div class="table-responsive">

        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Insumos</h3>
                    <span style="color:red;   font-style: italic;">
                        Estados del bien
                        1: Nuevo
                        2: En uso
                        3: Malo
                    </span>
                </div>
                <div class="col text-right">
                    <button type="button" class="btn btn-warning mb-3" data-toggle="modal" data-target="#modal-notification">New Item</button>

                </div>
            </div>
        </div>

        <table id="items-table" class="table table-striped table-bordered table-condensed" style="width:90%">
            <thead>

                <th>ID</th>
                <th>Name</th>
                <th>SerialNumber</th>
                <th>Numero</th>
                <th>Estado del bien</th>
                <th>Category name</th>
                <th>Status</th>
                <th>Options</th>

            </thead>
            <tbody>
                <tr>
                    @foreach($items as $item)

                    <th>{{$item->id}}</th>
                    <th>{{$item->name}}</th>
                    <th>{{$item->serialNumber}}</th>
                    <th>{{$item->numero}}</th>
                    <th>{{$item->estado}}</th>
                    <th>{{$item->categorie_id}}</th>
                    <th>{{$item->status}}</th>

                    <td>
                        <form action="{{ url('items.delete', $item->id) }}" method="Post">
                            <a class="btn btn-primary" href="{{ url('items/edit',$item->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <a class="btn btn-danger" href="{{ url('items/destroy',$item->id) }}" onclick="return confirm('Quiere eliminar definitivamente este insumo?')">Delete</a>

                        </form>

                    </td>
                </tr>
                @endforeach


                </tr>

            </tbody>

        </table>

    </div>
</div>


<div class="col-md-4">
    <div class="modal fade" id="modal-notification" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
        <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
            <div class="modal-content bg-gradient-danger">

                <div class="modal-body">

                    <form action="{{ url('/items/store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp">

                        </div>

                        <div class="mb-3">
                            <label for="s/n" class="form-label">Serial Number</label>
                            <input type="text" class="form-control" id="serialNumber" name="serialNumber" aria-describedby="nameHelp">
                        </div>

                        <div class="mb-3">
                            <label for="n" class="form-label">Numero de insumo</label>
                            <input type="number" class="form-control" id="numero" name="numero" aria-describedby="numero">
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Estado del insumo</label>
                            <select class="form-control" id="estado" name="estado" aria-label="Default select example">
                                <option disabled>Estado del bien</option>
                                <option value="1">Nuevo</option>
                                <option value="2">Usado</option>
                                <option value="3">Mal estado</option>
                            </select>
                        </div>


                        <div class="mb-3">
                            <!--DINAMIC SELECT !-->
                            <label for="" class="form-label">Select your categorie</label>
                            <select class="form-control" name="categorie_id" id="categorie_id">
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Select status </label>
                            <select class="form-control" id="status" aria-label=".form-select-lg example" name="status">
                                <option disabled>Status</option>
                                <option value="1">Activo</option>
                                <option value="2">Inactivo</option>

                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>

                </div>



            </div>
        </div>
    </div>
</div>

@endsection