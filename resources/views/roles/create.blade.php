<x-master>
    <x-slot:title>
        role create
    </x-slot:title>
    <div class="container mx-auto">
        <x-header>
            Role Create
        </x-header>
        <div class="wrapper">
            <div class="row mt-5">
                <div class="col-md-10 offset-1">
                    <div class="card p-4">
                        <a href="{{ route('roles.index') }}" class="ms-2 text-secondary"> Back</a>

                        <form action="{{ route('roles.store') }}" method="POST">
                            @csrf
                            <div class="my-2">
                                <input type="text" name="name" value="{{ old('name') }}" placeholder="name"
                                    class="form-control">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="my-2">
                                <div class="row ps-4">
                                    @foreach ($permissions as $permission)
                                        <div class="col-6 col-md-3 my-1 p-1">
                                            <label for="permission_{{$permission->id}}">{{ $permission->name }}</label>
                                            <input type="checkbox" name="permissions[]" value="{{$permission->name}}"  id="permission_{{$permission->id}}" ">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="my-2">
                                <input type="submit" value="Create" class="btn btn-secondary ">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-slot:scripts>


    </x-slot:scripts>
</x-master>
