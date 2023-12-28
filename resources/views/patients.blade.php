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
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>Patients </h2>
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

                        @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @elseif(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                        @endif

                        <p class="float-md-right">


                            <span class="badge badge-success"> {{ $patients->where('exit_date', '=', null)->count() }} Active</span>

                            <span class="badge badge-default">
                                {{ $patients->where('exit_date', '!=', null)->count() }} Passive
                            </span>

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

                                        <th>Room-Bed</th>
                                        <th>Actions</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($patients as $patient)


                                    <tr>

                                        <td>{{$patient->id}}</td>
                                        <td> @if ($patient->gender=="Male")
                                            <img src="../assets/images/xs/avatar2.jpg" class="rounded-circle avatar mr-2" alt="profile-image">
                                            @else
                                            <img src="../assets/images/xs/avatar1.jpg" class="rounded-circle avatar mr-2" alt="profile-image">
                                            @endif<span>{{$patient->name}} {{$patient->surname}}</span>
                                        </td>
                                        <td><span class="text-info">{{ \Carbon\Carbon::parse($patient->entry_date)->format('Y.n.j') }}</span></td>

                                        @if ($patient->exit_date)
                                        <td><span class="text-danger">{{ \Carbon\Carbon::parse($patient->exit_date)->format('Y.n.j') }}</span></td>
                                        @else
                                        <td><span class="text-danger">---</span></td>
                                        @endif

                                        <td>{{$patient->diagnosis ? $patient->diagnosis : 'No Diagnosis'}}</td>
                                        <td><span class="badge badge-warning">{{$patient->intervention ? $patient->intervention : 'No Intervention'}}</span></td>
                                        <td>{{ $patient->doctor ? $patient->doctor->name . ' ' . substr($patient->doctor->surname, 0, 1) . '.' : 'No Doctor'}}</td>

                                        <td>{{$patient->room && $patient->bed ? $patient->room->room_number . ' - ' . $patient->bed->bed_number : 'No Room-Bed'}}</td>

                                        <td>
                                            <a type="button" class="btn btn-sm btn-primary" href="{{ route('editpatientIndex', ['id' => $patient->id]) }}">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                        </td>

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
