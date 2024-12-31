<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\CompanySetting;
use App\Models\CheckInCheckOut;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AttendanceScanController extends Controller
{
    //scan
    public function scan()
    {
        return view('attendance.scan');
    }

    // store
    public function store(Request $request)
    {
        $company_name = CompanySetting::first()->company_name;
        $scan_value = $request->key['data'];
        $message = '';

        if (Hash::check($company_name, $scan_value)) {

            if (!Auth::user()) {
                return to_route('')->with('notFound', 'user not found !');
            }

            $checkInCheckOut_data = CheckInCheckOut::firstOrCreate([
                "user_id" => Auth::user()->id,
                "date" => Carbon::now()->format('Y-m-d'),
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
                    return to_route('')->with('fail', 'You have been already chekin-checkout today!');
                }
            }
        }

        return redirect()->route('home')->with('message', $message);

    }
}


