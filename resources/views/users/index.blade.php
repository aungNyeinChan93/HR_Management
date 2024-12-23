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
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->nrc_number }}</td>
                            <td>{{ $user->address }}</td>
                            <td>
                                @can('delete', $user)
                                    <form action="{{ route('users.destory', $user->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </x-table>
            </div>
        </div>
    </div>

</x-master>
