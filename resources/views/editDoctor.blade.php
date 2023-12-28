@extends('layouts.master')
@section('content')

<div id="main-content">
    <div class="container-fluid">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="title" id="defaultModalLabel">Update doctor: {{$doctor->name}} {{$doctor->surname}}</h6>
                </div>
                <div class="modal-body">
                    <form action="{{ route('editdoctor') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row clearfix">

                            <input type="hidden" name="id" value="{{$doctor->id}}">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="name">Name:</label>
                                    <input type="text" class="form-control" placeholder="Name" value="{{$doctor->name}}" name="name">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="surname">Surname:</label>
                                    <input type="text" class="form-control" placeholder="Surname" value="{{$doctor->surname}}" name="surname">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="phone">Phone:</label>
                                    <input type="text" class="form-control" placeholder="Phone" value="{{$doctor->phone}}" name="phone">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" placeholder="Email" value="{{$doctor->email}}" name="email">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="specialty">Specialty</label>
                                    <input type="text" class="form-control" placeholder="Specialty" value="{{$doctor->specialty}}" name="specialty">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="address">Adress</label>
                                    <input type="text" class="form-control" placeholder="Address" value="{{$doctor->address}}" name="address">
                                </div>
                            </div>



                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="birth_date">Birth Date</label>
                                    <input type="date" class="form-control" name="birth_date" value="{{ $doctor->birth_date }}">
                                </div>
                            </div>



                            <div class="col-md-6 col-sm-12">
                                <label for="gender">Gender</label>
                                <div class="form-group">
                                    <div class="radio inlineblock m-r-20">
                                        <input type="radio" name="gender" id="male" class="with-gap" value="Male" @if($doctor->gender == 'Male' || is_null($doctor->gender)) checked @endif>
                                        <label for="male">Male</label>
                                    </div>
                                    <div class="radio inlineblock">
                                        <input type="radio" name="gender" id="female" class="with-gap" value="Female" @if($doctor->gender == 'Female') checked @endif>
                                        <label for="female">Female</label>
                                    </div>
                                </div>
                            </div>



                            <div class="col-md-6 col-sm-12">
                            <input type="file" name="image" >

                                </div>








                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>

            </div>
            </form>
        </div>
    </div>
</div>

@endsection
