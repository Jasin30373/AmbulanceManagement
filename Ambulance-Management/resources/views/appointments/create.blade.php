<x-app-layout>
    <section class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title mb-4">Create Appointment</h1>
                <form action="{{ route('appointments.store') }}" method="POST">
                    @csrf
                    @php $user = Auth::user(); @endphp
                    @if($user->hasRole('patient'))
                        <div class="form-group">
                            <label for="patient_id">Patient</label>
                            <input type="text" class="form-control" value="{{ $user->name }}" disabled>
                            <input type="hidden" name="patient_id" value="{{ $user->id }}">
                        </div>
                    @else
                        <div class="form-group">
                            <label for="patient_id">Patient</label>
                            <select name="patient_id" class="form-control">
                                @foreach ($patients as $patient)
                                    <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif
                    @if($user->hasRole('doctor'))
                        <div class="form-group">
                            <label for="doctor_id">Doctor</label>
                            <input type="text" class="form-control" value="{{ $user->name }}" disabled>
                            <input type="hidden" name="doctor_id" value="{{ $user->id }}">
                        </div>
                    @else
                        <div class="form-group">
                            <label for="doctor_id">Doctor</label>
                            <select name="doctor_id" class="form-control">
                                @foreach ($doctors as $doctor)
                                    <option value="{{ $doctor->id }}">{{ $doctor->name }} - {{ $doctor->type_of_doctor }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="appointmentDate">Appointment Date</label>
                        <input type="date" name="appointmentDate" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="appointmentHour">Appointment Hour</label>
                        <select id="appointmentHour" name="appointmentHour" class="form-control" required autofocus autocomplete="appointmentHour">
                            @foreach (\App\Enums\Hour::cases() as $case)
                                @php
                                    $intValue = $case->value;
                                    $stringValue = substr_replace((string)$intValue, '', -2);
                                    $formattedTime = substr($stringValue, 0, -2) . ':' . substr($stringValue, -2);
                                @endphp
                                <option value="{{ $intValue }}">{{ $formattedTime }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-check mb-3">
                        <input type="hidden" name="isApproved" value="0">
                        <input type="checkbox" name="isApproved" class="form-check-input" id="isApproved" value="1">
                        <label class="form-check-label" for="isApproved">Is Approved</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </section>
</x-app-layout>