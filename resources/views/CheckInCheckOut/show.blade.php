<x-master>

    <x-slot:title>
        Detail
    </x-slot:title>

    <div class="container mx-auto">
        <x-header>
            Detail
        </x-header>

        <div class="wrapper">
            <div class="row">
                <div class="col-md-6 offset-3">
                    <div class="card p-1">
                        <div class="card-header">
                            <h4>User Name ( <span class="text-danger h5">{{ $checkin_checkout->user->name }}</span> )
                            </h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    Date - {{ $checkin_checkout->date }}
                                </li>
                                <li class="list-group-item">
                                    Checkin Time - {{ $checkin_checkout->checkin_time }}
                                </li>
                                <li class="list-group-item">
                                    Checkout Time - {{ $checkin_checkout->checkout_time }}
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer">
                            <a href="{{route('checkin.list')}}" class="btn btn-sm btn-primary">back</a>
                            <a href="{{route('checkin.edit',$checkin_checkout->id)}}" class="btn btn-sm btn-warning">edit</a>
                            <button form='delete-attendance' class="btn btn-sm btn-danger">delete</button>
                        </div>
                    </div>

                    <form action="{{route('checkin.destory',$checkin_checkout->id)}}" method="POST" id="delete-attendance" class="hidden">
                        @csrf
                        @method('delete')
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-master>
