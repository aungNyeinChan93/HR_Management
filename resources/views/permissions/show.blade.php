<x-master>
    <x-slot:title>
        Permission Detail
    </x-slot:title>
    <div class="container mx-auto">
        <x-header>
            Permission Detail
        </x-header>
        <div>
            <div class="row my-3">
                <div class="col-8 offset-2">
                    <div class="card">
                        <div class="card-header bg-secondary text-white">
                            Permission Detail
                        </div>
                        <div class="card-body " style="height: ">
                            <div class="row">
                                <div class="col-12">
                                    <ul class="list-group w-100 mx-auto">
                                        <li class="list-group-item">
                                            <div class="d-flex justify-content-between px-2">
                                                <span>Permission Name</span>
                                                <span>{{$permission->name}}</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-secondary d-flex">
                            <a href="{{route('permissions.index')}}" class="text-gray btn btn-sm btn-secondary ">Back</a>
                            <a href="{{route('permissions.edit',$permission->id)}}" class="text-gray btn btn-sm btn-warning mx-3">Edit</a>
                            <form action="{{route('permissions.destroy',$permission->id)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-master>
