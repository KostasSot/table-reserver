<?php

namespace App\Http\Controllers;

use App\OperatingHour;
use App\Reservation;
use DateTime;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getReservations(Request $request)
    {
        $day = strtoupper(date('l', strtotime($request->get('date'))));

        $operatingHour = OperatingHour::where('day', '=', $day)->firstOrFail();

        if ($operatingHour->open) {
            $startingHour = $operatingHour->starting_hour;
            $closingHour = $operatingHour->closing_hour;

            return $this->getAvailableHours($startingHour, $closingHour, $request->get('date'), $request->get('table'));
        }

        return null;
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'time' => 'required',
        ]);


        Reservation::create($request->all());

        $user = auth()->user();

        if ($user->role === 'admin') {
            return redirect()->route('adminDashboard')
                ->with('success','Reservation created successfully.');
        }

        return redirect()->route('userDashboard')
            ->with('success','Reservation created successfully.');
    }

    private function getAvailableHours($start, $close, $date, $table)
    {
        $availableHours = [];

        $reservations = Reservation::where('date', '=', $date)->where('table_id', $table)->get();

        for ($i = $start; $i < $close-1; $i++) {
            $availableHours[] = $i.'.00';
            $availableHours[] = $i.'.30';
        }

        foreach ($reservations as $reservation) {
            if (($key = array_search($reservation->time, $availableHours)) !== false) {

                // I also remove the 1.30 hour before and after the reservation

                unset($availableHours[$key-2]);
                unset($availableHours[$key-1]);
                unset($availableHours[$key]);
                unset($availableHours[$key+1]);
                unset($availableHours[$key+2]);
            }
        }

        return $availableHours;
    }
}
