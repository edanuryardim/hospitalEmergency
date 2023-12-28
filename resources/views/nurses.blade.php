@extends('layouts.master')
@section('content')
<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <h2>All Nurse</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-dashboard"></i></a></li>
                        <li class="breadcrumb-item">Nurse</li>
                        <li class="breadcrumb-item active">All Nurses</li>
                    </ul>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="d-flex flex-row-reverse">
                        <div class="page_action">
                            <button type="button" class="btn btn-primary"><i class="fa fa-download"></i> Download report</button>
                            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#addevent">Add New Event</button>
                        </div>
                        <div class="p-2 d-flex">

                        </div>
                    </div>
                </div>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @elseif(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif
            </div>
        </div>

        <div class="row clearfix">


            @foreach($nurses as $nurse)
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card">
                    <div class="body text-center">
                        <!-- Exit ve Edit butonları -->
                        <div class="exit-edit-buttons">
                        @if(Auth::user()->role == "admin")
                            <form method="POST" action="{{ route('exitnurse')}}" id="exitForm_{{ $nurse->id }}">
                                @csrf
                                <button type="button" class="btn btn-danger exit-btn d-flex align-items-center" style="width:37px; height:30px;" data-toggle="tooltip" data-placement="top" title="Exit" onclick="confirmExit('{{ $nurse->id }}')">
                                    <i class="fa fa-times" style="float:left;"></i>
                                </button>


                                <input type="hidden" name="id" value="{{$nurse->id}}">
                            </form>

                            <a href="{{ route('nurseEditIndex', ['id' => $nurse->id]) }}" class="btn btn-primary edit-btn" data-toggle="tooltip" data-placement="top" title="Edit" style="display: flex; justify-content: flex-end; width:37px;height:30px;">
                                <i class="fa fa-pencil"></i>
                            </a>
                        @endif

                        </div>
                        <div class="chart easy-pie-chart-1" data-percent="75">
                            <span><img src="{{asset($nurse->image)}}" data-toggle="tooltip" data-placement="top" title="" alt="user" class="rounded-circle" data-original-title="Nurse Avatar"></span>
                            <canvas height="125" width="125" style="height: 100px; width: 100px;"></canvas>
                        </div>
                        <h6 class="mb-0"><a href="#" title="">
                                Nurse {{$nurse->name}} {{$nurse->surname}}
                            </a> </h6>

                        <br>

                        <span>

                        </span>
                        <br>
                        <span>
                            {{$nurse->email}}
                        </span>
                        <br>
                        <span>
                            {{$nurse->phone}}
                        </span>
                    </div>
                </div>
            </div>
            @endforeach






            <div class="col-lg-3 col-md-6 col-sm-12">
            @if(Auth::user()->role == "admin")
                <div class="card">
                    <div class="body text-center">
                        <div class="p-t-80 p-b-80">
                            <h6>Add New <br> Nurse</h6>
                            <button type="button" class="btn btn-outline-primary m-t-10" data-toggle="modal" data-target="#addcontact"><i class="fa fa-plus-circle"></i></button>
                        </div>
                    </div>
                </div>
            @endif
            </div>
        </div>

    </div>
</div>



<script>
    function confirmExit(NurseId) {
        var confirmation = confirm("Do you want to terminate the Nurse?");

        if (confirmation) {
            // Eğer kullanıcı onaylarsa, formu submit et
            document.getElementById("exitForm_" + NurseId).submit();
        }
    }
</script>

@endsection



<!-- Default Size -->
<div class="modal fade" id="addcontact" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel">Add Doctor</h6>
            </div>
            <form action="{{ route('addNurse') }}" method="POST" enctype="multipart/form-data">
                    @csrf
            <div class="modal-body">
                <div class="row clearfix" style="justify-content: center;">

                    <div class="col-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="First Name" name="name" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Last Name"  name="surname" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Phone Number"  name="phone" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Email"  name="email" required>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter Address"  name="address" required>
                        </div>
                    </div>
                    <div class="input-group" style="width: 94%;">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-calendar"></i></span>
                        </div>
                        <input data-provide="datepicker" data-date-autoclose="true" class="form-control" placeholder="Birthdate" data-listener-added_79f83af5="true" name="birth_date" required>
                    </div>
                    <div class="form-group" style="margin-right: 319px;margin-top: 5px;">
                        <div>
                            <label class="fancy-radio">
                                <input name="gender" value="Male" type="radio" checked="" required>
                                <span><i></i>Male</span>
                            </label>
                            <label class="fancy-radio">
                                <input name="gender" value="Female" type="radio" required>
                                <span><i></i>Female</span>
                            </label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp" name="image" required>
                            <small id="fileHelp" class="form-text text-muted">Please upload photos with a maximum size of 500x500 pixels</small>
                        </div>

                    </div>



                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" style="color:pink;">Add</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>
            </div>

        </div>
    </div>
    </form>
</div>

</div>
