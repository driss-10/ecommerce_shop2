@extends('layouts.app')

@section('title', 'Profile')

@section('content')

<div class="container rounded bg-white mt-5 mb-5">
    <form method="POST" action="{{ route('profile.edit') }}">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-3 ">
                <div class="mt-5 text-center">
                    <a href="{{ route('profile.edit') }}">Modifier le profil</a>
                </div>
                <div class="mt-5 text-center">
                    <a href="{{ route('profile.edit') }}">Modifier Password </a>
                </div>
            </div>
            <div class="col-md-5 ">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile</h4>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="labels">Name</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" disabled value="{{ $user->name }}" required autocomplete="name" autofocus>
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Last Name</label>
                            <input type="text" class="form-control" name="lastname" value="{{ $user->lastname }}"disabled placeholder="Last Name">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="labels">Mobile Number</label>
                            <input type="text" class="form-control" name="phone" placeholder="Enter Phone Number" disabled value="{{ $user->phone }}">
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Address</label>
                            <input type="text" class="form-control" name="address" placeholder="Enter Address" disabled value="{{ $user->address }}">
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Postcode</label>
                            <input type="text" class="form-control" name="codepostal" placeholder="Enter Postcode"disabled value="{{ $user->codepostal }}">
                        </div>
                        <div class="col-md-12">
                            <label class="labels">City</label>
                            <input type="text" class="form-control" name="city" placeholder="Enter City"disabled value="{{ $user->city }}">
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Email</label>
                            <input type="text" class="form-control" name="email" placeholder="Enter Email ID" disabled value="{{ $user->email }}">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label class="labels">Country</label>
                            <input type="text" class="form-control" name="country" placeholder="Country" disabled value="{{ $user->country }}">
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </form>
</div>





@endsection