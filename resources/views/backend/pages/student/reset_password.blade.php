@extends('backend.layout.master')
@section('title')
Student Password Reset
@endsection

@push('admin_style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endpush

@section('content')
@include('backend.layout.inc.breadcumb',['main_page'=>'Students','sub_page'=>'Password Reset'])

    <!-- Basic Layout -->
    <div class="col-xxl">
        <div class="card mb-4">

            <div class="card-header d-flex align-items-center">
                <div class="d-flex justify-content-start">
                    <a href="{{ route('admin.studentIndexPage') }}" class="btn btn-primary">
                        <i class="fa-solid fa-backward"></i>
                        Back to Students
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.studentPasswordReset',['student_id'=>$students->student_id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="reset_password">New Password <span
                            class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <input type="text"  id="reset_password" name="reset_password" placeholder="enter new password" class="form-control @error('reset_password')
                            is-invalid
                            @enderror" />
                            @error('reset_password')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>

                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-warning">Change</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('admin_script')

@endpush






