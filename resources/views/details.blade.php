@extends('layouts.auth')

@section('content')
<h4 class="mb-2">Adventure starts here 🚀</h4>
              <p class="mb-4">Just one step away!</p>
<form method="POST" action="{{ isset($userDetail) ? route('user-details.update', $userDetail->id) : route('user-details.store') }}">
    @csrf
    @if(isset($userDetail))
    @method('PUT')
    @endif

    <div class="form-floating form-floating-outline mb-3">
        <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name', isset($userDetail) ? $userDetail->first_name : '') }}" placeholder="Enter your first name">
        <label for="first_name">First Name</label>
    </div>

    <div class="form-floating form-floating-outline mb-3">
        <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email" />
        <label for="email">Email</label>
    </div>
    <div class="mb-3">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" />
            <label class="form-check-label" for="terms-conditions">
                I agree to
                <a href="javascript:void(0);">privacy policy & terms</a>
            </label>
        </div>
    </div>
    <button class="btn btn-primary d-grid w-100">Sign up</button>

    <!-- Add other fields here -->

    <!-- <button type="submit" class="btn btn-primary">{{ isset($userDetail) ? 'Update' : 'Create' }}</button> -->
</form>


@endsection
