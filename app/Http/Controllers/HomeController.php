<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function showUser()
    {
        $users = User::all();

        return view('user_page', compact('users'));
    }
    public function create_user(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:3|confirmed',
            'is_actev' => 'nullable|boolean',
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'is_actev'=>true,
        ]);

        return $user;
    }



    public function editUser(Request  $request, $id)
    {
        $user = User::find($id);

        $user->name = $request->input('e_name');
        $user->email = $request->input('e_email');
        $user->is_actev = (int)($request->input('e_is_actev') === 'on');

        // Save the changes to the database
        $user->save();

        // Optionally, you can return a response
        return response()->json(['message' => 'User updated successfully', 'user' => $user]);
    }
    public function destroy(string $id)
    {
        try {
            // Find the record to be deleted
            $subject = User::findOrFail($id);

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
