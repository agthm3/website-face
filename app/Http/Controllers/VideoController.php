<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.video.index');
    }

    public function getVideoOtot()
    {
        return view('dashboard.video.otot');
    }

    public function getVideoPencernaan()
    {
        return view('dashboard.video.pencernaan');
    }

    public function getVideoPernapasan()
    {
        return view('dashboard.video.pernapasan');
    }
    public function getVideoeksresi()
    {
        return view('dashboard.video.eksresi');
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
