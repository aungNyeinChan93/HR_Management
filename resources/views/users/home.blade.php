<x-master>

    <x-slot:title>
        Home
    </x-slot:title>

    <div class="container mx-auto">
        <div class="flex justify-center">
            <div class="w-full">
                <x-header>
                    Home Page <span class="font-mono text-red-400 text-lg">({{ Auth::user()->name }})</span>
                </x-header>
            </div>
        </div>
    </div>

    <x-slot:scripts>
        <script>
            // let btn = document.getElementById('btn-test');
            // btn.addEventListener('click', function() {
            //     alert('button clicked');
            //     btn.style.backgroundColor = 'red';
            // });
        </script>
    </x-slot:scripts>

</x-master>
