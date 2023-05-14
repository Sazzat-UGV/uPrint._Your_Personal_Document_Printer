@extends('backend.layout.master')
@section('title')
Create Department
@endsection

@push('admin_style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endpush

@section('content')
@include('backend.layout.inc.breadcumb',['main_page'=>'Departments','sub_page'=>'Add New Department'])

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
          <form action="{{ route('department.store') }}" method="POST">
            @csrf
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="department_name">Department Name <span class="text-danger">*</span></label>
              <div class="col-sm-10">
                <input type="text"  id="department_name" name="name" placeholder="enter department name" class="form-control @error('name')
                is-invalid
                @enderror"/>
                @error('name')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
              </div>
            </div>
            <div class="row justify-content-end">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
@endsection

@push('admin_script')

@endpush
