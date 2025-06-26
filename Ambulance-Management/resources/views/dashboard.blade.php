<x-app-layout>
    <x-slot name="header">
        <h2 class="font-weight-bold h4 text-dark mb-4">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container-fluid mt-4">
        <div class="row mb-4">
            <div class="col-md-4 mb-3">
                <a href="{{ route('profile.index', ['type' => 'doctor']) }}" class="text-decoration-none">
                    <div class="card shadow-sm border-left-primary h-100" style="cursor:pointer;">
                        <div class="card-body d-flex align-items-center">
                            <div class="mr-3">
                                <span class="badge badge-primary p-3"><i class="fa fa-stethoscope fa-2x"></i></span>
                            </div>
                            <div>
                                <h3 class="mb-0">{{$doctors->count()}}</h3>
                                <div class="text-muted">Doctors</div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 mb-3">
                <a href="{{ route('profile.index', ['type' => 'patient']) }}" class="text-decoration-none">
                    <div class="card shadow-sm border-left-success h-100" style="cursor:pointer;">
                        <div class="card-body d-flex align-items-center">
                            <div class="mr-3">
                                <span class="badge badge-success p-3"><i class="fa fa-user-o fa-2x"></i></span>
                            </div>
                            <div>
                                <h3 class="mb-0">{{$patients->count()}}</h3>
                                <div class="text-muted">Patients</div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 mb-3">
                <a href="{{ route('appointments.index') }}" class="text-decoration-none">
                    <div class="card shadow-sm border-left-info h-100" style="cursor:pointer;">
                        <div class="card-body d-flex align-items-center">
                            <div class="mr-3">
                                <span class="badge badge-info p-3"><i class="fa fa-user-md fa-2x"></i></span>
                            </div>
                            <div>
                                <h3 class="mb-0">{{$appointments->count()}}</h3>
                                <div class="text-muted">Appointments</div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8 mb-4">
                <div class="card h-100">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Upcoming Appointments</h5>
                        <a href="{{ route('appointments.index') }}" class="btn btn-sm btn-primary">View all</a>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Patient</th>
                                        <th>Doctor</th>
                                        <th>Type</th>
                                        <th>Date</th>
                                        <th>Hour</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($appointments != null)
                                        @foreach ($appointments->take(10) as $appointment)
                                            <tr>
                                                <td>{{ $appointment->patient->name }}</td>
                                                <td>{{ $appointment->doctor->name }}</td>
                                                <td>{{ $appointment->doctor->type_of_doctor }}</td>
                                                <td>{{ $appointment->appointmentDate }}</td>
                                                <td>{{ $appointment->appointmentHour }}</td>
                                                <td>
                                                    @if ($appointment->isApproved)
                                                        <span class="badge badge-success">Approved</span>
                                                    @else
                                                        <span class="badge badge-danger">Not Approved</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="6">No appointment data found.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card h-100">
                    <div class="card-header bg-white">
                        <h5 class="mb-0">Doctors</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            @php
                                $doctorImages = [
                                    'doctors-1.jpg',
                                    'doctors-2.jpg',
                                    'doctors-4.jpg',
                                    'doctors-3.jpg',
                                    'doc.jpg',
                                ];
                                $imgIndex = 0;
                                $doctorImagesCount = count($doctorImages);
                            @endphp
                            @if ($doctors != null)
                                @foreach ($doctors->take(10) as $doctor)
                                    <a href="{{ route('profile.details', ['id' => $doctor->id]) }}" class="text-decoration-none text-dark">
                                        <li class="list-group-item d-flex align-items-center" style="cursor:pointer;">
                                            <img src="{{ asset('assets/img/doctors/' . ($doctorImages[$imgIndex % $doctorImagesCount])) }}" alt="Profile Picture" class="rounded-circle mr-3" width="40" height="40">
                                            <div>
                                                <div class="font-weight-bold">{{$doctor->name}}</div>
                                                <div class="text-muted small">{{$doctor->type_of_doctor}}</div>
                                            </div>
                                        </li>
                                    </a>
                                    @php $imgIndex++; @endphp
                                @endforeach
                            @else
                                <li class="list-group-item">No doctor data found.</li>
                            @endif
                        </ul>
                    </div>
                    <div class="card-footer text-center bg-white">
                        <a href ="{{route('profile.index',['type'=>'doctor'])}}" class="text-muted">View all Doctors</a>
                    </div>
                </div>
            </div>
        </div>

        @if(Auth::user()->hasRole('patient'))
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Medical Reports</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped mb-0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Doctor</th>
                                            <th>Symptoms</th>
                                            <th>Diagnosis</th>
                                            <th>Prescriptions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($reports != null)
                                            @foreach ($reports as $report)
                                                <tr>
                                                    <td>{{$report->doctor->name}}</td>
                                                    <td>{{$report->symptoms}}</td>
                                                    <td>{{$report->diagnoses}}</td>
                                                    <td>{{$report->prescriptions}}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">New Patients</h5>
                            <a href ="{{route('profile.index',['type'=>'patient'])}}"  class="btn btn-sm btn-primary">View all</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Number</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($patients != null)
                                            @foreach ($patients->take(10) as $patient)
                                                <tr>
                                                    <td>{{$patient->name}}</td>
                                                    <td>{{$patient->email}}</td>
                                                    <td>{{$patient->phone_number}}</td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="3">No patient data found.</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</x-app-layout>
