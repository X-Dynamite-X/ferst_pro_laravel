<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\User;

class Subject_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $subjects = Subject::all();
        $users = User::all();

        return view('user_subject', compact('subjects', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $subject = Subject::create([
            'subject' => $request->input('subject_input'),
            'full_mark' => $request->input('mark'),
        ]);
        return ($subject);
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
    // public function edit(string $id)
    // {
    //     $subject = Subject::find($id);

    //     return view('user_subject',compact('subject'));    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {

        $subject = Subject::find($id);
        $subject->fill([
            'subject' => $request->input('editsubject'),
            'full_mark' => $request->input('editmark'),
        ])->update();
        return $subject;
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(string $id)
    {
        try {
            // Find the record to be deleted
            $subject = Subject::findOrFail($id);

            // Delete the record
            $subject->delete();

            // Return a success message
            return response()->json(['message' => 'Record deleted successfully.'], 200);
        } catch (\Exception $e) {
            // Return an error message in case of failure to delete the record
            return response()->json(['message' => 'An error occurred while trying to delete the record.'], 500);
        }
    }
}
