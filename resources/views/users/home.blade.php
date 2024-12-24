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
                    Total users = ({{count($users)}})


                </div>
            </div>
        </div>
    </div>

    <x-slot:scripts>
        <script>
            swal({
                    title: "Login Success",
                    text: " Have a good day!  ",
                    icon: "success",
                });

                
        </script>
    </x-slot:scripts>

</x-master>
