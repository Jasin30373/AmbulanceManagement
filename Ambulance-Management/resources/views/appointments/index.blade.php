<x-app-layout>
    <section class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title mb-4">Appointments</h1>

                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>Patient Name</th>
                                <th>Doctor Name</th>
                                <th>Appointment Date</th>
                                <th>Appointment Time</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($appointments as $appointment)
                                <tr>
                                    <td>{{ $appointment->patient->name }}</td>
                                    <td>{{ $appointment->doctor->name }}</td>
                                    <td>{{ $appointment->appointmentDate }}</td>
                                    <td>{{ $appointment->appointmentHour }}</td>
                                    <td>
                                        @if ($appointment->isApproved)
                                            <span class="badge badge-success">Approved</span>
                                        @else
                                            <span class="badge badge-danger">Not Approved</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton{{ $appointment->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Actions
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $appointment->id }}">
                                                <a href="{{ route('appointments.edit', $appointment->id) }}" class="dropdown-item"><i class="fa fa-pencil mr-2"></i> Edit</a>
                                                <form action="{{ route('appointments.destroy', $appointment->id) }}" method="post" class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="dropdown-item text-danger"><i class="fa fa-trash-o mr-2"></i> Delete</button>
                                                </form>
                                                @if(Auth::user()->hasRole('doctor'))
                                                    <form method="post" class="d-inline" action="{{ route('reports.createbydoctor', ['id' => Auth::user()->id, 'aid' => $appointment->id]) }}">
                                                        @csrf
                                                        <button type="submit" class="dropdown-item"><i class="fa fa-pencil mr-2"></i> Add report</button>
                                                    </form>
                                                    @if ($appointment->isApproved)
                                                        <form action="{{ route('appointments.toggleApproval', $appointment->id) }}" method="post" class="d-inline">
                                                            @csrf
                                                            <input type="hidden" name="approve" value="0" />
                                                            <button type="submit" class="dropdown-item"><i class="fa fa-times mr-2"></i> Disapprove</button>
                                                        </form>
                                                    @else
                                                        <form action="{{ route('appointments.toggleApproval', $appointment->id) }}" method="post" class="d-inline">
                                                            @csrf
                                                            <input type="hidden" name="approve" value="1" />
                                                            <button type="submit" class="dropdown-item"><i class="fa fa-check mr-2"></i> Approve</button>
                                                        </form>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    <a href="{{ route('appointments.create') }}" class="btn btn-primary">Create Appointment</a>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
