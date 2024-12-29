<?php

namespace App\Http\Controllers;

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
        if (CheckInCheckOut::whereNotNull('checkin_time')->exists()) {
            return back()->with('fail', 'you have already checkIn today');
        }
        CheckInCheckOut::create([
            'user_id' => $user->id,
            'checkin_time' => Carbon::now(),
        ]);

        return to_route('checkin.index')->with('success', 'check in success!');
    }
}
