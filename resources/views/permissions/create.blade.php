<x-master>
    <x-slot:title>
        Permission create
    </x-slot:title>
    <div class="container mx-auto">
        <x-header>
            Permission Create
        </x-header>
        <div class="wrapper">
            <div class="row mt-5">
                <div class="col-md-6 offset-3">
                    <div class="card p-4">
                        <a href="{{route('permissions.index')}}" class="ms-2 text-secondary"> Back</a>

                        <form action="{{route('permissions.store')}}" method="POST">
                            @csrf
                            <div class="my-2">
                                <input type="text" name="name" value="{{old('name')}}" placeholder="name" class="form-control">
                                @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
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

