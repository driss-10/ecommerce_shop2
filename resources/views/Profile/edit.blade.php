@extends('layouts.app')

@section('title', 'Profile')

@section('content')

<div class="container rounded bg-white mt-5 mb-5">
    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-3 ">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                    <span class="font-weight-bold">{{ $user->name }} {{ $user->lastname }}</span>
                    <span class="text-black-50">{{ $user->email }}</span>
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
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Last Name</label>
                            <input type="text" class="form-control" name="lastname" value="{{ $user->lastname }}" placeholder="Last Name">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="labels">Mobile Number</label>
                            <input type="text" class="form-control" name="phone" placeholder="Enter Phone Number" value="{{ $user->phone }}">
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Address</label>
                            <input type="text" class="form-control" name="address" placeholder="Enter Address" value="{{ $user->address }}">
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Postcode</label>
                            <input type="text" class="form-control" name="codepostal" placeholder="Enter Postcode" value="{{ $user->codepostal }}">
                        </div>
                        <div class="col-md-12">
                            <label class="labels">City</label>
                            <input type="text" class="form-control" name="city" placeholder="Enter City" value="{{ $user->city }}">
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Email</label>
                            <input type="text" class="form-control" name="email" placeholder="Enter Email ID" value="{{ $user->email }}">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label class="labels">Country</label>
                            <input type="text" class="form-control" name="country" placeholder="Country" value="{{ $user->country }}">
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Update') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>





@endsection