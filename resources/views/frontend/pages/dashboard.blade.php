@extends('frontend.layout.master')
@section('title')
Student Dashboard
@endsection

@push('user_style')

@endpush

@section('content')
{{ Auth::user() }}

@endsection

@push('user_script')

@endpush
