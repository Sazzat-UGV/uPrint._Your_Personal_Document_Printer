@extends('backend.layout.master')
@section('title')
Student List
@endsection

@push('admin_style')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    .dataTables_length {
        padding: 20px 0;
    }
</style>
@endpush

@section('content')
@include('backend.layout.inc.breadcumb',['main_page'=>'Students','sub_page'=>'Student List'])

<div class="card px-4">
    <div class="table-responsive text-nowrap my-2">
      <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Registered at</th>
                <th>Student Image</th>
                <th>Student Name</th>
                <th>Student ID</th>
                <th>Department</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $index=>$student)
            <tr>
                <th scope="row">{{ $index+1 }}</th>
                <td>{{ $student->created_at->format('d M Y') }}</td>
                <td><img src="{{ asset('uploads/user') }}/{{ $student->user_image }}"
                    alt="" class="img-fluid rounded w-50 "></td>
                <td>{{ Str::limit($student->name, 25, '...') }}</td>
                <td>{{ $student->student_id }}</td>
                <td>{{ Str::limit($student->department->name, 12, '...') }}</td>
                <td>
                        <div class="dropdown">
                          <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                            <i class="bx bx-dots-vertical-rounded"></i>
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('admin.studentDetailsPage',['student_id'=>$student->student_id]) }}"
                              ><i class="bx bxs-user-detail me-1"></i> Details</a
                            >
                            <a class="dropdown-item" href="{{ route('admin.studentPasswordResetPage',['student_id'=>$student->student_id]) }}"
                              ><i class="bx bx-reset me-1"></i> Reset Password</a
                            >
                            <form action="{{ route('admin.studentDelete',['student_id'=>$student->student_id]) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="dropdown-item show_confirm" type="submit"><i class="bx bx-trash me-1"></i> Delete</button>
                            </form>
                          </div>
                        </div>
                      </td>
            </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>

@endsection

@push('admin_script')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
$(document).ready(function () {
    $('#example').DataTable({
        pagingType: 'first_last_numbers',
   });
    $('.show_confirm').click(function(event){
        let form = $(this).closest('form');
        event.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
            }
            })
    })
});
    </script>
@endpush






