<x-master>
    <x-slot:title>
        Employee Detail
    </x-slot:title>
    <div class="container mx-auto">
        <x-header>
            Employee Detail
        </x-header>
        <div>
            <div class="row my-3">
                <div class="col-8 offset-2">
                    <div class="card">
                        <div class="card-header bg-secondary text-white">
                            Employee Detail
                        </div>
                        <div class="card-body " style="height: ">
                            <div class="row">
                                <div class="col-3">
                                    <div class="w-100" style="">
                                        <img src="{{ $employee->profile_image != null ? asset('storage/' . $employee->profile_image) : asset('images/default.png') }}"
                                        alt=""
                                        class="w-100 mt-5  img-fluid rounded object-cover mx-auto"
                                    >
                                    </div>
                                </div>
                                <div class="col-9">
                                    <ul class="list-group w-100 mx-auto">
                                        <li class="list-group-item">
                                            <div class="d-flex justify-content-between px-2">
                                                <span>Name</span>
                                                <span>{{$employee->name}}</span>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="d-flex justify-content-between px-2">
                                                <span>Email</span>
                                                <span>{{$employee->email}}</span>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="d-flex justify-content-between px-2">
                                                <span>Employee ID</span>
                                                <span>{{$employee->employee_id}}</span>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="d-flex justify-content-between px-2">
                                                <span>Department</span>
                                                <span>{{$employee->department->title}}</span>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="d-flex justify-content-between px-2">
                                                <span>Phone Number</span>
                                                <span>{{$employee->phone}}</span>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="d-flex justify-content-between px-2">
                                                <span>Address</span>
                                                <span>{{$employee->address}}</span>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="d-flex justify-content-between px-2">
                                                <span>Date of join</span>
                                                <span>{{$employee->date_of_join}}</span>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="d-flex justify-content-between px-2">
                                                <span>Is Present </span>
                                                <span>{{$employee->is_active == 1 ? "present" :'leave'}}</span>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-secondary">
                            <a href="{{route('employees.index')}}" class="text-gray btn btn-sm btn-secondary ">Back</a>
                            <a href="{{route('employees.edit',$employee->id)}}" class="text-gray btn btn-sm btn-secondary mx-3">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-master>
