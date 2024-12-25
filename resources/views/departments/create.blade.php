<x-master>
    <x-slot:title>
        Department Create
    </x-slot:title>

    <div class="container mx-atuo">
        <x-header>
            Department Create
        </x-header>

        <div class="wrapper">
            <div class="row">
                <div class="col-md-6 offset-3">
                    <div class="card p-4">
                        <form action="{{route('departments.store')}}" method="POST">
                            @csrf

                            <div class="my-2">
                                <input type="text" name="title" class="form-control" placeholder="Department name">
                                @error('title')
                                    <span class="text-danger ">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="my-2">
                                <input type="submit" value="create" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-master>
