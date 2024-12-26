<x-master>
    <x-slot:title>
        role edit
    </x-slot:title>
    <div class="container mx-auto">
        <x-header>
            Role edit
        </x-header>
        <div class="wrapper">
            <div class="row mt-5">
                <div class="col-md-6 offset-3">
                    <div class="card p-4">
                        <a href="{{route('roles.index')}}" class="ms-2 text-secondary"> Back</a>

                        <form action="{{route('roles.update',$role->id)}}" method="POST">
                            @csrf
                            @method('put')
                            <div class="my-2">
                                <input type="text" name="name"  value="{{old('name') ??$role->name}}" placeholder="name" class="form-control">
                                @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                             <div class="my-2">
                                <div class="row ps-4 py-2">
                                    @foreach ($permissions as $permission)
                                        <div class="col-6 col-md-3">
                                            <label for="permission_{{$permission->id}}">{{ $permission->name }}</label>
                                            <input type="checkbox" name="permissions[]" value="{{$permission->name}}"
                                            @if (in_array($permission->name,$role->permissions->pluck('name')->toArray()))
                                                checked
                                            @endif
                                            id="permission_{{$permission->id}}" >
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="my-2">
                                <input type="submit" value="Update" class="btn btn-secondary ">
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

