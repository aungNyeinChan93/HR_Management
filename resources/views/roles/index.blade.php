<x-master>
    <x-slot:title>
        roles
    </x-slot:title>
    <div class="container mx-auto">
        <x-header>
            Roles
        </x-header>
        <div class="wrapper">

            <div class="row ">
                <div class="col-10 offset-1">
                    <a href="{{ route('roles.create') }}" class="btn btn-secondary text-primary shadow-sm mb-3">Add
                        Role</a>
                </div>
            </div>

            <div class="row ">
                <div class="col-10 offset-1 ">
                    <div class="card p-4">
                        <table class="mdl-data-table p-4 " id="roleTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Role</th>
                                    <th>Create Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-slot:scripts>
        <script>
            $(document).ready(function() {
                $('#roleTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: 'roles/dataTables/ssd',
                    columns: [{
                            data: 'id',
                            id: 'id'
                        },
                        {
                            data: 'name',
                            name: 'name'
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
