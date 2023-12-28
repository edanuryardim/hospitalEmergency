@extends('layouts.master')
@section('content')
<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <h2>Add Patient</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-dashboard"></i></a></li>
                        <li class="breadcrumb-item">Patient</li>
                        <li class="breadcrumb-item active">Add Patient</li>
                    </ul>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">

                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Basic Information </h2>
                    </div>
                    <div class="body">
                        <form action="{{ route('addpatient') }}" method="POST">
                            @csrf

                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" placeholder="First Name" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="surname" placeholder="Last Name" required>
                                    </div>
                                </div>

                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Phone No." name="phone" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <input type="text" data-provide="datepicker" data-date-autoclose="true" class="form-control" placeholder="Birth Date" name="birth_date" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="ID No" name="id_number" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <select class="form-control show-tick" name="gender" required>
                                            <option value="">- Gender -</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <select class="form-control show-tick" name="doctor" required>
                                            <option value="">- Doctor -</option>
                                            @foreach ($doctors as $doctor)
                                            <option value="{{$doctor->id}}">{{$doctor->name}} {{$doctor->surname}}</option>
                                            @endforeach


                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <select class="form-control show-tick" name="nurse" required>
                                            <option value="">- Nurse -</option>
                                            @foreach ($nurses as $nurse)
                                            <option value="{{$nurse->id}}">{{$nurse->name}} {{$nurse->surname}}</option>
                                            @endforeach


                                        </select>
                                    </div>
                                </div>


                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <select class="form-control show-tick" name="room" id="roomSelect" required>
                                            <option value="">- Rooms -</option>
                                            @foreach ($availablerooms as $room)
                                            <option value="{{$room->id}}">

                                            @if ($room->room_number)
                                            {{$room->room_number}}
                                            @endif
                                           </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <select class="form-control show-tick" name="bed" id="bedSelect" required>
                                            <option value="">- Beds -</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <button type="submit" class="btn btn-outline-secondary">Cancel</button>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $(document).ready(function() {
                $('[data-provide="datepicker"]').datepicker({
                    autoclose: true,
                    format: 'yyyy-mm-dd',
                    language: 'en'
                });
            });
        });
    </script>

<script>
    jQuery(document).ready(function () {
        // Event listener for room selection change
        jQuery('#roomSelect').change(function () {
            var selectedRoomId = jQuery(this).val();

            // Clear the current bed options
            jQuery('#bedSelect').html('<option value="">- Beds -</option>');

            if (selectedRoomId) {
                // Make an AJAX request to fetch available beds for the selected room
                jQuery.ajax({
                    url: '/api/available-beds/' + selectedRoomId,
                    type: 'GET',
                    success: function (data) {
                        // Populate the bed options based on the server response
                        jQuery.each(data, function (index, bed) {
                            jQuery('#bedSelect').append('<option value="' + bed.id + '">' + bed.bed_number + '</option>');
                        });
                    },
                    error: function (error) {
                        console.error('Error fetching available beds:', error);
                    }
                });
            }
        });
    });
</script>





    @endsection
