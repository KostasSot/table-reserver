<?php

namespace App\Http\Controllers;

use App\OperatingHour;
use App\Reservation;
use App\Table;
use App\User;
use http\Client;

class AdminController extends Controller
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

        $tables = Table::all();

        $operatingHours = OperatingHour::all();

        $clients = User::where('role', 'user')->get();

        $reservations = Reservation::with('user')->with('table')->get();

        return view('partial.adminDashboard', ['user' => $user, 'tables' => $tables, 'operatingHours' => $operatingHours, 'clients' => $clients, 'reservations' => $reservations]);
    }
}
