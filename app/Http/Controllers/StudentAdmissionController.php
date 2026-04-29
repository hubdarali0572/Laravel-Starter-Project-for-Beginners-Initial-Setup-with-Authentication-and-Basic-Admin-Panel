<?php

namespace App\Http\Controllers;

use App\Models\StudentAdmission;
use Illuminate\Http\Request;

class StudentAdmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $studentAdmissions = StudentAdmission::all();

        return view('pages.admission.index', compact('studentAdmissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.studentAdmissions.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $studentAdmission = new StudentAdmission();
        $studentAdmission->name = $request->name;
        $studentAdmission->email = $request->email;
        $studentAdmission->phone = $request->phone;
        $studentAdmission->gender = $request->gender;
        $studentAdmission->program = $request->program;
        $studentAdmission->notes = $request->notes;
        $studentAdmission->status = 'pending';
        $studentAdmission->save();

        return redirect()->back()->with('success', 'Your Admission Request Sent To Anzway Management successfully!');
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
        $studentAdmission = StudentAdmission::find($id);

        return view('pages.admission.edit', compact('studentAdmission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $studentAdmission = StudentAdmission::find($id);
        $studentAdmission->status = $request->status;
        $studentAdmission->save();


        return redirect()->route('studentAdmission.index')->with('studentAdmission Updated SuccessFully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $studentAdmission = StudentAdmission::find($id);

        if ($studentAdmission) {
            $studentAdmission->delete();
        }

        return redirect()->route('studentAdmission.index')->with('student Admission Request Deleted SuccessFully');
    }
}
