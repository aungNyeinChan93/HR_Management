<x-master>

    <x-slot:title>
        Home
    </x-slot:title>

    <div class="container mx-auto">
        <div class="flex justify-center">
            <div class="w-full">
                <x-header>
                    Home Page <span class="font-mono text-red-400 text-lg">({{ Auth::user()->name ?? null }})</span>
                </x-header>

                <div>
                  <div class="row">
                    <div class="col-6 ">
                        <div class="card d-flex justify-center text-center"  style="height: 200px">
                            <h3 class="text-danger"> Total users = ({{ count($users) }})</h3>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card p-2 " style="height: 200px">
                            <h4>Roles</h4>
                            <ul class="list-group">
                                @foreach (Auth::user()->roles as $role)
                                    <li class="list-group-item">{{ $role->name }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                  </div>

                <div class="row mt-3">
                    <div class="col-12 ">
                       <div class="card p-2 ">
                        <h3>Permissions</h3>
                        <ul>
                            @foreach (Auth::user()->roles as $role)
                                @foreach ($role->permissions as $permission)
                                    <li class="mx-1 p-1 badge badge-danger">{{ $permission->name }}</li>
                                @endforeach
                            @endforeach
                        </ul>
                       </div>
                    </div>
                </div>

                </div>
            </div>
        </div>
    </div>

    <x-slot:scripts>
        <script>
            // swal({
            //     title: "Login Success",
            //     text: " Have a good day!  ",
            //     icon: "success",
            // });
        </script>
    </x-slot:scripts>

</x-master>
