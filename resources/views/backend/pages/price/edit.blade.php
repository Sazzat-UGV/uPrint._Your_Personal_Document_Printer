@extends('backend.layout.master')
@section('title')
    Edit Paper Price
@endsection

@push('admin_style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endpush

@section('content')
    @include('backend.layout.inc.breadcumb', ['main_page' => 'Pricing', 'sub_page' => 'Edit Price'])

    <!-- Basic Layout -->
    <div class="col-xxl">
        <div class="card mb-4">

            <div class="card-header d-flex align-items-center">
                <div class="d-flex justify-content-start">
                    <a href="{{ route('admin.PagePriceIndex') }}" class="btn btn-primary">
                        <i class="fa-solid fa-backward"></i>
                        Back to Pricing
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.PagePriceUpdate',$page->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="page_type">Paper Type <span
                            class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <input type="text"  id="page_type" value="{{ $page->paper_type }}" name="paper_type" placeholder="enter paper type" class="form-control @error('paper_type')
                            is-invalid
                            @enderror" />
                            @error('paper_type')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="page_price">Paper Price <span
                            class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <input type="text"  id="page_price" value="{{ $page->paper_price }}" name="page_price" placeholder="enter paper price" class="form-control @error('page_price')
                            is-invalid
                            @enderror" />
                            @error('page_price')
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
