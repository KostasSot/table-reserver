<?php

namespace App\Http\Controllers;

use App\OperatingHour;
use App\Reservation;
use App\Table;

class UserController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();

        $reservations = Reservation::with('user')->with('table')->where('user_id', $user->id)->get();

        $tables = Table::all();

        $operatingHours = OperatingHour::all();

        return view('partial.userDashboard', ['user' => $user, 'reservations' => $reservations, 'tables' => $tables]);
    }

    public function getUsers()
    {
        $user = auth()->user();

        return $user;
    }
}
