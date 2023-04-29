@extends('layouts.panel')

@section('content')
<div class="card shadow mt-5">
    <div class="table-responsive">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Personal</h3>
                </div>

                <div class="col text-right">
                    <button type="button" class="btn btn-warning mb-3" data-toggle="modal" data-target="#modal-notification">New Personal</button>

                </div>
            </div>
        </div>


        <table id="personal-table" class="table table-striped table-bordered table-condensed" style="width:90%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Cargo</th>
                    <th>Status</th>
                    <th>Option</th>

                </tr>
            </thead>
            <tbody>

                @foreach($personal as $persona)
                <tr>
                    <th>{{$persona->id}}</th>
                    <th>{{$persona->name}}</th>
                    <th>{{$persona->surname}}</th>
                    <th>{{$persona->cargo}}</th>

                    <th> @if($persona->status == 1)
                        <a class="btn btn-success" href="{{ url('personal/update_status', $persona->id) }}" onclick="return confirm('Quiere inactivar este personal?')">ACTIVE</a>
                        @else
                        <a class="btn btn-warning" href="{{ url('personal/update_status',$persona->id) }}" onclick="return confirm('Quiere activar este personal')">INACTIVE</a>
                        @endif
                    </th>
                    <td>
                        <form action="{{ url('personal/delete', $persona->id) }}" method="Post">
                            <a class="btn btn-primary" href="{{ url('personal/edit',$persona->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <a class="btn btn-danger" href="{{ url('personal/destroy',$persona->id) }}" onclick="return confirm('Quiere eliminar definitivamente esta categoria?')">Delete</a>

                        </form>

                    </td>
                </tr>
                @endforeach



            </tbody>

        </table>
    </div>
</div>

<div class="col-md-4">
    <div class="modal fade" id="modal-notification" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
        <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
            <div class="modal-content bg-gradient-danger">

                <div class="modal-body">
                    <div class="container">

                        <form action="{{ url('/personal/store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Into your name">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1">Surname</label>
                                <input type="text" class="form-control" id="surname" name="surname" placeholder="Into your surname">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Cargo</label>
                                <select class="form-control" id="cargo" name="cargo">
                                    <option>Docente</option>
                                    <option>Profesional SEP</option>
                                    <option>Asiatente de la educación</option>
                                    <option>Educadora</option>
                                    <option>Administración</option>
                                    <option>Dirección</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary mt-3">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>


            </div>



        </div>
    </div>

</div>

@endsection