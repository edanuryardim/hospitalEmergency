@extends('layouts.master')
@section('content')
<div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <h2>Dashboard</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-dashboard"></i></a></li>
                            <li class="breadcrumb-item">App</li>
                            <li class="breadcrumb-item active">Blog</li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="d-flex flex-row-reverse">
                            <div class="page_action">
                                <button type="button" class="btn btn-primary">Generate Report</button>
                                <a href="blog-post.html" class="btn btn-secondary" title="new post">New post</a>
                            </div>
                            <div class="p-2 d-flex">

                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row clearfix row-deck">
            @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @elseif(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif
            @foreach ($rooms as  $room)
            <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="body text-center">
                        @foreach ($room->patients as $patient)
                            <p class="mb-0">Bed {{$patient->bed->bed_number}}:   {{$patient->name}} {{$patient->surname}}</p>

                            @endforeach
                            <h5 class="mt-4 mb-0">Room {{$room->room_number}}</h5>




                            <small>Available Beds: {{$room->available_beds}}</small>
                        </div>
                    </div>
                </div>
            @endforeach



            </div>


                        <div class="resize-triggers"><div class="expand-trigger"><div style="width: 486px; height: 356px;"></div></div><div class="contract-trigger"></div></div></div>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
