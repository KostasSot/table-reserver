@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">All Tables</div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Seats</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($tables as $table)
                                <tr>
                                    <td>{{ $table->id }}</td>
                                    <td>{{ $table->name }}</td>
                                    <td>{{ $table->seats }}</td>
                                    <td>
                                        <form action="{{ route('deleteTable', $table->id) }}" method="POST">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Create New Table</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('storeTable') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="seats" class="col-md-4 col-form-label text-md-right">Available Seats</label>
                                <div class="col-md-6">
                                    <input id="seats" type="number" class="form-control" name="seats" required>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Create
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Reservations</div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>#</th>
                                <th>User</th>
                                <th>Table</th>
                                <th>Date</th>
                                <th>Time</th>
                            </tr>
                            @foreach ($reservations as $reservation)
                                <tr>
                                    <td>{{ $reservation->id }}</td>
                                    <td>{{ $reservation->user->name }}</td>
                                    <td>{{ $reservation->table->name }}</td>
                                    <td>{{ $reservation->date }}</td>
                                    <td>{{ $reservation->time }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Create New Reservation</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('storeReservation') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="client" class="col-md-4 col-form-label text-md-right">Client</label>
                                <div class="col-md-6">
                                    <select name="user_id" id="client" class="form-control" required>
                                        <option value="">Please select a Client</option>
                                        @foreach($clients as $client)
                                            <option value="{{$client->id}}">{{$client->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="table" class="col-md-4 col-form-label text-md-right">Table</label>
                                <div class="col-md-6">
                                    <select name="table_id" id="table" class="form-control" required>
                                        <option value="">Please select a Table</option>
                                        @foreach($tables as $table)
                                            <option value="{{$table->id}}">{{$table->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="table" class="col-md-4 col-form-label text-md-right">Date</label>
                                <div class="col-md-6">
                                    <input type="date" name="date" class="datepicker form-control" style="font-size: 12px">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="time" class="col-md-4 col-form-label text-md-right">Time</label>
                                <div class="col-md-6">
                                    <select name="time" id="time" class="form-control" required disabled>
                                        <option value="">Please select Time</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Create
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Change Operating Hours</div>
                    <div class="card-body">
                        <div class="row mb-4 text-center font-weight-bold">
                            <div class="col-md-3">Day</div>
                            <div class="col-md-2">Start</div>
                            <div class="col-md-2">Close</div>
                            <div class="col-md-2">Open</div>
                            <div class="col-md-3"></div>
                        </div>
                        @foreach($operatingHours as $operatingHour)
                            <form method="POST" action="{{ route('updateHours', $operatingHour->id) }}">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-md-3">{{ $operatingHour->day }}</div>
                                    <div class="col-md-2">
                                        <input id="starting_hour" type="number" class="form-control text-center" min="0" max="24" name="starting_hour" value="{{ $operatingHour->starting_hour }}" />
                                    </div>
                                    <div class="col-md-2">
                                        <input id="closing_hour" type="number" name="closing_hour" min="0" max="24" class="form-control text-center" value="{{ $operatingHour->closing_hour }}" />
                                    </div>
                                    <div class="col-md-2">
                                        <input id="open" type="checkbox" class="form-control" name="open" {{ $operatingHour->open === true ? "checked" : "" }}/>
                                    </div>
                                    <div class="col-md-3">
                                        <button type="submit" class="btn btn-primary">
                                            Update
                                        </button>
                                    </div>
                                </div>
                            </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $( document ).ready(function() {
            $('#table').change(function() {
                $('.datepicker').prop("disabled", false);
            })
            $(".datepicker").change(function(){
                var base_url = {!! json_encode(url('/')) !!}
                var value = $(".datepicker").val();

                var table = $('#table').val();

                $.ajax({url: base_url + "/reservations", data : { date: value, table: table }, success: function(result){
                        $('#time')
                            .find('option')
                            .remove()
                            .end()
                            .append('<option value="">Please select Time</option>')
                        for (key in result) {
                            var o = new Option(result[key], result[key]);
                            $(o).html(result[key]);
                            $("#time").append(o);
                        }
                        $('#time').prop("disabled", false);
                    }});

            });
        });
    </script>

@endsection
