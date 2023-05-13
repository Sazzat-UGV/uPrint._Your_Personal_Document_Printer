@extends('backend.layout.master')
@section('title')
Change Password
@endsection


@section('content')
<h4 class="fw-bold py-3 mb-4">Change Password</h4>
<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-body">

                    <form id="formAccountSettings" action="{{ route('admin.changePassword') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label for="current_password" class="form-label">Current Password <span class="text-danger">*</span></label>
                                <input type="password" id="current_password" name="current_password"
                                    class="form-control @error('current_password')
                            is-invalid
                            @enderror" />
                                @error('current_password')
                                    <span class="invalid-feedback"
                                        role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-12">
                                <label for="password" class="form-label">New Password <span class="text-danger">*</span></label>
                                <input type="password" id="password" name="password"
                                    class="form-control @error('password')
                            is-invalid
                            @enderror" />
                                @error('password')
                                    <span class="invalid-feedback"
                                        role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-12">
                                <label for="password_confirmation" class="form-label">Re-type new Password <span class="text-danger">*</span></label>
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    class="form-control @error('password_confirmation')
                            is-invalid
                            @enderror" />
                                @error('password_confirmation')
                                    <span class="invalid-feedback"
                                        role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>


                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Save changes</button>
                            <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                        </div>
                    </form>
            </div>
            <!-- /Account -->
        </div>
    </div>
</div>

@endsection
