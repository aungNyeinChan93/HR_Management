<x-master>
    <x-slot:title>
        Attendance Scan
    </x-slot:title>

    <div class="container mx-auto">
        <x-header>
            Attendance Scan
        </x-header>
        <div class="wrapper">

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
                            <button type="button" class="text-yellow-700"
                                onclick="this.parentElement.style.display='none';">
                                &times;
                            </button>
                        </div>
                    @endsession
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 offset-3 mt-4">
                    <div class="card p-2 text-center ">
                        <div class=" mx-auto" style="width:250px">
                            <img src="{{ asset('images/scan.png') }}" alt="" class="">
                        </div>
                        <div>
                            <p class="text-muted">Attendance Scan</p>
                        </div>
                        <div>
                            <button type="button" class="btn btn-secondary my-1 qr-btn" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Scan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 " id="exampleModalLabel">Attendance Scan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <video id="video"></video>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <x-slot:vite>
        {{-- @vite(['resources/js/qr_scan/qr-scanner.umd.min.js']) --}}
    </x-slot:vite>


    <x-slot:scripts>

        <script src="{{ asset('js/qr_scan/qr-scanner.umd.min.js') }}"></script>

        <script>
            const myModalEl = document.getElementById('exampleModalLabel')
            let qr_btn = document.querySelector('.qr-btn');
            let close_btn = document.querySelector('.close-btn');
            let videoElem = document.getElementById('video');
            const qrScanner = new QrScanner(
                videoElem,
                function(result) {
                    console.log(result);

                    if (result) {

                        const qr_data = async (result) => {
                            const res = await fetch('http://localhost:8000/attendance_scan', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                body: JSON.stringify({
                                    key: result
                                })
                            });
                        }
                        qr_data(result);

                        qrScanner.stop();
                        const modal = bootstrap.Modal.getInstance(myModalEl.closest('.modal'));
                        modal.hide();

                        window.location.href = '/home';
                    }

                }, {
                    /* your options or returnDetailedScanResult: true if you're not specifying any other options */

                },
            );



            qr_btn.addEventListener('click', function() {
                qrScanner.start();
            })
            close_btn.addEventListener('click', function() {
                qrScanner.stop();
            })
        </script>
    </x-slot:scripts>


</x-master>
