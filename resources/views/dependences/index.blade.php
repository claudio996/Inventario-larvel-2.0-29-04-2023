@extends('layouts.panel')

@section('content')
<div class="card shadow mt-5">
    <div class="table-responsive">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Dependences</h3>
                </div>

                <div class="col text-right">
                    <a href="{{ url('/dependences/create') }}" class="btn btn-sm btn-primary">New dependence</a>
                </div>

                <div class="col text-right">
                    <a href="{{ url('/categories') }}" class="btn btn-sm btn-primary">Categories</a>
                </div>



            </div>
        </div>

        <!-- Projects table -->
        <table id="items-table" class="table table-striped table-bordered table-condensed" style="width:90%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>type</th>
                    <th>Capacity</th>
                    <th>Status</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>


                <tr>
                    @foreach($dependences as $dep)
                    <th>{{$dep->id}}</th>
                    <th>{{$dep->name}}</th>
                    <th>{{$dep->type}}</th>
                    <th>{{$dep->capacity}}</th>
                    <th> @if($dep->status == 1)
                        <a class="btn btn-success" href="{{ url('dependences/update_status', $dep->id) }}" onclick="return confirm('Quiere inactivar esta categoria?')">ACTIVE</a>
                        @else
                        <a class="btn btn-warning" href="{{ url('dependences/update_status',$dep->id) }}" onclick="return confirm('Quiere activar esta categoria')">INACTIVE</a>
                        @endif
                    </th>
                    <td>
                        <form action="{{ url('dependences.delete', $dep->id) }}" method="Post">
                            <a class="btn btn-primary" href="{{ url('dependences/edit',$dep->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <a class="btn btn-danger" href="{{ url('dependences/destroy',$dep->id) }}" onclick="return confirm('Quiere eliminar definitivamente esta categoria?')">Delete</a>

                        </form>

                    </td>
                </tr>
                @endforeach





            </tbody>


        </table>


    </div>

</div>




@endsection