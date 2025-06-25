<x-app-layout>
    <section class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title mb-4">Edit Appointment</h1>
                <form action="{{ route('appointments.update', $appointments->id) }}" method="POST">
                    @csrf
                    @method('put')
                    @if(Auth::user()->hasRole('patient'))
                        <div class="form-group">
                            <label for="patient_id">Patient</label>
                            <input type="text" class="form-control" value="{{ Auth::user()->name }}" disabled>
                            <input type="hidden" name="patient_id" value="{{ Auth::user()->id }}">
                        </div>
                    @else
                        <div class="form-group">
                            <label for="patient_id">Patient</label>
                            <select name="patient_id" class="form-control">
                                @foreach ($patients as $patient)
                                    <option value="{{ $patient->id }}" {{ $patient->id == $appointments->patient_id ? 'selected' : '' }}>{{ $patient->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="doctor_id">Doctor</label>
                        <select name="doctor_id" class="form-control">
                            @foreach ($doctors as $doctor)
                                <option value="{{ $doctor->id }}" {{ $doctor->id == $appointments->doctor_id ? 'selected' : '' }}>{{ $doctor->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="appointmentDate">Appointment Date</label>
                        <input type="date" name="appointmentDate" value="{{ $appointments->appointmentDate }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="appointmentHour">Appointment Hour</label>
                        <select id="appointmentHour" name="appointmentHour" class="form-control" required autofocus autocomplete="appointmentHour">
                            @foreach (\App\Enums\Hour::cases() as $case)
                                @php
                                    $intValue = $case->value;
                                    $formattedTime = substr_replace((string)$intValue, '', -2);
                                    $formattedTime = substr($formattedTime, 0, -2) . ':' . substr($formattedTime, -2);
                                    $timeInt = (int)$appointments->appointmentHour * 10000;
                                @endphp
                                <option value="{{ $intValue }}" {{ (string)$timeInt === (string)$intValue ? 'selected' : '' }}>{{ $formattedTime }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-check mb-3">
                        <input type="hidden" name="isApproved" value="0">
                        <input type="checkbox" name="isApproved" class="form-check-input" id="isApproved" value="1">
                        <label class="form-check-label" for="isApproved">Is Approved</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </section>
</x-app-layout>

