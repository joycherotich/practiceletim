@extends('layouts.app')

@section('content')
    @include('includes.topmenu')
    @include('includes.side_nav')

    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Account</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Account</li>
                </ol>
            </nav>

            <div class="row">
                <div class="col-xl-12 col-lg-12 col-xxl-12 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mt-1">
                            <div class="col-lg-3  col-md-4  col-sm-6 mb-2">
								<div class="media">
									<div class="media-body">
										<span class="d-block  font-14 text-muted mb-2"> Name</span>
										<p class="font-16 text-dark" id="biller_name">Liberty Insurance </p>
									</div>
								</div>
							</div>

							<div class="col-lg-3  col-md-4  col-sm-6 mb-2">
								<div class="media">

									<div class="media-body">
										<span class="d-block  font-14 text-muted mb-2">paybill</span>
										<p class="font-16 text-dark" id="biller_number">123123</p>
									</div>
								</div>
							</div> 

							<div class="col-lg-3  col-md-4  col-sm-6 mb-2">
								<div class="media">

									<div class="media-body">
										<span class="d-block  font-14 text-muted mb-2">email</span>
										<p class="font-16 text-dark"> <span id="business_location"> liberty23@gmail.com</span> </span></p>
									</div>
								</div>
							</div> 
							


							<div class="col-lg-3  col-md-4  col-sm-6 mb-2">
								<div class="media">
									<div class="media-body">
										<span class="d-block  font-14 text-muted mb-2">Phone</span>
										<p class="font-16 text-dark"> <span id="msisdn">26878345783 </span></p>
									</div>
								</div>
							</div>
			

                            </div>

                            <div class="col-xl-2 col-xxl-4 col-lg-2 col-sm-4 col-md-4">
                                <div class="media">
                                    <div class="media-body">
                                        <p class="mb-1">Account Balance</p>
                                        <p class="font-16 text-dark">
                                            <span id="msisdn">{{ $accountBalance }}</span>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="col-lg-12 mb-4">
                                <h5 class="mb-3">Change Password</h5>
                                <form method="post" action="{{ route('profile.changePassword') }}">
                                    @csrf
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label for="current_password" class="col-form-label text-right">Current Password:</label>
                                            <input type="password" name="current_password" class="form-control form-control-sm" required>
                                            @error('current_password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="new_password" class="col-form-label text-right">New Password:</label>
                                            <input type="password" name="new_password" class="form-control form-control-sm" required>
                                            @error('new_password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="new_password_confirmation" class="col-form-label text-right">Confirm New Password:</label>
                                            <input type="password" name="new_password_confirmation" class="form-control form-control-sm" required>
                                            @error('new_password_confirmation')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-12 text-center mt-3">
                                            <button type="submit" class="btn btn-primary">Change Password</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('includes.footer')
@endsection
