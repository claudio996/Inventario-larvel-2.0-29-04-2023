@extends('layouts.panel')

@section('content')
<div class="card shadow mt-5">


    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Prestaciones</h3>
            </div>
            <div class="col text-right">
                <a href="{{ url('/categories/create') }}" class="btn btn-sm btn-primary">New categories</a>
            </div>
            <div class="col text-left">
                <a href="{{ url('/dependences') }}" class="btn btn-sm btn-primary">Dependences</a>
            </div>
        </div>

        <div id='calendar'></div>

        <div class="col-md-4">
            <div class="modal fade" data-backdrop="static" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="false">
                <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                    <div class="modal-content bg-gradient-danger">
                        <div class="modal-header  bg-gradient-danger">
                            <h5 class="modal-title">Prestación</h5>
                        </div>

                        <div class="modal-body bg-gradient-danger">
                            <div class="container">

                                <form action="" class="forms">
                                    @csrf

                                    <div class="mb-3">
                                        <!--DINAMIC SELECT !-->
                                        <label for="" class="form-label">Motive</label>
                                        <input type="text" class="form-control" id="title" name="title">
                                    </div>
                                    <div class="mb-3">
                                        <!--DINAMIC SELECT !-->
                                        <label for="" class="form-label">Select your personal</label>
                                        <select class="form-control" name="personal_id" id="personal_id">
                                            @foreach ($personal as $persona)
                                            <option value="{{ $persona->id }}">
                                                {{ $persona->name }}{{ $persona->surname }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <!--DINAMIC SELECT !-->
                                        <label for="" class="form-label">Select your Item</label>
                                        <select class="form-control" name="item_id" id="item_id">
                                            @foreach ($items as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="" class="form-label">Fecha de inicio</label>
                                            <input type="time" class="form-control" id="start" name="start">
                                        </div>

                                        <div class="col-md-6">
                                            <label for="datetimepicker">Fecha de termino</label>
                                            <input id="datetimepicker" class="form-control" title="datetimepicker" />

                                            <script>
                                                $(document).ready(function() {
                                                    // create DateTimePicker from input HTML element
                                                    $("#datetimepicker").kendoDateTimePicker({
                                                        value: new Date(),
                                                        dateInput: true
                                                    });
                                                });
                                            </script>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-success mt-3" id="clearTime">Eliminar Hora</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="modal-footer bg-gradient-danger">
                            <div class="mb-3">
                                <button type="submit" class="btn btn-success mt-3" id="save">Guardar</button>
                                <button type="submit" class="btn btn-warning mt-3" id="edit">Edit</button>
                                <button type="submit" class="btn btn-danger mt-3" id="delete">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <script>
            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var calendar = $('#calendar').fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,basicWeek,basicDay'
                    },

                    editable: true,
                    events: "calendar",
                    displayEventTime: false,
                    eventRender: function(event, element, view) {
                        if (event.allDay === 'true') {
                            event.allDay = true;
                        } else {
                            event.allDay = false;
                        }
                    },
                    selectable: true,
                    selectHelper: true,
                    select: function(start, end, allDay) {
                        $('#exampleModal').modal('show');

                        var title = prompt('Event Title:');
                        if (title) {
                            var start = moment(start, 'DD.MM.YYYY').format('YYYY-MM-DD');
                            var end = moment(end, 'DD.MM.YYYY').format('YYYY-MM-DD');
                            $.ajax({
                                url: "{{ URL::to('createEvent') }}",
                                data: 'title=' + title + '&start=' + start + '&end=' + end +
                                    '&_token=' + "{{ csrf_token() }}",
                                type: "post",
                                success: function(data) {
                                    alert("Added Successfully");
                                    $('#calendar').fullCalendar('refetchEvents');
                                }
                            });
                        }
                    },
                    eventClick: function(event) {
                        var deleteMsg = confirm("Do you really want to delete?");
                        if (deleteMsg) {
                            $.ajax({
                                type: "POST",
                                // url: "{{ URL::to('deleteevent') }}",
                                data: "&id=" + event.id + '&_token=' + "{{ csrf_token() }}",
                                success: function(response) {
                                    if (parseInt(response) > 0) {
                                        $('#calendar').fullCalendar('removeEvents', event.id);
                                        alert("Deleted Successfully");
                                    }
                                }
                            });
                        }
                    }
                });
            });
        </script>
    </div>
    @endsection