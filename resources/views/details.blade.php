@extends('layouts.auth')

@section('content')
@include('partials.steps', ['active' => 'details'])
<h4 class="mb-2">Adventure starts here 🚀</h4>
<p class="mb-4">Just one step away!</p>

<form method="POST" action="{{ isset($userDetail) ? route('user-details.update', $userDetail->id) : route('user-details.store') }}">
    @csrf
    @if(isset($userDetail))
    @method('PUT')
    @endif



    <div class="form-floating form-floating-outline mb-3">
        <input type="text" class="form-control" id="auditioncity" name="auditioncity" value="{{ old('auditioncity', isset($userDetail) ? $userDetail->auditioncity : '') }}" placeholder="Enter your audition city">
        <label for="auditioncity">Audition City</label>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-floating form-floating-outline mb-3">
                <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name', isset($userDetail) ? $userDetail->first_name : '') }}" placeholder="Enter your first name">
                <label for="first_name">First Name</label>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-floating form-floating-outline mb-3">
                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name', isset($userDetail) ? $userDetail->last_name : '') }}" placeholder="Enter your last name">
                <label for="last_name">Last Name</label>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-floating form-floating-outline mb-3">
                <input type="text" class="form-control" id="stagename" name="stagename" value="{{ old('stagename', isset($userDetail) ? $userDetail->stagename : '') }}" placeholder="Enter your stage name">
                <label for="stagename">Stage Name</label>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="form-floating form-floating-outline mb-3">
                <select class="form-select" id="sex" name="sex">
                    <option value="male" {{ old('sex', isset($userDetail) ? $userDetail->sex : '') == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ old('sex', isset($userDetail) ? $userDetail->sex : '') == 'female' ? 'selected' : '' }}>Female</option>
                    <option value="other" {{ old('sex', isset($userDetail) ? $userDetail->sex : '') == 'other' ? 'selected' : '' }}>Other</option>
                </select>
                <label for="sex">Sex</label>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-floating form-floating-outline mb-3">
                <select class="form-select" id="relationship_status" name="relationship_status">
                    <option value="single" {{ old('relationship_status', isset($userDetail) ? $userDetail->relationship_status : '') == 'single' ? 'selected' : '' }}>Single</option>
                    <option value="married" {{ old('relationship_status', isset($userDetail) ? $userDetail->relationship_status : '') == 'married' ? 'selected' : '' }}>Married</option>
                </select>
                <label for="relationship_status">Relationship Status</label>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-floating form-floating-outline mb-3">
                <input type="date" class="form-control" id="dob" name="dob" value="{{ old('dob', isset($userDetail) ? $userDetail->dob : '') }}">
                <label for="dob">Date of Birth</label>
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-md-4">
            <div class="form-floating form-floating-outline mb-3">
                <input type="text" class="form-control" id="city" name="city" value="{{ old('city', isset($userDetail) ? $userDetail->city : '') }}" placeholder="Enter your city">
                <label for="city">City</label>
            </div>
        </div>


        <div class="col-md-4">
            <div class="form-floating form-floating-outline mb-3">
                <input type="text" class="form-control" id="state" name="state" value="{{ old('state', isset($userDetail) ? $userDetail->state : '') }}" placeholder="Enter your state">
                <label for="state">State</label>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-floating form-floating-outline mb-3">
                <input type="text" class="form-control" id="postalcode" name="postalcode" value="{{ old('postalcode', isset($userDetail) ? $userDetail->postalcode : '') }}" placeholder="Enter your postal code">
                <label for="postalcode">Postal Code</label>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="form-floating form-floating-outline mb-3">
                <input type="tel" class="form-control" id="phone" name="phone" value="{{ old('phone', isset($userDetail) ? $userDetail->phone : '') }}" placeholder="Enter your phone number">
                <label for="phone">Phone</label>
            </div>
        </div>
        <div class="col-md-8">
            <div class="form-floating form-floating-outline mb-3">
                <input type="text" class="form-control" id="address" name="address" value="{{ old('address', isset($userDetail) ? $userDetail->address : '') }}" placeholder="Enter your address">
                <label for="address">Address</label>
            </div>
        </div>
    </div>

    <div class="form-floating form-floating-outline mb-3">
        <input type="url" class="form-control" id="instagram" name="instagram" value="{{ old('instagram', isset($userDetail) ? $userDetail->instagram : '') }}" placeholder="Enter your Instagram link">
        <label for="instagram">Instagram Link</label>
    </div>

    <div class="form-floating form-floating-outline mb-3">
        <input type="url" class="form-control" id="youtube" name="youtube" value="{{ old('youtube', isset($userDetail) ? $userDetail->youtube : '') }}" placeholder="Enter your YouTube link">
        <label for="youtube">YouTube Link</label>
    </div>

    <div class="form-floating form-floating-outline mb-3">
        <input type="url" class="form-control" id="facebook" name="facebook" value="{{ old('facebook', isset($userDetail) ? $userDetail->facebook : '') }}" placeholder="Enter your Facebook link">
        <label for="facebook">Facebook Link</label>
    </div>

    <!-- Guardian Information -->
    <div class="form-floating form-floating-outline mb-3">
        <input type="text" class="form-control" id="g-firstname" name="g-firstname" value="{{ old('g-firstname', isset($userDetail) ? $userDetail->g_firstname : '') }}" placeholder="Enter guardian's first name">
        <label for="g-firstname">Guardian's First Name</label>
    </div>

    <div class="form-floating form-floating-outline mb-3">
        <input type="text" class="form-control" id="g-lastname" name="g-lastname" value="{{ old('g-lastname', isset($userDetail) ? $userDetail->g_lastname : '') }}" placeholder="Enter guardian's last name">
        <label for="g-lastname">Guardian's Last Name</label>
    </div>

    <div class="form-floating form-floating-outline mb-3">
        <input type="text" class="form-control" id="g-address" name="g-address" value="{{ old('g-address', isset($userDetail) ? $userDetail->g_address : '') }}" placeholder="Enter guardian's address">
        <label for="g-address">Guardian's Address</label>
    </div>

    <div class="form-floating form-floating-outline mb-3">
        <input type="text" class="form-control" id="g-city" name="g-city" value="{{ old('g-city', isset($userDetail) ? $userDetail->g_city : '') }}" placeholder="Enter guardian's city">
        <label for="g-city">Guardian's City</label>
    </div>

    <div class="form-floating form-floating-outline mb-3">
        <input type="text" class="form-control" id="g-state" name="g-state" value="{{ old('g-state', isset($userDetail) ? $userDetail->g_state : '') }}" placeholder="Enter guardian's state">
        <label for="g-state">Guardian's State</label>
    </div>

    <div class="form-floating form-floating-outline mb-3">
        <input type="text" class="form-control" id="g-postalcode" name="g-postalcode" value="{{ old('g-postalcode', isset($userDetail) ? $userDetail->g_postalcode : '') }}" placeholder="Enter guardian's postal code">
        <label for="g-postalcode">Guardian's Postal Code</label>
    </div>

    <div class="form-floating form-floating-outline mb-3">
        <input type="tel" class="form-control" id="g-phone" name="g-phone" value="{{ old('g-phone', isset($userDetail) ? $userDetail->g_phone : '') }}" placeholder="Enter guardian's phone number">
        <label for="g-phone">Guardian's Phone</label>
    </div>

    <div class="form-floating form-floating-outline mb-3">
        <input type="email" class="form-control" id="g-email" name="g-email" value="{{ old('g-email', isset($userDetail) ? $userDetail->g_email : '') }}" placeholder="Enter guardian's email">
        <label for="g-email">Guardian's Email</label>
    </div>

    <div class="form-floating form-floating-outline mb-3">
        <textarea class="form-control" id="education" name="education" rows="3">{{ old('education', isset($userDetail) ? $userDetail->education : '') }}</textarea>
        <label for="education">Education</label>
    </div>

    <div class="form-floating form-floating-outline mb-3">
        <textarea class="form-control" id="occupation" name="occupation" rows="3">{{ old('occupation', isset($userDetail) ? $userDetail->occupation : '') }}</textarea>
        <label for="occupation">Occupation</label>
    </div>

    <div class="form-floating form-floating-outline mb-3">
        <textarea class="form-control" id="work_experience" name="work_experience" rows="3">{{ old('work_experience', isset($userDetail) ? $userDetail->work_experience : '') }}</textarea>
        <label for="work_experience">Work Experience</label>
    </div>

    <div class="form-floating form-floating-outline mb-3">
        <textarea class="form-control" id="genre_of_singing" name="genre_of_singing" rows="3">{{ old('genre_of_singing', isset($userDetail) ? $userDetail->genre_of_singing : '') }}</textarea>
        <label for="genre_of_singing">Genre of Singing</label>
    </div>

    <div class="form-floating form-floating-outline mb-3">
        <textarea class="form-control" id="previous_performance" name="previous_performance" rows="3">{{ old('previous_performance', isset($userDetail) ? $userDetail->previous_performance : '') }}</textarea>
        <label for="previous_performance">Previous Performance</label>
    </div>

    <div class="form-floating form-floating-outline mb-3">
        <textarea class="form-control" id="music_experience" name="music_experience" rows="3">{{ old('music_experience', isset($userDetail) ? $userDetail->music_experience : '') }}</textarea>
        <label for="music_experience">Music Experience</label>
    </div>

    <div class="form-floating form-floating-outline mb-3">
        <textarea class="form-control" id="music_qualification" name="music_qualification" rows="3">{{ old('music_qualification', isset($userDetail) ? $userDetail->music_qualification : '') }}</textarea>
        <label for="music_qualification">Music Qualification</label>
    </div>

    <div class="form-floating form-floating-outline mb-3">
        <textarea class="form-control" id="hobbies" name="hobbies" rows="3">{{ old('hobbies', isset($userDetail) ? $userDetail->hobbies : '') }}</textarea>
        <label for="hobbies">Hobbies</label>
    </div>

    <div class="form-floating form-floating-outline mb-3">
        <textarea class="form-control" id="describe_yourself" name="describe_yourself" rows="3">{{ old('describe_yourself', isset($userDetail) ? $userDetail->describe_yourself : '') }}</textarea>
        <label for="describe_yourself">Describe Yourself</label>
    </div>

    <div class="form-floating form-floating-outline mb-3">
        <textarea class="form-control" id="how_know_about_auditions" name="how_know_about_auditions" rows="3">{{ old('how_know_about_auditions', isset($userDetail) ? $userDetail->how_know_about_auditions : '') }}</textarea>
        <label for="how_know_about_auditions">How did you know about auditions?</label>
    </div>

    <div class="form-floating form-floating-outline mb-3">
        <textarea class="form-control" id="how_know_about_auditions_detail" name="how_know_about_auditions_detail" rows="3">{{ old('how_know_about_auditions_detail', isset($userDetail) ? $userDetail->how_know_about_auditions_detail : '') }}</textarea>
        <label for="how_know_about_auditions_detail">Please provide details</label>
    </div>

    <div class="form-floating form-floating-outline mb-3">
        <input type="file" class="form-control" id="photo" name="photo">
        <label for="photo">Photo</label>
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
    <button class="btn btn-primary d-grid w-100">Next: Upload Video</button>

    <!-- Add other fields here -->

    <!-- <button type="submit" class="btn btn-primary">{{ isset($userDetail) ? 'Update' : 'Create' }}</button> -->
</form>


@endsection
