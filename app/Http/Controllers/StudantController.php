<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Subject;
use App\Models\SubjectUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class StudantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $subjects_users = SubjectUser::all()->where('user_id', $user->id);
        $number_of_subjects = $subjects_users->count();

        return  view('studant_page', compact('user', 'subjects_users', "number_of_subjects"));
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

        $user = User::find($id);
        return view("profile.user_profile", ['user' => $user]);
        //
    }

    /**
     * Show the form for editing the specified resource.
     */


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $request->validate([
            'image' => 'image|mimes:png,jpg,jpeg,gif,svg|max:2048'
        ]);
        if ($request->hasFile('image')) {
            $image_name = time() . '.' . $request->image->extension();
            $request->image->move(public_path('user_profile/image'), $image_name);
            $user->image = $image_name;
        }
        $user->fill([
            'name' => $request->input('e_name'),
            'email' => $request->input('e_email'),
            // 'image' => $image_name,
        ]);
        $user->save();
        return $user;
        // return redirect()->route("show_profile", [$id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
