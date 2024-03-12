<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VideoController extends Controller
{
    public function upload(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'videoFile' => 'required|mimetypes:image/*|max:204800', // Max size in kilobytes (200MB)
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = auth()->user();

        if ($request->hasFile('videoFile')) {
            $videoFile = $request->file('videoFile');

            // Generate a unique name for the video file
            $fileName = uniqid() . '.' . $videoFile->getClientOriginalExtension();
            $oname = $videoFile->getClientOriginalName();
            // Save the video file to the storage disk
            $plan =  session()->get('plan') ?? $request->plan;
            $path = $videoFile->storeAs('videos/'.$plan, $fileName, 'public');

            // Create a new Video model instance
            $video = new Video();
            $video->user_id = $user->id;
            $video->file_path = $path;
            $video->original_name = $oname;
            $video->title = $request->title;
            $video->original_name = $request->description;
            $video->save();

            return redirect('/thank-you')->with('success', 'Video uploaded successfully.');
        }

        return redirect()->back()->withErrors(['message' => 'No video file found.'])->withInput();
    }
    
    // Admin
    public function updateState(Request $request, Video $video)
    {
        $validatedData = $request->validate([
            'state' => 'required|in:round-1,round-2,rejected',
        ]);

        $video->state = $validatedData['state'];
        $video->save();

        return redirect()->back()->with('success', 'Video state updated successfully.');
    }
}
