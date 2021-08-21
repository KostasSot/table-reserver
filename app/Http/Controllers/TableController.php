<?php

namespace App\Http\Controllers;

use App\Table;
use Illuminate\Http\Request;

class TableController extends Controller
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

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'seats' => 'required',
        ]);

        Table::create($request->all());

        return redirect()->route('adminDashboard')
            ->with('success','Table created successfully.');
    }

    public function destroy(Table $table)
    {
        $table->delete();

        return redirect()->route('adminDashboard')
            ->with('success','Table deleted successfully');
    }
}
