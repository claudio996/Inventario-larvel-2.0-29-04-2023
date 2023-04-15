@extends('layouts.panel')

@section('content')
<div class="card shadow mt-5">
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
    <div class="table-responsive">
        <!-- Projects table -->
        <table class="table align-items-center table-flush" id="example">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Status</th>
                    <th scope="col">Options</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach($category as $cat)
                <tr>
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




@endsection