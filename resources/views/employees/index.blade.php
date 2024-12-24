<x-master>
    <div class="container mx-auto">
        <x-slot:title>
            Employees
        </x-slot:title>

        <x-header>
            Employee Lists
        </x-header>

        <div class="row">
            <div class="col-12">
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
                <a href="{{ route('employees.create') }}" class="btn btn-secondary text-primary shadow-sm mb-3">Add
                    Employee</a>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12 px-5">
                <div class="card overflow-scroll">
                    <table id="DataTable" class="tabel table-success table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Department</th>
                                <th>Is Active</th>
                                <th>Create Date</th>
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
                columns: [{
                        data: 'id',
                        id: 'name'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'phone',
                        name: 'phone'
                    },
                    {
                        data: 'address',
                        name: 'address'
                    },
                    {
                        data: 'department name',
                        name: 'department name'
                    },
                    {
                        data: 'is_active',
                        name: 'is_active'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                ]
            });
        </script>
    </x-slot:scripts>
</x-master>
