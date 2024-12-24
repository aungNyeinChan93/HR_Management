<x-master>
    <div class="container mx-auto">
        <x-slot:title>
            User Detail
        </x-slot:title>

        <x-header>
            User Detail
        </x-header>

        <div class="wrapper">
            <div class="row my-5 ">
                <div class="col-md-10 offset-1">
                    <div class="card mb-3">
                        <div class="card-header bg-secondary text-white">
                            {{ $user->name }}
                        </div>
                        <div class="card-header">
                            <div class="row">
                                <div class="col-4">
                                    <div class="d-flex justify-content-center mt-5 ">
                                        @if ($user->profile_image)
                                            <img src="{{ asset('storage/' . $user->profile_image) }}" alt=""
                                                class="w-100 mx-auto px-2 img-fluid">
                                        @else
                                            <img src="{{ asset('images/default.png') }}" alt=""
                                                class="w-100 mx-auto px-2 img-fluid">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-8">
                                    <ul class=" list-group">
                                        <li class="list-group-item">
                                            <p>Email : <span>{{ $user->email }}</span></p>
                                        </li>
                                        <li class="list-group-item">
                                            <p>Address : <span>{{ $user->address }}</span></p>
                                        </li>
                                        <li class="list-group-item">
                                            <p>Phone : <span>{{ $user->phone }}</span></p>
                                        </li>
                                        <li class="list-group-item">
                                            <p>NRC : <span>{{ $user->nrc_number }}</span></p>
                                        </li>
                                        <li class="list-group-item">
                                            <p>Gender : <span>{{ $user->gender }}</span></p>
                                        </li>
                                        <li class="list-group-item">
                                            <p>Employee ID : <span>{{ $user->employee_id }}</span></p>
                                        </li>
                                        <li class="list-group-item">
                                            <p>Department : <span>{{ strtoupper($user->department->title) }}</span></p>
                                        </li>
                                    </ul>

                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-secondary">
                            <a class="text-white btn btn-sm btn-primary" href="{{ route('users.index') }}">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-master>
