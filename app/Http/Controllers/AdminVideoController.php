<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class AdminVideoController extends Controller
{
    public function index()
    {
        $videos = Video::all();
        return view('admin.videos.index', compact('videos'));
    }

    public function updateStatus(Request $request, Video $video)
    {
        $request->validate([
            'status' => 'required|in:round-1,round-2,rejected',
        ]);

        $video->status = $request->status;
        $video->save();

        return redirect()->back()->with('success', 'Video status updated successfully.');
    }
}
