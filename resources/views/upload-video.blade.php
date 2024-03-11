@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Upload Your Video</div>
                <div class="card-body">
                    <form action="/upload_video" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="videoTitle">Video Title</label>
                            <input type="text" class="form-control" id="videoTitle" name="videoTitle" required>
                        </div>
                        <div class="form-group">
                            <label for="videoDescription">Video Description</label>
                            <textarea class="form-control" id="videoDescription" name="videoDescription" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="videoFile">Choose Video File</label>
                            <input type="file" class="form-control-file" id="videoFile" name="videoFile" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Upload Video</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection