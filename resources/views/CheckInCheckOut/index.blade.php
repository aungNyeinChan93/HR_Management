<x-master>
    <x-slot:title>
        Check In / Check Out
    </x-slot:title>

    <div class="container mx-auto">
        <x-header>
            Checkin Checkout
        </x-header>
        <div class="wrapper ">

            <div class="row">
                <div class="col-10.offset-1">
                    @session('success')
                        <div class="px-4 py-3 my-2 text-sm text-green-700 bg-green-100 rounded-lg flex justify-between items-center"
                            role="alert">
                            {{ session('success') }}
                            <button type="button" class="text-green-700" onclick="this.parentElement.style.display='none';">
                                &times;
                            </button>
                        </div>
                    @endsession

                    @session('fail')
                        <div class="px-4 py-3 my-2 text-sm text-red-700 bg-red-100 rounded-lg flex justify-between items-center"
                            role="alert">
                            {{ session('fail') }}
                            <button type="button" class="text-red-700" onclick="this.parentElement.style.display='none';">
                                &times;
                            </button>
                        </div>
                    @endsession

                    @session('notFound')
                        <div class="px-4 py-3 my-2 text-sm text-yellow-700 bg-yellow-100 rounded-lg flex justify-between items-center"
                            role="alert">
                            {{ session('notFound') }}
                            <button type="button" class="text-yellow-700" onclick="this.parentElement.style.display='none';">
                                &times;
                            </button>
                        </div>
                    @endsession
                </div>
            </div>

            <div class="row">
                <div class="col-6 offset-3">
                    <div class="card my-2">
                        <div class="card-header text-center">
                            <h5 class="text-center text-primary"> CheckIn & CheckOut</h5>
                        </div>
                        <div class="card-body">
                            <label for="" class="text-center form-label ">QR SCAN</label>
                            <div class="row ">
                                <div class="col-6 offset-3 my-3 ">
                                    {{ $qrCode }}
                                </div>
                            </div>
                            <hr>

                            <div class="mt-4 t6ext-center">
                                <form action="{{ route('checkin') }}" method="post">
                                    @csrf
                                    <label for="pincode-input1" class="ms-3 form-label ">PIN</label>
                                    <input type="text" name="pin_code" id="pincode-input1">
                                    @error('pin_code')
                                        <small class="alert text-sm">{{ $message }}</small>
                                    @enderror
                                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                                </form>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('welcome.index') }}">back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <x-slot:scripts>
        <script>
            $(document).ready(function() {

                $('#pincode-input1').pincodeInput({
                    inputs: 6,
                    placeholders: '* * * * * *',
                    hidedigits: false,
                    complete: function(value, e, errorElement) {
                        console.log("code entered: " + value);
                        // $.ajax({
                        //     url: 'http://localhost:8000/checkin',
                        //     type: "POST",
                        //     data: {
                        //         "pin_code": value
                        //     },
                        //     success: function(res) {
                        //         alert(res)
                        //     }
                        // })
                        // $(errorElement).html("I'm sorry, but the code not correct");
                    }
                });
            });
        </script>
    </x-slot:scripts>
</x-master>
