<?php

namespace App\Http\Controllers;

use App\Models\Iot;
use App\Models\Log;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allLog = Log::all();
        return view('dashboard.home.index', compact('allLog'));
    }

    // public function getAllRekap()
    // {
    //     $succesAbsen = Log::where('status', 'success')->get();

    //     return view('dashboard.rekap.index', compact('succesAbsen'));
    // }

    public function getAllRekap(Request $request)
{
    $filter = $request->query('filter', 'all');

    $query = Log::where('status', 'success');

    if ($filter == 'day') {
        $query->whereDate('created_at', Carbon::today());
    } elseif ($filter == 'week') {
        $query->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
    } elseif ($filter == 'month') {
        $query->whereMonth('created_at', Carbon::now()->month);
    }

    $succesAbsen = $query->get();

    return view('dashboard.rekap.index', compact('succesAbsen'));
}

    public function getAllModul()
    {
        $allModul = Iot::all();
        return view('dashboard.modul.index', compact('allModul'));
    }

    public function storeNewModul(Request $request)
    {
        $request->validate([
            'name' => 'max:255|required',
            'mac' => 'max:255|required'
        ]);

        Iot::create([
            'name' => $request->name,
            'mac' => $request->mac
        ]);

        return redirect()->route('modul.index')->with('success', 'Service baru berhasil disimpan.');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
