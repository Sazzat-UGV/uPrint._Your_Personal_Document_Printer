@extends('backend.layout.master')
@section('title')
    Edit Subject
@endsection

@push('admin_style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endpush

@section('content')
    @include('backend.layout.inc.breadcumb', ['main_page' => 'Subjects', 'sub_page' => 'Edit Subject'])

    <!-- Basic Layout -->
    <div class="col-xxl">
        <div class="card mb-4">

            <div class="card-header d-flex align-items-center">
                <div class="d-flex justify-content-start">
                    <a href="{{ route('subject.index') }}" class="btn btn-primary">
                        <i class="fa-solid fa-backward"></i>
                        Back to Subjects
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('subject.update', $subject->slug) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="semester_id">Select Semester <span
                                class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <select class="form-select" name="semester_id" aria-label="Default select example">
                                @foreach ($semesters as $semester)
                                <option value="{{ $semester->id }}"@if ($subject->semester_id==$semester->id)
                                    selected
                                @endif >{{ $semester->semester_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="subject_name">Subject Name <span
                                class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" id="subject_name" value="{{ $subject->subject_name }}" name="subject_name"
                                placeholder="enter subject name"
                                class="form-control @error('subject_name')
                            is-invalid
                            @enderror" />
                            @error('subject_name')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="subject_code">Subject Code <span
                                class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <input type="text"  value="{{ $subject->subject_code }}" id="subject_code" name="subject_code"
                                placeholder="enter subject code"
                                class="form-control @error('subject_code')
                            is-invalid
                            @enderror" />
                            @error('subject_code')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>

                    <div class=" row mb-3">
                        <label for="activeStatus" class="col-sm-2 col-form-label">
                            Active or Inactive
                        </label>
                        <div class="col-sm-10 form-check form-switch">
                            <input type="checkbox" class="form-check-input" name="is_active" role="switch" id="activeStatus" @if ($subject->is_active)
                            checked
                            @endif>
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
