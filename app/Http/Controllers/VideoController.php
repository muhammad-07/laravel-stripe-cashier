<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VideoController extends Controller
{
    public function upload(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'videoTitle' => 'required',
            'videoFile' => 'required|mimetypes:video/*|max:512000',
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

            $plan = Payment::where('user_id', $user->id)->where('stripe_payment_id', '!=', '')->first()->plan ?? "";
            // Save the video file to the storage disk
            // $plan =  session()->get('plan') ?? $request->plan;
            $path = $videoFile->storeAs('videos/'.$plan, $fileName, 'public');

            // Create a new Video model instance
            $video = new Video();
            $video->user_id = $user->id;
            $video->file_path = $path;
            $video->original_name = $oname;
            $video->title = $request->videoTitle;
            $video->description = $request->videoDescription;
            $video->save();

            return redirect('/thank-you')->with('success', 'Video uploaded successfully.');
        }

        return redirect()->back()->withErrors(['message' => 'No video file found.'])->withInput();
    }

    
}
