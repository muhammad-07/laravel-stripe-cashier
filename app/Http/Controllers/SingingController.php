<?php

namespace App\Http\Controllers;

use App\Models\Singing;
use Illuminate\Http\Request;

class SingingController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'why_saregamapa_expectations' => 'nullable|string|max:255',
            'why_we_select_you' => 'nullable|string|max:255',
            'future_plan_if_win' => 'nullable|string|max:255',
            'opinion_new_season_saregamapa' => 'nullable|string|max:255',
            'written_composed_song_inspiration' => 'nullable|string|max:255',
            'life_changing_incident' => 'nullable|string|max:255',
            'change_about_self_love_about_self' => 'nullable|string|max:255',
            'unique_qualities' => 'nullable|string|max:255',
            'main_goal_difficulties' => 'nullable|string|max:255',
            'biggest_strength_support' => 'nullable|string|max:255',
            'favorite_judge_why' => 'nullable|string|max:255',
            'role_model_inspiration' => 'nullable|string|max:255',
            'prepared_songs' => 'nullable|string|max:255',
        ]);

        // Create or update user details
        Singing::updateOrCreate(
            ['user_id' => auth()->id()], // Assuming user_id is associated with the user details
            $validatedData
        );

        return redirect()->back()->with('success', 'User details saved successfully!');
    }
}
