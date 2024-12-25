<x-master>
    <x-slot:title>
        Departments
    </x-slot:title>
    <div class="container mx-auto">
        <x-header>
            Depatments
        </x-header>

        <div>
            <div class="card">
                <table class="mdl-data-table  " id="departmentTable">
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
            $(document).ready(function(){
                $('#departmentTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: 'departments/dataTables/ssd',
                    columns:[
                        {data:'id',id:'id'},
                        {data:'title',name:'title'},
                        {data:'created_at',name:'created_at'},
                        {data:'action',name:'action'}
                    ]
                });

            })

        </script>
    </x-slot:scripts>
</x-master>
