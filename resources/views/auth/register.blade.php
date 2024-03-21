@extends('layouts.auth', ['form_title' => 'Adventure starts here 🚀', 'form_description' => 'You can do it!', 'width' => 'col-6'])

@section('content')
@php
    $proviences = [
    'Alabama','Alaska','Arizona','Arkansas','California','Colorado','Connecticut','Delaware','Florida','Georgia','Hawaii','Idaho','Illinois','Indiana','Iowa','Kansas','Kentucky','Louisiana','Maine','Maryland','Massachusetts','Michigan','Minnesota','Mississippi','Missouri','Montana','Nebraska','Nevada','New Hampshire','New Jersey','New Mexico','New York','North Carolina','North Dakota','Ohio','Oklahoma','Oregon','Pennsylvania','Rhode Island','South Carolina','South Dakota','Tennessee','Texas','Utah','Vermont','Virginia','Washington','West Virginia','Wisconsin','Wyoming'];

    $how_know = [
    'TV ads',
    'Social Media',
    'Newspaper ads',
    'Outdoor ads',
    'Others'
    ];
    @endphp
<form id="formAuthentication" class="mb-3" action="{{ route('register') }}">
    <div class="row">
        <div class="col-md-4">
            <div class="form-floating form-floating-outline mb-3">
                @csrf
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter your email" value="{{ old('email') }}" autofocus />
                <label for="email">Email</label>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3 form-password-toggle">
                <div class="input-group input-group-merge">
                    <div class="form-floating form-floating-outline">
                        <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                        <label for="password">Password</label>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <span class="input-group-text cursor-pointer"><i class="mdi mdi-eye-off-outline"></i></span>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-floating form-floating-outline mb-3">
                <input type="password" id="password-confirm" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                <label for="password-confirm">{{ __('Confirm Password') }}</label>
            </div>
        </div>
    </div>
<hr>
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
                <select class="form-select" id="state" name="state">
                    <option value="" selected disabled>Select state</option>
                    @foreach($proviences as $provience)
                    <option value="{{$provience}}" {{ old('state', isset($userDetail) ? $userDetail->state : '') == $provience ? 'selected' : '' }}>{{$provience}}</option>
                    @endforeach
                </select>
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

    <div class="row">
        <div class="col-md-4">
            <div class="form-floating form-floating-outline mb-3">
                <input type="url" class="form-control" id="instagram" name="instagram" value="{{ old('instagram', isset($userDetail) ? $userDetail->instagram : '') }}" placeholder="Enter your Instagram link">
                <label for="instagram">Instagram Link</label>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-floating form-floating-outline mb-3">
                <input type="url" class="form-control" id="youtube" name="youtube" value="{{ old('youtube', isset($userDetail) ? $userDetail->youtube : '') }}" placeholder="Enter your YouTube link">
                <label for="youtube">YouTube Link</label>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-floating form-floating-outline mb-3">
                <input type="url" class="form-control" id="facebook" name="facebook" value="{{ old('facebook', isset($userDetail) ? $userDetail->facebook : '') }}" placeholder="Enter your Facebook link">
                <label for="facebook">Facebook Link</label>
            </div>
        </div>

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
    <button class="btn btn-primary d-grid w-100">{{ __('Register') }}</button>
</form>

<p class="text-center">
    <span>Already have an account?</span>
    <a href="{{route('login')}}">
        <span>Sign in instead</span>
    </a>
</p>
@endsection
