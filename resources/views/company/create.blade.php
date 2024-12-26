<x-master>
    <x-slot:title>
        Company Create
    </x-slot:title>

    <div class="container mx-auto">
        <x-header>
            Company Create
        </x-header>

        <div class="wrapper my-5">
            <div class="row">
                <div class="col-md-6 offset-3">
                    <div class="card p-1">
                        <div class="card-header bg-secondary h5 text-center text-white">
                            Company Create Form
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <form action="">
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
                                                    <label for="office_start-time" class="form-label">Office Start
                                                        Time</label>
                                                    <input type="time" name="office_start-time"
                                                        id="office_start-time">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="my-1 d-flex">
                                                    <label for="office_end-time" class="form-label">Office End
                                                        Time</label>
                                                    <input type="time" name="office_end-time" id="office_end-time">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row px-3 ">
                                            <div class="col-6">
                                                <div class="my-1 d-flex">
                                                    <label for="break_start-time" class="form-label">Break Start
                                                        Time</label>
                                                    <input type="time" name="break_start-time" id="break_start-time">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="my-1 d-flex">
                                                    <label for="break_end-time" class="form-label">Break End
                                                        Time</label>
                                                    <input type="time" name="break_end-time" id="break_end-time">
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
                            <a href="{{route('company.index')}}" class="ms-3 text-white">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-master>
