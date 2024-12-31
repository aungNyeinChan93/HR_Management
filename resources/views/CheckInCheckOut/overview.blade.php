<x-master>
    <x-slot:title>
        Attendance Overview
    </x-slot:title>
    <div class="container mx-auto">
        <x-header>
            Attendance Overview
        </x-header>
        <div class="wrapper">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class=" table table-bordered table-primary table-hover">
                                    <thead>
                                        <tr>
                                            <th>Employee</th>
                                            @foreach ($periods as $period)
                                                <th>{{ $period->format('d') }}</th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($employees as $employee)
                                            <tr>
                                                <td>{{ $employee->name }}</td>
                                                @foreach ($periods as $period)
                                                    @php

                                                        $attendance_icon = '';
                                                        $attendance = $attendances
                                                            ->where('user_id', $employee->id)
                                                            ->where('date', $period->format('Y-m-d'))
                                                            ->first();

                                                        if ($attendance) {
                                                            if (
                                                                $attendance->checkin_time <
                                                                $companySetting->office_start_time
                                                            ) {
                                                                $attendance_icon =
                                                                    '<i class="fa-solid fa-check text-primary"></i>';
                                                            } elseif (
                                                                $attendance->checkin_time >
                                                                    $companySetting->office_start_time &&
                                                                $attendance->checkin_time <
                                                                    $companySetting->break_start_time
                                                            ) {
                                                                $attendance_icon =
                                                                    '<i class="fa-solid fa-check text-warning"></i>';
                                                            } else {
                                                                $attendance_icon =
                                                                    '<i class="fa-solid fa-xmark text-danger"></i>';
                                                            }
                                                        }
                                                    @endphp
                                                    <td>{!! $attendance_icon !!}</td>
                                                @endforeach
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-master>
