<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Subject;
class SubjectUser_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $request->validate([
            'subject_id' => 'required|numeric',
            'user_ids' => 'required|array',
            'user_ids.*' => 'numeric',
        ]);

        $subject = Subject::find($request->subject_id);
        if (!$subject) {
            return redirect()->back()->with('error', 'Invalid subject ID.');
        }

        foreach ($request->user_ids as $userId) {
            $user = User::find($userId);
            if ($user) {
                $user->subjects()->attach($subject);
            }
        }

        return redirect()->back()->with('success', 'Users added to the subject successfully.');


     
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
