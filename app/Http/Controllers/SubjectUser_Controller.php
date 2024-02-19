<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Subject;
use App\Models\SubjectUser;


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
                $user->subjects()->attach($subject, ['user_mark' => "0"]);
            }
        }
        $user = User::find($request->user_ids);
        $subject = Subject::find($request->subject_id);

        return [$user, $subject];
        // return $subject->users;
        // return redirect()->back()->with('success', 'Users added to the subject successfully.');
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
    public function update(Request $request)
    {
        $request->validate([
            'subject_id' => 'required|',
            'user_id' => 'required|',
            'user_mark' => 'required',
        ]);

        $subjectUser = SubjectUser::where('subject_id', $request->subject_id)
            ->where('user_id', $request->user_id)
            ->first();
        if ($subjectUser) {
            $subjectUser->update(['user_mark' => $request->user_mark]);
        }

        // return 'تم تحديث العلامة بنجاح.';
        return $subjectUser;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($subject_id, $user_id)
    {
        $subjectUser = SubjectUser::where('subject_id', $subject_id)->where('user_id', $user_id)->first();

        // Check if the record exists
        if ($subjectUser) {
            // Delete the record from the pivot table
            $subjectUser->delete();

            return redirect()->back()->with('success', 'User successfully removed from the subject.');
        } else {
            return redirect()->back()->with('error', 'Error in the data.');
        }
    }

}
