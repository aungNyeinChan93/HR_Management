<x-master>

    <x-slot:title>
        Home Page
    </x-slot:title>

    <div class="container mx-auto">
        <div class="flex justify-center">
            <div class="w-full">
                <x-header>
                    Home Page
                </x-header>

                <div class="row mt-3 p-3">
                    <div class="col-6">
                        <div class="card border border-danger">
                            <div class="card-header">
                                header
                            </div>
                            <div class="card-body">
                                this is body
                            </div>
                            <div class="card-footer">
                                footer
                            </div>
                        </div>
                    </div>
                    <div class="col-6 ">
                        <div class="card ">
                            <div class="card-header">
                                header
                            </div>
                            <div class="card-body">
                                this is body
                            </div>
                            <div class="card-footer">
                                footer
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-slot:scripts>
        <script>
            console.log('hello');
            alert('welcome to home page');
            confirm('are you sure?');
        </script>
    </x-slot:scripts>

</x-master>
