<?php

namespace App\Http\Controllers;

use App\Jobs\CheckInCheckOutJob;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\CheckInCheckOut;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class CheckInCheckOutController extends Controller
{
    //checkInCheckOut
    public function index()
    {
        $qrCode = QrCode::size(300)->generate('QR_code, HR_MANAGEMENT');
        return view('CheckInCheckOut.index', compact('qrCode'));
    }

    // checkin
    public function checkin(Request $request)
    {

        $user = User::where('pin_code', $request->pin_code)->first();
        if (!$user) {
            return back()->with('notFound', 'wrong PIN !');
        }

        // if (CheckInCheckOut::whereNotNull('checkin_time')->exists()) {
        //     return back()->with('fail', 'you have already checkIn today');
        // }

        $message = "";
        $checkInCheckOut_data = CheckInCheckOut::firstOrCreate([
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
}
