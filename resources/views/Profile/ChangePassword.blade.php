@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<div class="container rounded bg-white mt-5 mb-5">
    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">ChangePassword</h4>
                </div>
                <div class="row mt-2">
                    <div class="form-group row mt-2">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Nouveau mot de passe') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mt-2">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmer le mot de passe') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                        </div>
                    </div>
                </div>
        </div>
    </form>
</div>


@endsection