@extends('backend.layout.master')
@section('title')
Edit Department
@endsection

@push('admin_style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endpush

@section('content')
@include('backend.layout.inc.breadcumb',['main_page'=>'Departments','sub_page'=>'Edit Department'])

    <!-- Basic Layout -->
    <div class="col-xxl">
      <div class="card mb-4">

        <div class="card-header d-flex align-items-center">
            <div class="d-flex justify-content-start">
                <a href="{{ route('department.index') }}" class="btn btn-primary">
                    <i class="fa-solid fa-backward"></i>
                    Back to Departments
                </a>
            </div>
        </div>
        <div class="card-body">
          <form action="{{ route('department.update',$department->slug) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="department_name">Department Name <span class="text-danger">*</span></label>
              <div class="col-sm-10">
                <input type="text"  id="department_name" name="name" value="{{ $department->name }}" placeholder="enter department name" class="form-control @error('name')
                is-invalid
                @enderror"/>
                @error('name')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
              </div>
            </div>
            <div class=" row mb-3">
                <label for="activeStatus" class="col-sm-2 col-form-label">
                    Active or Inactive
                </label>
                <div class="col-sm-10 form-check form-switch">
                    <input type="checkbox" class="form-check-input" name="is_active" role="switch" id="activeStatus" @if ($department->is_active)
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

@push('admin_script')

@endpush
