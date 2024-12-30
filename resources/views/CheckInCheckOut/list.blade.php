<x-master>
    <x-slot:title>
        CheckIn CheckOut List
    </x-slot:title>
    <div class="container mx-auto">
        <x-header>
            CheckIn CheckOut List
        </x-header>
        <div class="wrapper">

            <div class="row px-5">
                @session('success')
                    <div class="px-4 py-3 my-2 text-sm text-green-700 bg-green-100 rounded-lg flex justify-between items-center"
                        role="alert">
                        {{ session('success') }}
                        <button type="button" class="text-green-700" onclick="this.parentElement.style.display='none';">
                            &times;
                        </button>
                    </div>
                @endsession

                @session('update')
                    <div class="px-4 py-3 my-2 text-sm text-green-700 bg-green-100 rounded-lg flex justify-between items-center"
                        role="alert">
                        {{ session('update') }}
                        <button type="button" class="text-green-700" onclick="this.parentElement.style.display='none';">
                            &times;
                        </button>
                    </div>
                @endsession

                @session('delete')
                    <div class="px-4 py-3 my-2 text-sm text-green-700 bg-green-100 rounded-lg flex justify-between items-center"
                        role="alert">
                        {{ session('delete') }}
                        <button type="button" class="text-green-700" onclick="this.parentElement.style.display='none';">
                            &times;
                        </button>
                    </div>
                @endsession


            </div>

            <div class="row px-5">
                <div class="col-12">
                    <a href="{{ route('checkin.create') }}" class="btn btn-secondary text-primary shadow-sm mb-3">Create
                        ttendance</a>
                </div>
            </div>



            <div class="row">
                <div class="col-12">
                    <div class="me-4 p-2 float-end">
                        <a href="{{ route('home') }}" class="btn btn-sm btn-info">Back</a>
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
                                                <a href="{{ route('checkin.show', $item->id) }}"
                                                    class="btn btn-sm btn-primary">Detail</a>
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
