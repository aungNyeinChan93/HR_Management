<x-master>
    <x-slot:title>
        Company Create
    </x-slot:title>

    <div class="container mx-auto">
        <x-header>
            Company Create
        </x-header>


        <div class="wrapper my-5">

            @if ($errors)
                <div class="row">
                    <div class="col-md-6 offset-3">
                        <div class="card p-2">
                            @foreach ($errors->all() as $error)
                                <small class="text-danger alert alert-danger ">{{ $error }}</small>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            <div class="row">
                <div class="col-md-6 offset-3">
                    <div class="card p-1">
                        <div class="card-header bg-secondary h5 text-center text-white">
                            Company Create Form
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <form action="{{ route('company.store') }}" method="POST">
                                        @csrf

                                        <div class="my-1">
                                            <input type="text" name="company_name" placeholder="name"
                                                class="form-control">
                                        </div>
                                        <div class="my-1">
                                            <input type="email" name="company_email" placeholder="email"
                                                class="form-control">
                                        </div>
                                        <div class="my-1">
                                            <input type="phone" name="company_phone" placeholder="phone"
                                                class="form-control">
                                        </div>
                                        <div class="my-1">
                                            <input type="text" name="contact_person" placeholder="contact_person"
                                                class="form-control">
                                        </div>
                                        <div class="my-1">
                                            <textarea name="company_address" class="form-control" cols="30" rows="3" placeholder="address"></textarea>
                                        </div>
                                        <div class="row px-3 ">
                                            <div class="col-6">
                                                <div class="my-1 d-flex">
                                                    <label for="office_start_time" class="form-label">Office Start
                                                        Time</label>
                                                    <input type="time" name="office_start_time"
                                                        id="office_start_time">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="my-1 d-flex">
                                                    <label for="office_end_time" class="form-label">Office End
                                                        Time</label>
                                                    <input type="time" name="office_end_time" id="office_end_time">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row px-3 ">
                                            <div class="col-6">
                                                <div class="my-1 d-flex">
                                                    <label for="break_start_time" class="form-label">Break Start
                                                        Time</label>
                                                    <input type="time" name="break_start_time" id="break_start_time">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="my-1 d-flex">
                                                    <label for="break_end_time" class="form-label">Break End
                                                        Time</label>
                                                    <input type="time" name="break_end_time" id="break_end_time">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="my-1">
                                            <input type="submit" value="Create" class="btn btn-secondary">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-secondary">
                            <a href="{{ route('company.index') }}" class="ms-3 text-white">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-slot:scripts>
        <script>

        </script>
    </x-slot:scripts>
</x-master>
