@extends('frontend.layout.master')
@section('title')
    Edit Profile
@endsection


@section('content')
    <h4 class="fw-bold py-3 mb-4">Edit Profile</h4>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">

                    <form id="formAccountSettings" action="{{ route('student.ProfileEdit') }}" method="POST">
                        @method('PUT')
                        @csrf
                        @foreach ($user as $item)

                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                                <input type="text" value="{{ $item->name }}" id="name" name="name"
                                    class="form-control @error('name')
                            is-invalid
                            @enderror" />
                                @error('name')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>


                            <div class="mb-3 col-md-12">
                                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" value="{{ $item->email }}" id="email" name="email"
                                    class="form-control @error('email')
                            is-invalid
                            @enderror" />
                                @error('email')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>


                            <div class="mb-3 col-md-12">
                                <label for="phone" class="form-label">Phone <span class="text-danger">*</span></label>
                                <input type="text" value="{{ $item->phone }}" id="phone" name="phone"
                                    class="form-control @error('phone')
                            is-invalid
                            @enderror" />
                                @error('phone')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>


                            <div class="mb-3 col-md-12">
                                <label for="semester_name" class="form-label">Semester <span class="text-danger">*</span></label>
                                <select
                                    class="form-select form-control @error('semester_name')
                                    is-invalid
                                    @enderror"name="semester_name" aria-label="Default select example">
                                    @foreach ($semesters as $semester)
                                        <option value="{{ $semester->id }}" @if ($semester->id==$item->semester_id)
                                        selected
                                        @endif>{{ $semester->semester_name }}</option>
                                    @endforeach
                                </select>
                                @error('semester_name')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>


                            <div class="mb-3 col-md-12">
                                <label for="department_name" class="form-label">Department <span class="text-danger">*</span></label>
                                <select
                                    class="form-select form-control @error('department_name')
                                    is-invalid
                                    @enderror"name="department_name" aria-label="Default select example">
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}" @if ($department->id==$item->department_id)
                                            selected
                                            @endif>{{ $department->full_name}}</option>
                                    @endforeach
                                </select>
                                @error('department_name')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>




                        </div>
                        @endforeach
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
