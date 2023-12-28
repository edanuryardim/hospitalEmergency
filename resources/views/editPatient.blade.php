@extends('layouts.master')
@section('content')

<div id="main-content">
    <div class="container-fluid">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="title" id="defaultModalLabel">Update Patient: {{$patient->name}} {{$patient->surname}}</h6>
                </div>
                <div class="modal-body">
                <form action="{{ route('editpatient') }}" method="POST">
                            @csrf
                    <div class="row clearfix">

                        <input type="hidden" name="id" value="{{$patient->id}}">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" placeholder="Name" value="{{$patient->name}}" name="name">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="surname">Surname:</label>
                                <input type="text" class="form-control" placeholder="Surname" value="{{$patient->surname}}" name="surname">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                               <label for="phone">Phone:</label>
                                <input type="text" class="form-control" placeholder="Phone" value="{{$patient->phone}}" name="phone">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="diagnosis">Diagnosis</label>
                                <input type="text" class="form-control" placeholder="Diagnosis" value="{{$patient->diagnosis}}"  name="diagnosis">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="intervention">Intervention</label>
                                <input type="text" class="form-control" placeholder="Intervention" value="{{$patient->intervention}}"  name="intervention" >
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="id_number">Id Number</label>
                                <input type="text" class="form-control" placeholder="Id Number" value="{{$patient->id_number}}"   name="id_number">
                            </div>
                        </div>



                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="birth_date">Birth Date</label>
                                <input type="date" class="form-control" name="birth_date" value="{{ $patient->birth_date }}">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <label for="doctor_id">Doctor</label>
                            <select class="form-control show-tick" name="doctor_id">

                                @foreach($doctors as $doctor)
                                <option value="{{$doctor->id}}" @if($doctor->id == $patient->doctor_id) selected @endif>{{$doctor->name}} {{$doctor->surname}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <label for="nurse_id">Nurse</label>
                            <select class="form-control show-tick" name="nurse_id">

                                @foreach($nurses as $nurse)
                                <option value="{{$nurse->id}}" @if($nurse->id == $patient->nurse_id) selected @endif>{{$nurse->name}} {{$nurse->surname}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <label for="room">Room</label>
                            <select class="form-control show-tick" name="room" id="roomSelect">

                                @foreach($availablerooms as $room)
                                <option value="{{$room->id}}" @if($room->id == $patient->room_id) selected @endif>{{$room->room_number}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <label for="bed">Bed</label>
                            <select class="form-control show-tick" name="bed" id="bedSelect">
                                            <option value="{{$patient->bed->bed_number}}">- Beds -</option>
                                        </select>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="entry_date">Entry Date</label>
                                <input type="date" class="form-control" name="entry_date" value="{{ $patient->entry_date }}">
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="exit_date">Exit Date</label>
                                <input type="date" class="form-control" name="exit_date" value="{{ $patient->exit_date }}">
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <label for="gender">Gender</label>
                            <div class="form-group">
                                <div class="radio inlineblock m-r-20">
                                    <input type="radio" name="gender" id="male" class="with-gap" value="Male" @if($patient->gender == 'Male') checked @endif>
                                    <label for="male">Male</label>
                                </div>
                                <div class="radio inlineblock">
                                    <input type="radio" name="gender" id="female" class="with-gap" value="Female" @if($patient->gender == 'Female') checked @endif>
                                    <label for="female">Female</label>
                                </div>
                            </div>
                        </div>




                    </div>
                </div>
                <div class="modal-footer">
                    <button    type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>

            </div>
            </form>
        </div>
    </div>
</div>
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
