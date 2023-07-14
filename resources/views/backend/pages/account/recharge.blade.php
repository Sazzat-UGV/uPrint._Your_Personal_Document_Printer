@extends('backend.layout.master')
@section('title')
Recharge Account
@endsection

@push('admin_style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endpush

@section('content')
    @include('backend.layout.inc.breadcumb', ['main_page' => 'Accounts', 'sub_page' => 'Recharge Account'])

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">

                    @foreach ($student as $item)
                        <form id="formAccountSettings" action="{{ route('admin.AddBalance',['student_id'=>$item->student_id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="text" value="{{ $item->balance }}" hidden>

                            <div class="mb-3 col-md-12">
                                <label for="recharge_amount" class="form-label">Recherge Amount<span class="text-danger">*</span></label>
                                <input type="text" id="recharge_amount" name="recharge_amount"
                                class="form-control @error('recharge_amount')
                                is-invalid
                                @enderror" />
                                @error('recharge_amount')
                                <span class="invalid-feedback"
                                role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>



                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary me-2">Recharge</button>
                            </div>
                        </form>
                        @endforeach
                    </div>
                    </div>
                <!-- /Account -->
            </div>
        </div>
    </div>
@endsection

@push('admin_script')
@endpush
