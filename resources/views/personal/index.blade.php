@extends('layouts.panel')

@section('content')
<div class="card shadow mt-5">
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
    <div class="table-responsive">
        <!-- Projects table -->
        <table class="table align-items-center table-flush" id="example">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">surname</th>
                    <th scope="col">cargo</th>
                    <th scope="col">Status</th>
                    <th scope="col">Options</th>
                </tr>
            </thead>

            <tbody>
                <tr>
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


                </tr>

            </tbody>

        </table>
        <div>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <i class="fa fa-angle-left"></i>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <i class="fa fa-angle-right"></i>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
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



    @endsection