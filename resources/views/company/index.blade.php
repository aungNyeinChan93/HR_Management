<x-master>
    <x-slot:title>
        Company Seeting
    </x-slot:title>

    <div class="container mx-auto">
        <x-header>
            Company Profile
        </x-header>

        <div class="row">
            <div class="col-8 offset-2">
                @role(['CEO'])
                    <a href="{{ route('company.create') }}" class="btn btn-secondary text-primary shadow-sm mb-3">Create
                        Company</a>
                @endrole
            </div>
        </div>


        <div class="row">
            <div class="col-8 offset-2">
                @if ($company)
                    <div class="card">
                        <div class="card-header">
                            Company Setting
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item">Company Name <span
                                        class="text-muted float-end">{{ $company->company_name }}</span></li>
                                <li class="list-group-item">Company Email <span
                                        class="text-muted float-end">{{ $company->company_email }}</span></li>
                                <li class="list-group-item">Company Phone <span
                                        class="text-muted float-end">{{ $company->company_phone }}</span></li>
                                <li class="list-group-item">Company Address <span
                                        class="text-muted float-end">{{ $company->company_address }}</span></li>
                                <li class="list-group-item">Contact Person <span
                                        class="text-muted float-end">{{ $company->contact_person }}</span></li>
                                <li class="list-group-item">Office Start Time <span
                                        class="text-muted float-end">{{ $company->office_start_time }}</span></li>
                                <li class="list-group-item">Office End Time <span
                                        class="text-muted float-end">{{ $company->office_end_time }}</span></li>
                                <li class="list-group-item">Break Start Time <span
                                        class="text-muted float-end">{{ $company->break_start_time }}</span></li>
                                <li class="list-group-item">Break End Time <span
                                        class="text-muted float-end">{{ $company->break_end_time }}</span></li>
                            </ul>
                        </div>
                        <div class="card-footer ">
                            <a href="{{ route('home') }}" class="btn btn-sm btn-secondary me-1">Back</a>
                            <a href="{{ route('company.edit', $company->id) }}"
                                class="btn btn-sm btn-primary me-1">Edit</a>
                            <a href="{{ route('company.destory', $company->id) }}"
                                class="btn btn-sm btn-danger me-1">Delete</a>
                        </div>
                    </div>
                @else
                    <div class="card p-5 text-center text-danger">
                        Empty Company!
                    </div>
                @endif
            </div>
        </div>


    </div>
</x-master>
