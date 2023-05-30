@extends('backend.layout.master')
@section('title')
General Settings
@endsection


@push('admin_style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endpush

@section('content')
@include('backend.layout.inc.breadcumb', ['main_page' => 'Pages', 'sub_page' => 'General Settings'])
<div class="col-xxl">
    <div class="card mb-4">

        <div class="card-body">
            <form action="{{ route('admin.getGeneralSetting',['id'=>$data->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row mb-5">
                    <label class="col-sm-2 col-form-label" for="about_us">About Us <span
                            class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <textarea name="about_us" placeholder="enter about us" id="about_us" cols="30" rows="10" class="form-control @error('about_us')
                        is-invalid
                        @enderror">{{ $data->about_us }}</textarea>
                        @error('about_us')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="our_policy">Our Policy <span
                            class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <textarea name="our_policy" id="our_policy"  placeholder="enter our policy" cols="30" rows="10" class="form-control @error('our_policy')
                        is-invalid
                        @enderror">{{ $data->our_policy }}</textarea>
                        @error('our_policy')
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

@push('admin_script')
@endpush
