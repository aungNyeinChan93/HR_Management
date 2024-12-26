<x-master>
    <div class="container mx-auto">
        <x-slot:title>
            Employees
        </x-slot:title>

        <x-header>
            Employee Lists
        </x-header>

        <div class="row">
            <div class="col-10.offset-1">
                @session('success')
                    <div class="px-4 py-3 my-2 text-sm text-green-700 bg-green-100 rounded-lg flex justify-between items-center"
                        role="alert">
                        {{ session('success') }}
                        <button type="button" class="text-green-700" onclick="this.parentElement.style.display='none';">
                            &times;
                        </button>
                    </div>
                @endsession
            </div>
        </div>

        <div class="row px-5">
            <div class="col-12">
               @role(['HR','CEO'])
                <a href="{{ route('employees.create') }}" class="btn btn-secondary text-primary shadow-sm mb-3">Add
                    Employee</a>
                @endrole
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12 px-5">
                <div class="card overflow-scroll">
                    <table id="DataTable" class="tabel table-success table-hover mdl-data-table">
                        <thead>
                            <tr>
                                {{-- <th>No</th> --}}
                                <th>Profile Image</th>
                                <th>Name</th>
                                {{-- <th>Email</th> --}}
                                {{-- <th>Phone</th>
                                <th>Address</th> --}}
                                <th>Department</th>
                                <th>Roles</th>
                                <th>Is Active</th>
                                {{-- <th>Create Date</th> --}}
                                <th>Update Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <x-slot:scripts>
        <script>
            $('#DataTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: 'employees/dataTables/ssd',
                columns: [
                    // {
                    //     data: 'id',
                    //     id: 'name'
                    // },
                   {
                        data:'profile_image',
                        name:'profile_image'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    // {
                    //     data: 'email',
                    //     name: 'email'
                    // },
                    // {
                    //     data: 'phone',
                    //     name: 'phone'
                    // },
                    // {
                    //     data: 'address',
                    //     name: 'address'
                    // },
                    {
                        data: 'department name',
                        name: 'department name'
                    },
                    {
                        data: 'roles',
                        name: 'roles'
                    },
                    {
                        data: 'is_active',
                        name: 'is_active'
                    },
                    // {
                    //     data: 'created date',
                    //     name: 'created date'
                    // },
                    {
                        data:'updated date',
                        name:'updated date'
                    },
                    {
                        data:'action',
                        name:'action'
                    }
                ],
            });

            @if (session('success'))
                swal({
                    title: "Create Employee",
                    text: "You have been created successfully ",
                    icon: "success",
                });
            @endif
        </script>
    </x-slot:scripts>
</x-master>
