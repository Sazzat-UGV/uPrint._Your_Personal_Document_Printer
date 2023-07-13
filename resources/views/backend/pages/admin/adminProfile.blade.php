@extends('backend.layout.master')
@section('title')
    Admin Profile
@endsection

@section('content')
    <h4 class="fw-bold py-3 mb-4">Profile</h4>

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Profile Details</h5>
                <!-- Account -->
                <div class="card-body">
                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <img src="{{ asset('uploads/user') }}/{{ Auth::user()->user_image }}" alt="user-avatar"
                            class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                        <div class="button-wrapper">
                            @foreach ($data as $item)
                                <form action="{{ route('admin.imageUpdate', ['slug' => $item->slug]) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                        <span class="d-none d-sm-block">Upload new photo</span>
                                        <i class="bx bx-upload d-block d-sm-none"></i>
                                        <input type="file" name="user_image" id="upload"  hidden class="account-file-input @error('user_image')
                                        is_invalid
                                        @enderror"
                                            />
                                    </label>

                                    <button type="submit" class="btn btn-outline-primary account-image-reset mb-4">
                                        <i class="bx bx-save d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Save</span>
                                    </button>
                                </form>
                            @endforeach
                            @error('user_image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                            @enderror
                            <p class="text-muted mb-0">Allowed JPG. Max size of 5M</p>
                        </div>
                    </div>
                </div>
                <hr class="my-0" />




                <div class="card-body">
                    @foreach ($data as $item)
                        <form id="formAccountSettings" action="{{ route('admin.profileUpdate' , ['slug' => $item->slug]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="mb-3 col-md-12">
                                    <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                                    <input type="text" id="name" value="{{ $item->name }}" name="name"
                                        class="form-control @error('name')
                                is-invalid
                                @enderror" />
                                    @error('name')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label for="email" class="form-label">E-mail <span class="text-danger">*</span></label>
                                    <input  type="text" id="email" name="email"
                                    value="{{ $item->email }}" placeholder="youeEmail" class="form-control @error('email')
                                    is-invalid
                                    @enderror" />
                                    @error('email')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label class="form-label" for="phoneNumber">Phone Number <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text">BD (+880)</span>
                                        <input type="text" id="phoneNumber" placeholder="yourNumber" name="phoneNumber" value="{{ $item->phone }}"  class="form-control @error('phoneNumber')
                                        is-invalid
                                        @enderror" />
                                            @error('phoneNumber')
                                            <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary me-2">Save changes</button>
                                <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                            </div>
                        </form>
                    @endforeach
                </div>
                <!-- /Account -->
            </div>
        </div>
    </div>
@endsection
