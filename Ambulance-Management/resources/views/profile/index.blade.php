<x-app-layout>
    <section class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title mb-4">{{ $type }}</h1>
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                @if(session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>Personal Number</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Date of Birth</th>
                                <th>Gender</th>
                                <th>Phone Number</th>
                                @if ($type == 'Doctors')
                                    <th>Type of Doctor</th>
                                @endif
                                <th>Profile Image</th>
                                @if(Auth::user()->hasRole('admin'))
                                    <th>Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
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
                            @foreach ($users as $user)
                                <tr>
                                    <td><a href ="{{route('profile.details',['id'=>$user->id])}}"> {{ $user->personal_number }} </a></td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->date_of_birth }}</td>
                                    <td>{{ $user->gender }}</td>
                                    <td>{{ $user->phone_number }}</td>
                                    @if ($type == 'Doctors')
                                        <td>{{ $user->type_of_doctor }}</td>
                                    @endif
                                    <td>
                                        @if ($type == 'Doctors')
                                            @if ($user->id == 2)
                                                <img src="{{ asset('assets/img/doctors/doctors-1.jpg') }}" alt="Profile Image" width="50">
                                            @elseif ($user->id == 3)
                                                <img src="{{ asset('assets/img/doctors/doctors-2.jpg') }}" alt="Profile Image" width="50">
                                            @elseif ($user->id == 4)
                                                <img src="{{ asset('assets/img/doctors/doctors-4.jpg') }}" alt="Profile Image" width="50">
                                            @elseif ($user->id == 5)
                                                <img src="{{ asset('assets/img/doctors/doctors-3.jpg') }}" alt="Profile Image" width="50">
                                            @elseif ($user->id == 6)
                                                <img src="{{ asset('assets/img/doctors/doc.jpg') }}" alt="Profile Image" width="50">
                                            @else
                                                <img src="{{ asset('assets/img/doctors/' . ($doctorImages[$imgIndex % $doctorImagesCount])) }}" alt="Profile Image" width="50">
                                            @endif
                                        @endif
                                    </td>
                                    @php $imgIndex++; @endphp
                                    @if(Auth::user()->hasRole('admin'))
                                        <td>
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <form action="{{ route('profile.delete', ['id' => $user->id]) }}" method="post" class="dropdown-item" onsubmit="return confirm('Are you sure you want to delete your profile?');">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-link text-decoration-none"><i class="fa fa-trash-o m-r-5"></i> Delete</button>
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
                <div class="mt-4">
                    @if($type=='Patients')
                        <a href="{{ route('registerpatient') }}" class="btn btn-primary">Add Patient</a>
                    @elseif(Auth::user()->hasRole('admin'))
                        <a href="{{ route('register') }}" class="btn btn-primary">Add Employee</a>
                    @endif
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
