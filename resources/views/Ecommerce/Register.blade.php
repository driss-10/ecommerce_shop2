@extends('layouts.app')
@section('title', 'Login')
@section('content')

<section class="p-3 p-md-4 p-xl-5">
    <div class="container">
        <div class="card border-light-subtle shadow-sm">
            <div class="row g-0">
                <div class="col-12 col-md-6">
                    <img class="img-fluid rounded-start w-100 h-100 object-fit-cover" loading="lazy" src="img/login/logo-img-1.png" alt="BootstrapBrain Logo">
                </div>
                <div class="col-12 col-md-6">
                    <div class="card-body p-3 p-md-4 p-xl-5">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-5">
                                    <h3>Create Account</h3>
                                </div>
                            </div>
                        </div>
                        <form action="{{ route('auth.store') }}" method="POST">
                            @csrf
                            <div class="row gy-3 gy-md-4 overflow-hidden">
                                <div class="col-12">
                                    <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Name" name="name" id="name" value="{{ old('name') }}" required>
                                </div>
                                <div class="col-12">
                                    <label for="lastname" class="form-label">Last Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Last Name" name="lastname" id="lastname" value="{{ old('lastname') }}" required>
                                </div>
                                <div class="col-12">
                                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" value="{{ old('email') }}" required>
                                </div>
                                <div class="col-12">
                                    <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" placeholder="********" name="password" id="password" required>
                                </div>
                                <div class="col-12">
                                    <label for="password_confirmation" class="form-label">Confirm Password <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" placeholder="********" name="password_confirmation" id="password_confirmation" required>
                                </div>
                                <div class="col-12">
                                    <label for="phone" class="form-label">Phone <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Phone" name="phone" id="phone" value="{{ old('phone') }}" required>
                                </div>
                                <div class="col-12">
                                    <label for="address" class="form-label">Address <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Address" name="address" id="address" value="{{ old('address') }}" required>
                                </div>
                                <div class="col-12">
                                    <label for="codepostal" class="form-label">Postal Code <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Postal Code" name="codepostal" id="codepostal" value="{{ old('codepostal') }}" required>
                                </div>
                                <div class="col-12">
                                    <label for="country" class="form-label">Country <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Country" name="country" id="country" value="{{ old('country') }}" required>
                                </div>
                                <div class="col-12">
                                    <label for="city" class="form-label">City <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="City" name="city" id="city" value="{{ old('city') }}" required>
                                </div>
                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" name="remember_me" id="remember_me">
                                        <label class="form-check-label text-secondary" for="remember_me">
                                            Keep me logged in
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-grid">
                                        <button class="btn bsb-btn-xl btn-primary" type="submit">Create new account</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="row">
                            <div class="col-12">
                                <hr class="mt-5 mb-4 border-secondary-subtle">
                                <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-end">
                                    <a href="{{ route('Login') }}" class="link-secondary text-decoration-none">Login ?</a>
                                    <a href="/forgot" class="link-secondary text-decoration-none">Forgot password</a>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection