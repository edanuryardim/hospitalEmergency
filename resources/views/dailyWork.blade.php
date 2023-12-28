@extends('layouts.master')
@section('content')


<!-- mani page content body part -->
<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <h2>Daily Schedule</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-dashboard"></i></a></li>
                        <li class="breadcrumb-item">Hospital</li>
                        <li class="breadcrumb-item active">daily duty doctors and nurses</li>
                    </ul>
                </div>


                @if (session('success'))
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span></button>

                    </div>
                </div>
                @endif

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="d-flex flex-row-reverse">
                        <div class="page_action">
                            @if ($thismonth->contains('date', date('Y-m-d')))
                            <!-- Hide the button if today's date exists in $thismonth -->
                            @else
                            <!-- Show the button if today's date does not exist in $thismonth -->
                            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#addevent">Add for today</button>
                            @endif


                        </div>
                        <div class="p-2 d-flex">

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row clearfix row-deck">
            <div class="col-lg-12">
                <div class="card">
                    <div class="body">
                        <div id="calendar" class="fc fc-unthemed fc-ltr" style="width: 100%;">
                            <div class="fc-toolbar fc-header-toolbar">
                                <div class="fc-left">
                                    <div class="fc-button-group btn-group"><button type="button" class="fc-prev-button btn btn-secondary fc-state-default fc-corner-left" aria-label="prev"><span class="fc-icon fc-icon-left-single-arrow"></span></button><button type="button" class="fc-next-button btn btn-secondary fc-state-default fc-corner-right" aria-label="next"><span class="fc-icon fc-icon-right-single-arrow"></span></button></div><button type="button" class="fc-today-button btn btn-secondary fc-state-default fc-corner-left fc-corner-right">Monthly Daily Work</button>
                                </div>

                                <div class="fc-center">
                                    <h2>

                                        {{substr($thismonth[0]->date, 0, 7)}}

                                    </h2>
                                </div>
                                <div class="fc-clear"></div>
                            </div>
                            <div class="fc-view-container" style="width: 100%; height: 618px; overflow: hidden;">
                                <div class="fc-view fc-month-view fc-basic-view" style="height: 100%;">
                                    <table class="" style="height: 100%;">
                                        <thead class="fc-head">
                                            <tr>

                                                <thead>
                                                    <tr>
                                                        <th class="fc-day-header fc-widget-header fc-sun"><span>Sun</span></th>
                                                        <th class="fc-day-header fc-widget-header fc-mon"><span>Mon</span></th>
                                                        <th class="fc-day-header fc-widget-header fc-tue"><span>Tue</span></th>
                                                        <th class="fc-day-header fc-widget-header fc-wed"><span>Wed</span></th>
                                                        <th class="fc-day-header fc-widget-header fc-thu"><span>Thu</span></th>
                                                        <th class="fc-day-header fc-widget-header fc-fri"><span>Fri</span></th>
                                                        <th class="fc-day-header fc-widget-header fc-sat"><span>Sat</span></th>
                                                    </tr>
                                                </thead>

                                            </tr>
                                        </thead>
                                        <tbody class="fc-body">
                                            @php
                                            $daysInMonth = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));
                                            $startOfMonth = date('Y-m-00');
                                            $firstDayOfWeek = date('N', strtotime($startOfMonth));
                                            @endphp

                                            @for ($day = 1; $day <= $daysInMonth; $day++) @if ($day==1 || date('N', strtotime("$startOfMonth +$day days"))==1) <tr>
                                                @if ($day == 1)
                                                @for ($i = 1; $i < $firstDayOfWeek+1; $i++) <td class="fc-day fc-widget-content">
                                                    </td>
                                                    @endfor
                                                    @endif
                                                    @endif

                                                    @php
                                                    $date = date('Y-m-d', strtotime("$startOfMonth +$day days"));
                                                    $record = $thismonth->where('date', $date)->first();
                                                    @endphp

                                                    <td class="fc-day fc-widget-content" data-date="{{ $date }}">
                                                        {{ $day }}
                                                        <br>

                                                        @if ($record)
                                                        @if ($record->doctor)
                                                        <b> Doctor: </b><br>
                                                        {{ $record->doctor->name }} {{ $record->doctor->surname }}
                                                        <br>
                                                        @endif

                                                        @if ($record->nurse1)
                                                        <b> Nurses: </b><br>
                                                        {{ $record->nurse1->name }} {{ $record->nurse1->surname }}<br>
                                                        @endif
                                                        @if ($record->nurse2)
                                                        {{ $record->nurse2->name }} {{ $record->nurse2->surname }}<br>
                                                        @endif
                                                        @if ($record->nurse3)
                                                        {{ $record->nurse3->name }} {{ $record->nurse3->surname }}<br>
                                                        @endif
                                                        @endif


                                                    </td>

                                                    @if (date('N', strtotime("$startOfMonth +$day days")) == 7 || $day == $daysInMonth)
                                                    </tr>
                                                    @endif
                                                    @endfor
                                        </tbody>



                                    </table>
                                </div>
                            </div>

                            </td>
                            </tr>
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="header">
                <h2>Today <small></small></h2>
            </div>

            @if ($today != null)
            <ul class="right_chat list-unstyled li_animation_delay">
                Doctor:
                <li>
                    @if ($today->doctor != null)
                    <a href="javascript:void(0);" class="media">
                        @if ($today->doctor->gender == "Male")
                        <img src="../assets/images/xs/avatar2.jpg" class="rounded-circle avatar mr-2" alt="profile-image">
                        @else
                        <img src="../assets/images/xs/avatar1.jpg" class="rounded-circle avatar mr-2" alt="profile-image">
                        @endif
                        <div class="media-body">
                            <span class="name d-flex justify-content-between">{{$today->doctor->name}} {{$today->doctor->surname}}</span>
                            <span class="message">{{$today->doctor->email}}</span>
                        </div>
                    </a>
                    @else
                    <p>No doctor information available.</p>
                    @endif
                </li>
                Nurses:
                <li>
                    @if ($today->nurse1 != null)
                    <a href="javascript:void(0);" class="media">
                        @if ($today->nurse1->gender == "Male")
                        <img src="../assets/images/xs/avatar2.jpg" class="rounded-circle avatar mr-2" alt="profile-image">
                        @else
                        <img src="../assets/images/xs/avatar1.jpg" class="rounded-circle avatar mr-2" alt="profile-image">
                        @endif
                        <div class="media-body">
                            <span class="name d-flex justify-content-between">{{$today->nurse1->name}} {{$today->nurse1->surname}} </span>
                            <span class="message">{{$today->nurse1->email}} </span>
                        </div>
                    </a>
                    @else
                    <p>No Nurse 1 information available.</p>
                    @endif
                </li>
                <li>
                    @if ($today->nurse2 != null)
                    <a href="javascript:void(0);" class="media">
                        @if ($today->nurse2->gender == "Male")
                        <img src="../assets/images/xs/avatar2.jpg" class="rounded-circle avatar mr-2" alt="profile-image">
                        @else
                        <img src="../assets/images/xs/avatar1.jpg" class="rounded-circle avatar mr-2" alt="profile-image">
                        @endif
                        <div class="media-body">
                            <span class="name d-flex justify-content-between">{{$today->nurse2->name}} {{$today->nurse2->surname}} </span>
                            <span class="message">{{$today->nurse2->email}} </span>
                        </div>
                    </a>
                    @else
                    <p>No Nurse 2 information available.</p>
                    @endif
                </li>
                <li>
                    @if ($today->nurse3 != null)
                    <a href="javascript:void(0);" class="media">
                        @if ($today->nurse3->gender == "Male")
                        <img src="../assets/images/xs/avatar2.jpg" class="rounded-circle avatar mr-2" alt="profile-image">
                        @else
                        <img src="../assets/images/xs/avatar1.jpg" class="rounded-circle avatar mr-2" alt="profile-image">
                        @endif
                        <div class="media-body">
                            <span class="name d-flex justify-content-between">{{$today->nurse3->name}} {{$today->nurse3->surname}} </span>
                            <span class="message">{{$today->nurse3->email}} </span>
                        </div>
                    </a>
                    @else
                    <p>No Nurse 3 information available.</p>
                    @endif
                </li>

                <li>
                    <a class="btn btn-block btn-primary">
                        Patients registered today: {{ App\Models\Patient::whereDate('entry_date', now()->toDateString())->count() }}
                    </a>
                </li>

            </ul>
            @else
            <p>No data available for today.</p>
            @endif
        </div>
    </div>

