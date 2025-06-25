<x-app-layout>
    <section class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title mb-4">List of Reports</h1>
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>Appointment</th>
                                <th>Doctor</th>
                                <th>Symptoms</th>
                                <th>Diagnoses</th>
                                <th>Prescriptions</th>
                                @if(!Auth::user()->hasRole('patient'))
                                    <th>Actions</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reports as $report)
                                <tr>
                                    <td>{{ $report->appointment_id }}</td>
                                    <td>{{ $report->doctor->name }}</td>
                                    <td>{{ $report->symptoms }}</td>
                                    <td>{{ $report->diagnoses }}</td>
                                    <td>{{ $report->prescriptions }}</td>
                                    @if(!Auth::user()->hasRole('patient'))
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton{{ $report->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Actions
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $report->id }}">
                                                    <a href="{{ route('reports.edit', $report->id) }}" class="dropdown-item"><i class="fa fa-pencil mr-2"></i> Edit</a>
                                                    <form action="{{ route('reports.destroy', $report->id) }}" method="post" class="d-inline">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="dropdown-item text-danger"><i class="fa fa-trash-o mr-2"></i> Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    @endif    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @if(!Auth::user()->hasRole('patient'))
                    <div class="mt-4">
                        <a href="{{ route('reports.create') }}" class="btn btn-primary">Create</a>
                    </div>
                @endif
            </div>
        </div>
    </section>
</x-app-layout>
