@extends('layouts.app-new')

@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Videos /</span><?php echo date('Y') ?></h4>
<hr class="my-5" />

<!-- Bootstrap Table with Header - Light -->
<div class="card">
    <h5 class="card-header">Show Videos</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead class="table-light">
                <tr>
                    <th>Video</th>
                    <th>Status</th>
                    <th>Uploaded by</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @forelse ($videos as $video)
                <tr>
                    <td><a href="{{ route('admin.videos.show', $video) }}">{{ $video->original_name }}</a></td>
                    <td>{{ $video->state }}</td>
                    <td>{{ $video->user->name }}</td>
                    <td>
                        <a href="{{ route('admin.videos.show', $video) }}" class="btn btn-primary">View</a>
                    </td>
                    <!--<td>
                         <form action="{{ route('admin.videos.updateStatus', $video) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="btn-group" role="group" aria-label="Video Status">
                                    <button type="submit" class="btn btn-outline-secondary" name="status" value="round-1">Move to Round 1</button>
                                    <button type="submit" class="btn btn-outline-secondary" name="status" value="round-2">Move to Round 2</button>
                                    <button type="submit" class="btn btn-outline-danger" name="status" value="rejected">Reject</button>
                                </div>
                            </form>
                    </td>-->
                </tr>
                @empty
                <tr>
                    <td colspan="3">No videos found.</td>
                </tr>
                @endforelse

            </tbody>
        </table>
    </div>
</div>
<!-- Bootstrap Table with Header - Light -->
@endsection
