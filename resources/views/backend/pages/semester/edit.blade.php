@extends('backend.layout.master')
@section('title')
    Edit Semester
@endsection

@push('admin_style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endpush

@section('content')
    @include('backend.layout.inc.breadcumb', ['main_page' => 'Semesters', 'sub_page' => 'Edit Semester'])

    <!-- Basic Layout -->
    <div class="col-xxl">
        <div class="card mb-4">

            <div class="card-header d-flex align-items-center">
                <div class="d-flex justify-content-start">
                    <a href="{{ route('semester.index') }}" class="btn btn-primary">
                        <i class="fa-solid fa-backward"></i>
                        Back to Semesters
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('semester.update', $semester->slug) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="semester_name">Semester Name <span
                            class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <input type="text"  id="semester_name" value="{{ $semester->semester_name }}" name="semester_name" placeholder="enter semester name" class="form-control @error('semester_name')
                            is-invalid
                            @enderror" />
                            @error('semester_name')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>

                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-warning">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
