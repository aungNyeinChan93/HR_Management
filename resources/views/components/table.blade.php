<div class="p-1 rounded shadow">

    <h4 class="p-2 text-danger h2 text-center">{{$header}}</h4>
    <table class="table table-border table-hover text-white text-center rounded shadow-amber-50">
        <thead class="">
            <tr class="table-danger border">
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>NRC No</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            {{ $slot }}
        </tbody>
    </table>

</div>
