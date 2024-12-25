<x-master>
    <div class="container mx-auto">
        <x-slot:title>
            Employee Create Form
        </x-slot:title>

        <x-header>
            Employee Create Form
        </x-header>

        <div class="wrapper">
            <div class="row my-4">
                <div class="col-8 offset-2">
                    <div class="card mt-3">
                        <div class="card-header bg-secondary text-primary">
                            <span class="h4 font-bold">Create Form</span>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('employees.store') }}" method="POST" id='createForm'
                                enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3 md-form">
                                    <div id="image-container" class="d-flex justify-content-between align-item-center">
                                        <img src="" class="w-25 mx-auto p-4" >
                                    </div>
                                    <input type="file" name="profile_image"
                                        class="form-control @error('profile_image') is-invalid @enderror"
                                        onchange="loadFile(event)" multiple>
                                    @error('profile_image')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="my-3 md-form">
                                            <input type="text" name="name"
                                                class="form-control py-2 @error('name') is-invalid @enderror"
                                                placeholder="name" value="{{ old('name') }}">
                                            @error('name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="my-3 md-form">
                                            <input type="email" name="email"
                                                class="form-control py-2 @error('email') is-invalid @enderror"
                                                placeholder="email" value="{{ old('email') }}">
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
                                                placeholder="phone" value="{{ old('phone') }}">
                                            @error('phone')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="my-3 md-form">
                                            <input type="password" name="nrc_number"
                                                class="form-control py-2 @error('nrc_number') is-invalid @enderror"
                                                placeholder="nrc_number" value="{{ old('nrc_number') }}">
                                            @error('nrc_number')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="my-3 md-form">
                                    <input type="text" name="password"
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
                                                placeholder="birthday" value="{{ old('birthday') }}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="my-1 md-form">
                                            <label class="ms-2 form-label" for="date_of_join">Date of join</label>
                                            <input type="date" name="date_of_join"
                                                class="form-control" placeholder="date_of_join"
                                                value="{{ old('date_of_join') }}">

                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="my-1 md-form">
                                            <label class="ms-2 form-label" for="employee_id">Employee ID</label>
                                            <input type="text" name="employee_id"
                                                class="form-control @error('employee_id') is-invalid @enderror"
                                                placeholder="employee id" value="{{ old('employee_id') }}">
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
                                            <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male
                                            </option>
                                            <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>
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
                                                    {{ old('department_id') == $department->id ? 'selected' : '' }}>
                                                    {{ $department->title }}</option>
                                            @endforeach
                                        </select>
                                        @error('department_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mt-2 md-from">
                                    <textarea name="address" cols="30" rows="3" class="form-control @error('address') is-invalid @enderror"
                                        placeholder="Address">{{ old('address') }}</textarea>
                                    @error('address')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                        </div>

                        <div class="card-footer">
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('employees.index') }}"><i class="fa-solid fa-"></i> Back</a>
                                <button form="createForm" type="submit"
                                    class="btn btn-sm btn-primary">Create</button>
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
            // image preview
            function loadFile(event) {
                var files = event.target.files;
                var imageContainer = document.getElementById("image-container");
                imageContainer.innerHTML = ""; // Clear previous images

                for (var i = 0; i < files.length; i++) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        var img = document.createElement("img");
                        img.src = e.target.result;
                        img.className = "w-25 mx-auto p-4";
                        imageContainer.appendChild(img);
                    }
                    reader.readAsDataURL(files[i]);
                }
            }

            // date range picker

            $('#birthday').daterangepicker({
                "singleDatePicker": true,
                "showDropdowns": true,
                "autoApply": true,
                "locale": {
                    "format": "MM/DD/YYYY",
                }
            });
            $('#date_of_join').daterangepicker({
                "singleDatePicker": true,
                "showDropdowns": true,
                "autoApply": true,
                "locale": {
                    "format": "MM/DD/YYYY",
                }
            });
        </script>
    </x-slot:scripts>
</x-master>
