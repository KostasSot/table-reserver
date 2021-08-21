@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">My Reservations</div>
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
                                <div class="col-md-6">
                                    <input name="user_id" type="hidden" value="{{ $user->id }}">
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
                                    <input type="date" name="date" class="datepicker form-control" style="font-size: 12px" disabled>
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
