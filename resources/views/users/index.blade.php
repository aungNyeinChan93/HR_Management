<x-master>
    <x-slot:title>
        User
    </x-slot:title>

    <div class="wrapper container mx-auto">

        @session('success')
            <div class="px-4 py-3 my-2 text-sm text-green-700 bg-green-100 rounded-lg flex justify-between items-center"
                role="alert">
                {{ session('success') }}
                <button type="button" class="text-green-700" onclick="this.parentElement.style.display='none';">
                    &times;
                </button>
            </div>
        @endsession

        <x-header>
            User Page
        </x-header>

        <div class="row px-2 my-4">
            <div class="col-12">
                <x-table>
                    <x-slot:header>
                        User Lists
                    </x-slot:header>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ strtoupper($user->department->title) }}</td>
                            <td>
                                <div class="d-flex justify-content-around">
                                    <a href="{{route('users.show',$user->id)}}" class="btn btn-sm btn-info">detail</a>
                                    @can('delete', $user)
                                    <form action="{{ route('users.destory', $user->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                @endcan
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </x-table>
            </div>
            <div class="col-12 mt-3">
                {{$users->links()}}
            </div>
        </div>
    </div>

</x-master>
