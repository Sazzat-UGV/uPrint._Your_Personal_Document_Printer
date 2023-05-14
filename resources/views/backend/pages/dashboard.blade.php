@extends('backend.layout.master')
@section('title')
Admin Dashboard
@endsection

@push('admin_style')

@endpush

@section('content')

<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-6 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="card-title d-flex align-items-start justify-content-between">
            <div class="avatar flex-shrink-0">
                <i class="rounded menu-icon tf-icons bx bx-buildings"></i>
            </div>
          </div>
          <span class="fw-semibold d-block mb-1">Departments</span>
          <h3 class="card-title mb-2">{{ $department }}</h3>
        </div>
      </div>
    </div>


    <div class="col-lg-3 col-md-3 col-sm-6 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="card-title d-flex align-items-start justify-content-between">
            <div class="avatar flex-shrink-0">
              <img src="../assets/img/icons/unicons/chart-success.png" alt="chart success" class="rounded">
            </div>
            <div class="dropdown">
              <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="bx bx-dots-vertical-rounded"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                <a class="dropdown-item" href="javascript:void(0);">View More</a>
                <a class="dropdown-item" href="javascript:void(0);">Delete</a>
              </div>
            </div>
          </div>
          <span class="fw-semibold d-block mb-1">Profit</span>
          <h3 class="card-title mb-2">$12,628</h3>
          <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +72.80%</small>
        </div>
      </div>
    </div>
  </div>

@endsection

@push('admin_script')

@endpush
