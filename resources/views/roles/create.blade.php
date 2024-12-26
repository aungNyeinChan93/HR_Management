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
                <div class="col-md-6 offset-3">
                    <div class="card p-4">
                        <a href="{{route('roles.index')}}" class="ms-2 text-secondary"> Back</a>

                        <form action="{{route('roles.store')}}" method="POST">
                            @csrf
                            <div class="my-2">
                                <input type="text" name="name" placeholder="name" class="form-control">
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

