<?php

namespace App\Http\Controllers;

use App\Models\StudentContact;
use Illuminate\Http\Request;

class StudentContactController extends Controller
{
     /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $studentContacts = StudentContact::all();

        return view('pages.contact.index', compact('studentContacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.studentContacts.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

// dd('here');
        $studentContact = new StudentContact();
        $studentContact->name = $request->name;
        $studentContact->email = $request->email;
        $studentContact->phone = $request->phone;
        $studentContact->message = $request->message;
        $studentContact->status = 'pending';
        $studentContact->save();

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
        $studentContact = studentContact::find($id);

        return view('pages.contact.edit', compact('studentContact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $studentContact = studentContact::find($id);
        $studentContact->status = $request->status;
        $studentContact->save();


        return redirect()->route('studentContact.index')->with('student Contact Updated SuccessFully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $studentContact = studentContact::find($id);

        if ($studentContact) {
            $studentContact->delete();
        }

        return redirect()->route('studentContact.index')->with('student Admission Request Deleted SuccessFully');
    }
}
