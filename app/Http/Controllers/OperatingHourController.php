<?php

namespace App\Http\Controllers;

use App\OperatingHour;
use App\Table;
use Illuminate\Http\Request;

class OperatingHourController extends Controller
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

    public function update(Request $request, $id)
    {
        $request->validate([
            'starting_hour' => 'required',
            'closing_hour' => 'required'
        ]);


        $operatingHour = OperatingHour::find($id);

        $operatingHour->starting_hour = $request->get('starting_hour');
        $operatingHour->closing_hour = $request->get('closing_hour');
        $operatingHour->open = $request->get('open') ? true : false;


        $operatingHour->update();

        return redirect()->route('adminDashboard')
            ->with('success','Hours updated.');
    }

    public function destroy(Table $table)
    {
        $table->delete();

        return redirect()->route('adminDashboard')
            ->with('success','Table deleted successfully');
    }
}
