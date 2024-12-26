<x-master>
    <div class="container mx-auto">
        <x-slot:title>
            Employee Edit Form
        </x-slot:title>

        <x-header>
            Employee Edit Form
        </x-header>

        <div class="wrapper">
            <div class="row my-4">
                <div class="col-8 offset-2">
                    <div class="card mt-3">
                        <div class="card-header bg-secondary text-primary">
                            <span class="h4 font-bold">Edit Form</span>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('employees.update',$employee->id) }}" method="POST" id='createForm'
                                enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')

                                <div class="mb-3 md-form">
                                    @if ($employee->profile_image)
                                        <img src="{{asset('storage/'.$employee->profile_image)}}" class="w-25 mx-auto p-4" id='image'>
                                    @else
                                        <img src="{{asset('images/default.png')}}" class="w-25 mx-auto p-4" id='image'>
                                    @endif
                                    <input type="file" name="profile_image"
                                        class="form-control @error('profile_image') is-invalid @enderror"
                                        onchange="loadFile(event)">
                                    @error('profile_image')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="my-3 md-form">
                                            <input type="text" name="name"
                                                class="form-control py-2 @error('name') is-invalid @enderror"
                                                placeholder="name" value="{{ old('name',$employee->name) }}">
                                            @error('name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="my-3 md-form">
                                            <input type="email" name="email"
                                                class="form-control py-2 @error('email') is-invalid @enderror"
                                                placeholder="email" value="{{ old('email') ?? $employee->email }}">
                                            @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="my-3 md-form">
                                            <input type="text" name="phone"
                                                class="form-control py-2 @error('phone') is-invalid @enderror"
                                                placeholder="phone" value="{{ old('phone') ?? $employee->phone }}">
                                            @error('phone')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="my-3 md-form">
                                            <input type="text" name="nrc_number"
                                                class="form-control py-2 @error('nrc_number') is-invalid @enderror"
                                                placeholder="nrc_number" value="{{ old('nrc_number') ?? $employee->nrc_number }}">
                                            @error('nrc_number')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="my-3 md-form">
                                    <input type="password" name="password"
                                        class="form-control py-2 @error('password') is-invalid @enderror"
                                        placeholder="password" value="{{ old('password') }}">
                                    @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="my-1 md-form">
                                            <label class="ms-2 form-label" for="birthday">Birthday</label>
                                            <input type="date" name="birthday" class="form-control"
                                                placeholder="birthday" value="{{ old('birthday')?? $employee->birthday }}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="my-1 md-form">
                                            <label class="ms-2 form-label" for="date_of_join">Date of join</label>
                                            <input type="date" name="date_of_join"
                                                class="form-control" placeholder="date_of_join"
                                                value="{{ old('date_of_join') ?? $employee->date_of_join}}">

                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="my-1 md-form">
                                            <label class="ms-2 form-label" for="employee_id">Employee ID</label>
                                            <input type="text" name="employee_id"
                                                class="form-control @error('employee_id') is-invalid @enderror"
                                                placeholder="employee id" value="{{ old('employee_id') ??$employee->employee_id }}">
                                            @error('employee_id')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="my-3 md-form col-6">
                                        <select name="gender"
                                            class="form-control @error('gender') is-invalid @enderror">
                                            <option value="">Choose Gender</option>
                                            <option value="male" {{ $employee->gender == 'male' ? 'selected' : '' }}>Male
                                            </option>
                                            <option value="female" {{ $employee->gender == 'female' ? 'selected' : '' }}>
                                                Female</option>
                                        </select>
                                        @error('gender')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="my-3 md-form col-6">
                                        <select name="department_id"
                                            class="form-control @error('department_id') is-invalid @enderror">
                                            <option value="">Choose department</option>
                                            @foreach ($departments as $department)
                                                <option value="{{ $department->id }}"
                                                    {{ $employee->department_id == $department->id ? 'selected' : '' }}>
                                                    {{ $department->title }}</option>
                                            @endforeach
                                        </select>
                                        @error('department_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mt-2 md-form">
                                    <select name="roles[]" id="" class="select2 p-2 form-select form-select-sm" multiple>
                                        @foreach ($roles as $role)
                                            <option value="{{$role->name}}"
                                                @if (in_array( $role->name, $employee->roles->pluck('name')->toArray()))
                                                    selected
                                                @endif
                                                >{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mt-2 md-from">
                                    <textarea name="address" cols="30" rows="3" class="form-control @error('address') is-invalid @enderror"
                                        placeholder="Address">{{ old('address',$employee->address) }}</textarea>
                                    @error('address')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                        </div>

                        <div class="card-footer">
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('employees.index') }}"><i class="fa-solid fa-"></i> Back</a>
                                <button form="createForm" type="submit"
                                    class="btn btn-sm btn-primary">Update</button>
                            </div>
                        </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>


    <x-slot:scripts>


        <script>
            function loadFile(event) {
                var reader = new FileReader();
                reader.onload = function() {
                    let image = document.getElementById("image");
                    image.src = reader.result;
                }
                reader.readAsDataURL(event.target.files[0]);
            }
        </script>
    </x-slot:scripts>
</x-master>
