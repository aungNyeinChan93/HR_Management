<x-master>
    <x-slot:title>
        Attendance Edit
    </x-slot:title>

    <div class="container mx-auto">
        <x-header>
            Attendance Edit
        </x-header>
        <div class="wrapper">
            <div class="row">
                <div class="col-md-8 offset-2">
                    <a href="{{ route('checkin.list') }}" class="text-danger ms-1">back</a>
                    <div class="card p-4 my-2">
                        <form action="{{ route('checkin.update', $checkin_checkout->id) }}" method="POST">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-6">
                                    <label for="checkin_time" class="form-label ms-3">Checkin Time</label>
                                    <input type="time" name="checkin_time" class="form-control"
                                        value="{{ old('checkin_time') ?? $checkin_checkout->checkin_time }}">
                                    @error('checkin_time')
                                        <div class="text-danger text-sm">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label for="checkout_time" class="form-label ms-3">Checkout Time</label>
                                    <input type="time" name="checkout_time" class="form-control"
                                        value="{{ old('checkout_time') ?? $checkin_checkout->checkout_time }}">
                                    @error('checkout_time')
                                        <div class="text-danger text-sm">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="my-2">
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="user_id" class="form-label ms-3">Employee</label>
                                            <select name="user_id" class="form-control">
                                                <option value="">Choose Employee</option>
                                                @foreach ($employees as $employee)
                                                    <option value="{{ $employee->id }}"
                                                        @if ($employee->id == $checkin_checkout->user_id) selected @endif>
                                                        {{ $employee->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('user_id')
                                                <div class="text-danger text-sm">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-6">
                                            <label for="date" class="form-label ms-3">Date</label>
                                            <input type="date" name="date" class="form-control" @if (!auth()->user()->can('SSS'))
                                            disabled
                                            @endif 
                                                value="{{ $checkin_checkout->date }}">
                                        </div>
                                        @error('date')
                                            <div class="text-danger text-sm">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="my-2">
                                    <input type="submit" value="Update" class="btn btn-secondary">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-master>