</div>
</div>
</div>
</div>

<!-- Default Size -->
<div class="modal fade" id="addevent" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="defaultModalLabel">Add Event</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="form-line">
                        <input type="text" class="form-control" value="{{ date('Y-m-d') }}" placeholder="Event Date" readonly>
                    </div>
                </div>
                <form action="{{ route('dailyAdd') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="doctorSelect">Select Doctor:</label>
                        <select class="form-control" id="doctorSelect" name="doctor_id" required>
                            <option value="" selected disabled>Select Doctor</option>
                            @foreach ($doctors as $doctor)
                            <option value="{{ $doctor->id }}">{{ $doctor->name }} {{ $doctor->surname }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nurse1Select">Select Nurse 1:</label>
                        <select class="form-control" id="nurse1Select" name="nurse1_id" required>
                            <option value="" selected disabled>Select Nurse 1</option>
                            @foreach ($nurses as $nurse)
                            <option value="{{ $nurse->id }}">{{ $nurse->name }} {{ $nurse->surname }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nurse2Select">Select Nurse 2:</label>
                        <select class="form-control" id="nurse2Select" name="nurse2_id" required>
                            <option value="" selected disabled>Select Nurse 2</option>
                            @foreach ($nurses as $nurse)
                            <option value="{{ $nurse->id }}">{{ $nurse->name }} {{ $nurse->surname }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nurse3Select">Select Nurse 3:</label>
                        <select class="form-control" id="nurse3Select" name="nurse3_id" required>
                            <option value="" selected disabled>Select Nurse 3</option>
                            @foreach ($nurses as $nurse)
                            <option value="{{ $nurse->id }}">{{ $nurse->name }} {{ $nurse->surname }}</option>
                            @endforeach
                        </select>
                    </div>


            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" style="color:pink;">Add</button>
                <button type="button" class="btn btn-simple" data-dismiss="modal">CLOSE</button>
            </div>
            </form>
        </div>

    </div>
</div>


</div>

<!-- Javascript -->
<script src="{{asset('assets/bundles/libscripts.bundle.js')}}"></script>
<script src="{{asset('assets/bundles/vendorscripts.bundle.js')}}"></script>

<script src="{{asset('assets/bundles/fullcalendarscripts.bundle.js')}}"></script><!--/ calender javascripts -->
<script src="{{asset('assets/vendor/fullcalendar/fullcalendar.js')}}"></script><!--/ calender javascripts -->

<!-- page js file -->
<script src="{{asset('assets/bundles/mainscripts.bundle.js')}}"></script>
<script src="{{asset('js/pages/calendar.js')}}"></script>

@endsection
