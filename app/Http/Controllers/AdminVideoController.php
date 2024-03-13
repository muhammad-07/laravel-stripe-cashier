<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class AdminVideoController extends Controller
{
    public function index()
    {
        $videos = Video::with('user')->get();
        return view('admin.videos', compact('videos'));
    }
    public function show(Video $video)
{
    return view('admin.show', compact('video'));
}

    public function updateStatus(Request $request, Video $video)
    {
        $request->validate([
            'status' => 'required|in:pending,round-1,round-2,rejected',
        ]);
        $video->state = $request->status;
        $video->save();

        return redirect()->back()->with('success', 'Video status updated successfully.');
    }
}
