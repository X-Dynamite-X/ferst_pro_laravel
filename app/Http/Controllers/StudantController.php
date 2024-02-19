<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Subject;
use App\Models\SubjectUser;
use Illuminate\Support\Facades\Auth;

class StudantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
    $user = Auth::user();
    $subjects_users = SubjectUser::all()->where( 'user_id', $user->id);
    $number_of_subjects = $subjects_users->count();

    return  view('studant_page', compact('user', 'subjects_users',"number_of_subjects"));
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
