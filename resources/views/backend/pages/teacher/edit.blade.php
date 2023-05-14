@extends('backend.layout.master')
@section('title')
    Edit Teacher
@endsection

@push('admin_style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endpush

@section('content')
    @include('backend.layout.inc.breadcumb', ['main_page' => 'Teachers', 'sub_page' => 'Edit Teacher'])

    <!-- Basic Layout -->
    <div class="col-xxl">
        <div class="card mb-4">

            <div class="card-header d-flex align-items-center">
                <div class="d-flex justify-content-start">
                    <a href="{{ route('teacher.index') }}" class="btn btn-primary">
                        <i class="fa-solid fa-backward"></i>
                        Back to Teachers
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('teacher.update',$teacher->slug) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="department_name">Department Name <span
                                class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <select class="form-select" name="department_id" aria-label="Default select example">
                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}" @if ($teacher->department_id==$department->id)
                                        selected
                                    @endif>{{ $department->name }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="teacher_name">Teacher Name <span
                            class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <input type="text"  id="teacher_name" name="Teacher_name" value="{{ old('Teacher_name',$teacher->teacher_name) }}" placeholder="enter teacher name" class="form-control @error('Teacher_name')
                            is-invalid
                            @enderror" />
                            @error('Teacher_name')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="teacher_designation">Teacher Designation<span
                            class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <input type="text"  id="teacher_designation" name="Teacher_designation" value="{{ old('Teacher_designation',$teacher->teacher_designation) }}" placeholder="enter teacher designation" class="form-control @error('Teacher_designation')
                            is-invalid
                            @enderror" />
                            @error('Teacher_designation')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>

                    <div class=" row mb-3">
                        <label for="activeStatus" class="col-sm-2 col-form-label">
                            Active or Inactive
                        </label>
                        <div class="col-sm-10 form-check form-switch">
                            <input type="checkbox" class="form-check-input" name="is_active" role="switch" id="activeStatus" @if ($teacher->is_active)
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

