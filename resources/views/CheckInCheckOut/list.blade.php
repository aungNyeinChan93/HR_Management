<x-master>
    <x-slot:title>
        CheckIn CheckOut List
    </x-slot:title>
    <div class="container mx-auto">
        <x-header>
            CheckIn CheckOut List
        </x-header>
        <div class="wrapper">
            <div class="row">
                <div class="col-12">
                    <div class="me-4 p-2 float-end">
                        <a href="{{route('home')}}" class="btn btn-sm btn-info">Back</a>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <span class="h4  text-danger">CheckIn CheckOut List</span>
                        </div>
                        <div class="card-body">
                            <table class="table table-success table-hover mdl-data-table" id="checkIn_checkOut_Table">
                                <thead>
                                    <tr>

                                        <th>Date</th>
                                        <th>Name</th>
                                        <th>CheckIn Time</th>
                                        <th>CheckOut Time</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($checkin_checkout_data as $item)
                                        <tr>
                                            <td>{{ $item->date }}</td>
                                            <td>{{ $item->user->name }}</td>
                                            <td>{{ $item->checkin_time }}</td>
                                            <td>{{ $item->checkout_time }}</td>
                                            <td>
                                                <a href="" class="btn btn-sm btn-primary">Detail</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer px-5">
                            {{ $checkin_checkout_data->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-slot:scripts>

    </x-slot:scripts>
</x-master>
