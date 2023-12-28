@extends('layouts.master')
@section('content')

<!-- mani page content body part -->
<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <h2>Analytical</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-dashboard"></i></a></li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active">Analytical</li>
                    </ul>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="d-flex flex-row-reverse">
                        <div class="page_action">
                            <button type="button" class="btn btn-primary"><i class="fa fa-download"></i> Download report</button>
                            <button type="button" class="btn btn-secondary"><i class="fa fa-send"></i> Send report</button>
                        </div>
                        <div class="p-2 d-flex">

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-3 col-md-4 col-sm-12">
                <div class="card">
                    <a href="{{route('patients')}}" class="folder">

                        <h6><i class="fa fa-user m-r-10"></i> Patients</h6>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-12">
                <div class="card">
                    <a href="{{route('patients')}}" class="folder">

                        <h6><i class="fa fa-user-md m-r-10"></i> Doctors</h6>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-12">
                <div class="card">
                    <a href="{{route('nurses')}}" class="folder">
                        <h6><i class="fa fa-user-md m-r-10"></i> Nurses</h6>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-12">
                <div class="card">
                    <a href="{{route('rooms')}}" class="folder">

                        <h6><i class="fa fa-bed m-r-10"></i> Rooms</h6>
                    </a>
                </div>
            </div>
        </div>



    </div>

    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="header">
                    <h2>Patients Status</h2>
                    <ul class="header-dropdown">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a href="javascript:void(0);">Action</a></li>
                                <li><a href="javascript:void(0);">Another Action</a></li>
                                <li><a href="javascript:void(0);">Something else</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <p class="float-md-right">
                        <span class="badge badge-success">3 Admit</span>
                        <span class="badge badge-default">2 Discharge</span>
                    </p>
                    <div class="table-responsive table_middel">
                        <table class="table m-b-0">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Patients</th>
                                    <th>Entry Date</th>
                                    <th>Exit Date</th>
                                    <th>Diagnosis</th>
                                    <th>Intervention</th>
                                    <th>Doctor</th>
                                    <th>Nurse</th>
                                    <th>Room</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($patients as $patient)

                                <tr>
                                    <td>{{ isset($patient->id) ? $patient->id : 'N/A' }}</td>
                                    <td>
                                        @if ($patient->gender == "male")
                                        <img src="../assets/images/xs/avatar2.jpg" class="rounded-circle avatar mr-2" alt="profile-image">
                                        @else
                                        <img src="../assets/images/xs/avatar1.jpg" class="rounded-circle avatar mr-2" alt="profile-image">
                                        @endif

                                        <span>{{ isset($patient->name) ? $patient->name : 'N/A' }} {{ isset($patient->surname) ? $patient->surname : 'N/A' }}</span>
                                    </td>
                                    <td><span class="text-info">{{ isset($patient->entry_date) ? $patient->entry_date : 'N/A' }}</span></td>
                                    @if (isset($patient->exit_date))
                                    <td><span class="text-danger">{{ $patient->exit_date }}</span></td>
                                    @else
                                    <td><span class="text-danger">Not Discharged</span></td>
                                    @endif
                                    <td>{{ isset($patient->diagnosis) ? $patient->diagnosis : 'N/A' }}</td>
                                    <td><span class="badge badge-warning">{{ isset($patient->intervention) ? $patient->intervention : 'N/A' }}</span></td>
                                    <td>{{ isset($patient->doctor) ? $patient->doctor->name . ' ' . $patient->doctor->surname : 'N/A' }}</td>
                                    <td>{{ isset($patient->nurse) ? $patient->nurse->name . ' ' . $patient->nurse->surname : 'N/A' }}</td>
                                    <td>{{ isset($patient->room) ? $patient->room->room_number : 'N/A' }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
