@extends('layouts.panel')

@section('content')

<div class="card shadow mt-5">
    <div class="table-responsive">
        <div class="card-header border-0">
            <div class="row align-items-center">

                <div class="col">
                    <h3 class="mb-0">Categories</h3>

                </div>
                <div class="col text-right">
                    <a href="{{ url('/categories/create') }}" class="btn btn-sm btn-primary">New categories</a>
                </div>

                <div class="col text-right">
                    <a href="{{ url('/dependences') }}" class="btn btn-sm btn-primary">Dependences</a>
                </div>

            </div>
        </div>
        <!--Tabla!-->
        <table id="categories-table" class="table table-striped table-bordered table-condensed" style="width:90%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Options</th>

                </tr>
            </thead>
            <tbody>


                <tr>
                    @foreach($category as $cat)

                    <th>{{$cat->id}}</th>
                    <th>{{$cat->name}}</th>
                    <th> @if($cat->status == 1)
                        <a class="btn btn-success" href="{{ url('categories/update_status', $cat->id) }}" onclick="return confirm('Quiere inactivar esta categoria?')">ACTIVE</a>
                        @else
                        <a class="btn btn-warning" href="{{ url('categories/update_status',$cat->id) }}" onclick="return confirm('Quiere activar esta categoria')">INACTIVE</a>
                        @endif
                    </th>
                    <td>
                        <form action="{{ url('categories.delete', $cat->id) }}" method="Post">
                            <a class="btn btn-primary" href="{{ url('categories/edit',$cat->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <a class="btn btn-danger" href="{{ url('categories/destroy',$cat->id) }}" onclick="return confirm('Quiere eliminar definitivamente esta categoria?')">Delete</a>
                            <a class="btn btn-warning" href="{{ url('categories/pdf') }}">Export PDF</a>

                        </form>

                    </td>

                </tr>
                @endforeach

            </tbody>

        </table>
        
    </div>

</div>


@endsection