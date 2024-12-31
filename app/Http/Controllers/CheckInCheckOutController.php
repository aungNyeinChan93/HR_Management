<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use App\Models\CompanySetting;
use App\Models\CheckInCheckOut;
use App\Jobs\CheckInCheckOutJob;

use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Hash;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class CheckInCheckOutController extends Controller
{
    /**
     * Summary of index
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $company_name = CompanySetting::first()->company_name;
        $hash_value = Hash::make($company_name);
        $qrCode = QrCode::size(300)->generate($hash_value);
        return view('CheckInCheckOut.index', compact('qrCode'));
    }

    /**
     * Summary of checkin_checkout
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function checkin_checkout(Request $request)
    {

        $user = User::where('pin_code', $request->pin_code)->first();
        $message = "";

        if (!$user) {
            return back()->with('notFound', 'wrong PIN !');
        }

        // if (CheckInCheckOut::whereNotNull('checkin_time')->exists()) {
        //     return back()->with('fail', 'you have already checkIn today');
        // }

        $checkInCheckOut_data = CheckInCheckOut::firstOrCreate(attributes: [
            "user_id" => $user->id,
            "date" => Carbon::now()->format("Y-m-d"),
        ]);

        if ($checkInCheckOut_data->checkin_time === null) {
            $checkInCheckOut_data->update([
                'checkin_time' => Carbon::now(),
            ]);
            $message = "you have been check in $checkInCheckOut_data->checkin_time !";
        } else {
            if ($checkInCheckOut_data->checkout_time === null) {
                $checkInCheckOut_data->update([
                    'checkout_time' => Carbon::now(),
                ]);
                $message = "you have been check out $checkInCheckOut_data->checkout_time !";
            } else {
                $message = "";
                return back()->with('fail', 'You have been already chekin-checkout today!');
            }
        }

        CheckInCheckOutJob::dispatch($user);

        return to_route('checkin.index')->with('success', $message);
    }


    /**
     * Summary of list
     * @return \Illuminate\Contracts\View\View
     */
    public function list()
    {
        $checkin_checkout_data = CheckInCheckOut::query()->latest()->paginate(10);
        return view('CheckInCheckOut.list', compact('checkin_checkout_data'));
    }


    // create
    public function create()
    {
        if (!auth()->user()->can('create_Attendance')) {
            abort(403, 'HR Only !');
        }
        $employees = User::query()->get();
        return view('CheckInCheckOut.create', compact('employees'));
    }

    // store
    public function store(Request $request)
    {
        $fields = $request->validate([
            'user_id' => 'required',
            'date' => 'required',
            'checkin_time' => 'nullable',
            'checkout_time' => 'nullable',
        ]);

        CheckInCheckOut::create($fields);

        return to_route('checkin.list')->with('success', 'Attendance create success!');
    }


    // show
    public function show($id)
    {
        $checkin_checkout = CheckInCheckOut::findOrFail($id);
        return view('CheckInCheckOut.show', data: compact(var_name: 'checkin_checkout'));
    }

    // edit
    public function edit($id)
    {
        $employees = User::query()->get();
        $checkin_checkout = CheckInCheckOut::findOrFail($id);
        return view('CheckInCheckOut.edit', compact('checkin_checkout', 'employees'));
    }

    // update
    public function update(Request $request, $id)
    {
        $fields = $request->validate([
            'user_id' => 'required',
            'date' => 'required',
            'checkin_time' => 'nullable',
            'checkout_time' => 'nullable',
        ]);
        $checkin_checkout = CheckInCheckOut::findOrFail($id);

        $checkin_checkout->update($fields);

        return to_route('checkin.list')->with('update', 'Attendance update success!');

    }

    // destory
    public function destory($id)
    {
        if (!auth()->user()->hasRole("HR")) {
            abort(403, 'HR only');
        }
        $checkin_checkout = CheckInCheckOut::findOrFail($id);
        $checkin_checkout->delete();
        return to_route('checkin.list')->with('delete', 'Attendavce delete success!');
    }


    // overview
    public function overview(){
        $periods = CarbonPeriod::create("2024-12-1",'2024-12-31');
        $employees = User::query()->orderBy("id",'asc')->get();
        $attendances = CheckInCheckOut::whereMonth("date",'12')->whereYear('date','2024')->get();
        $companySetting = CompanySetting::first();
        return view('CheckInCheckOut.overview',compact('periods','employees','attendances','companySetting'));
    }


}
