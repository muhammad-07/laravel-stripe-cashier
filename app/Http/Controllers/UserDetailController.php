<?php

namespace App\Http\Controllers;

use App\Models\UserDetail;
use Illuminate\Http\Request;

class UserDetailController extends Controller
{
    public function index()
    {
        // Retrieve all user details
        $userDetails = UserDetail::all();

        // Pass user details to the view
        return view('details', compact('userDetails'));
    }

    public function create()
    {
        // Return the view for creating a new user detail
        return view('details');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
        ]);
        $validatedData['user_id'] = auth()->user()->id;
        // Create a new user detail with the validated data
        UserDetail::create($validatedData);

        // Redirect to the index page with success message
        return redirect()->route('upload-video')->with('success', 'User detail created successfully, Now upload your video.');
    }

    public function show(UserDetail $userDetail)
    {
        // Return the view to show a specific user detail
        return view('details.show', compact('userDetail'));
    }

    public function edit(UserDetail $userDetail)
    {
        // Return the view for editing a user detail
        return view('details.edit', compact('userDetail'));
    }

    public function update(Request $request, UserDetail $userDetail)
    {
        // Validate the request data
        $validatedData = $request->validate([
            // Add validation rules for each field here
            'first_name' => 'required|string|max:255',
            // Add validation rules for other fields here
        ]);

        // Update the user detail with the validated data
        $userDetail->update($validatedData);

        // Redirect to the index page with success message
        return redirect()->route('user-details')->with('success', 'User detail updated successfully.');
    }

    public function destroy(UserDetail $userDetail)
    {
        // Delete the user detail
        $userDetail->delete();

        // Redirect to the index page with success message
        return redirect()->route('user-details')->with('success', 'User detail deleted successfully.');
    }
}
