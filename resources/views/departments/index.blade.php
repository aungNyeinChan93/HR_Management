<x-master>
    <x-slot:title>
        Departments
    </x-slot:title>
    <div class="container mx-auto">



        <x-header>
            Departments
        </x-header>

        @session('success')
            <div class="px-4 py-3 my-2 text-sm text-green-700 bg-green-100 rounded-lg flex justify-between items-center"
                role="alert">
                {{ session('success') }}
                <button type="button" class="text-green-700" onclick="this.parentElement.style.display='none';">
                    &times;
                </button>
            </div>
        @endsession

        <div class="row px-5">
            <div class="col-12">
                <a href="{{ route('departments.create') }}" class="btn btn-secondary text-primary shadow-sm mb-3">Add
                    Department</a>
            </div>
        </div>


        <div>
            <div class="card p-4">
                <table class="mdl-data-table p-4 " id="departmentTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Department</th>
                            <th>Create Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>


    <x-slot:scripts>
        <script>
            $(document).ready(function() {
                $('#departmentTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: 'departments/dataTables/ssd',
                    columns: [{
                            data: 'id',
                            id: 'id'
                        },
                        {
                            data: 'title',
                            name: 'title'
                        },
                        {
                            data: 'created_at',
                            name: 'created_at'
                        },
                        {
                            data: 'action',
                            name: 'action'
                        }
                    ]
                });

            })

            @if (session('success'))
                swal({
                    title: "Create Department",
                    text: "You have been created successfully ",
                    icon: "success",
                });
            @endif
        </script>
    </x-slot:scripts>
</x-master>
