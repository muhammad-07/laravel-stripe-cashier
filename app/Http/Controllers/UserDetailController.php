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

            'auditioncity' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            // 'last_name' => 'required|string|max:255',
            // 'stagename' => 'nullable|string|max:255',
            // 'sex' => 'required|in:male,female,other',
            // 'relationship_status' => 'required|in:single,married',
            // 'dob' => 'required|date',
            // 'address' => 'required|string|max:255',
            // 'city' => 'required|string|max:255',
            // 'state' => 'required|string|max:255',
            // 'postalcode' => 'required|string|max:20',
            // 'phone' => 'required|string|max:20',
            // 'education' => 'nullable|string',
            // 'occupation' => 'nullable|string',
            // 'work_experience' => 'nullable|string',
            // 'genre_of_singing' => 'nullable|string',
            // 'previous_performance' => 'nullable|string',
            // 'music_experience' => 'nullable|string',
            // 'music_qualification' => 'nullable|string',
            // 'hobbies' => 'nullable|string',
            // 'describe_yourself' => 'nullable|string',
            // 'instagram' => 'nullable|url',
            // 'youtube' => 'nullable|url',
            // 'facebook' => 'nullable|url',

            // 'g-firstname' => 'required|string|max:255',
            // 'g-lastname' => 'required|string|max:255',
            // 'g-address' => 'required|string|max:255',
            // 'g-city' => 'required|string|max:255',
            // 'g-state' => 'required|string|max:255',
            // 'g-postalcode' => 'required|string|max:20',
            // 'g-phone' => 'required|string|max:20',
            // 'g-email' => 'required|email|max:255',

            // 'how_know_about_auditions' => 'nullable|string',
            // 'how_know_about_auditions_detail' => 'nullable|string',
            // 'photo' => 'nullable|image|max:11264|mimes:jpeg,png,jpg,gif,svg',
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
