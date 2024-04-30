@extends('layouts.app')

@section('title', 'Profile')

@section('content')

<div class="container rounded bg-white mt-5 mb-5">
  <form method="POST" action="{{ route('profile.update', ['user' => $user->id]) }}"> 
        @csrf
        @method('PUT')
            <div class="row">
                <div class="col-md-3 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold">{{ $user->name }}{{ $user->lastname }}</span><span class="text-black-50">{{ $user->email }}</span><span> </span></div>
                </div>
                <div class="col-md-5 border-right">
                        
                            <div class="p-3 py-5">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="text-right">Profile</h4>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6"><label class="labels">Name</label><input type="text" class="form-control" placeholder="first name" value="{{ $user->name }}" required autocomplete="name" autofocus></div>
                                    <div class="col-md-6"><label class="labels">lastName</label><input type="text" class="form-control" value="{{ $user->lastname }}" placeholder="lastName"></div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text" class="form-control" placeholder="enter phone number" value="{{ $user->phone }}"> </div>
                                    <div class="col-md-12"><label class="labels">Address</label><input type="text" class="form-control" placeholder="enter address " value="{{ $user->address }}"></div>
                                    
                                    <div class="col-md-12"><label class="labels">Postcode</label><input type="text" class="form-control" placeholder="enter Postcode " value="{{ $user->codepostal }}"></div>
                                    <div class="col-md-12"><label class="labels">City</label><input type="text" class="form-control" placeholder="enter City " value="{{ $user->city }}"></div>
                                    <div class="col-md-12"><label class="labels">Email </label><input type="text" class="form-control" placeholder="enter email id" value="{{ $user->email }}"></div>
                                
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6"><label class="labels">Country</label><input type="text" class="form-control" placeholder="country" value="{{ $user->country }}"></div>
                                    
                                </div>
                                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Update</button></div>
                            </div>
                 </div>
       
</div>
</div>

</div>

@endsection