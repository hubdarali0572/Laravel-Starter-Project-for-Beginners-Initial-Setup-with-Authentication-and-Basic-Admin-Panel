<?php

namespace App\Http\Controllers;

use App\Models\StudentAdmission;
use App\Models\StudentContact;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $userTotal = User::count();
        $admissionRequest =StudentAdmission::count();
        $contactStudent= StudentContact::count(); 
    
       return view('dashboard',compact('userTotal','admissionRequest','contactStudent'));
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

  
public function activitylog()
{
    // Fetch logs, eager load the causer (the person who did the action)
    $logs = Activity::with('causer')->latest()->paginate(20);

    return view('activitylog', compact('logs'));
}   
}
