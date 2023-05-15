@extends('backend.layout.master')
@section('title')
Teacher List
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
@include('backend.layout.inc.breadcumb',['main_page'=>'Teachers','sub_page'=>'Teacher List'])

<div class="card px-4">
    <div class="col-md-12 col-lg-12 col-sm-12 py-4">
        <div class="d-flex justify-content-end">
            <a href="{{ route('teacher.create') }}" class="btn btn-primary">
                <i class="fas fa-plus-circle"></i>
                Add New Teacher
            </a>
        </div>
    </div>
    <div class="table-responsive text-nowrap my-2">
      <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Teacher Name</th>
                <th>Designation</th>
                <th>Department</th>
                <th>Status</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($teachers as $index=>$teacher)
            @if ($teacher->department->is_active==1)
            <tr>
                <th scope="row">{{ $index+1 }}</th>
                <td>{{ Str::limit($teacher->teacher_name, 35, '...') }}</td>
                <td>{{ $teacher->teacher_designation }}</td>
                <td>{{ $teacher->department->name }}</td>
                <td>@if ($teacher->is_active==1)
                    <a class="btn" href="{{ route('admin.teacherActive',['slug'=>$teacher->slug,'status'=>'1']) }}"><span class="badge bg-success">Active</span></a>
                    @elseif ($teacher->is_active==0)
                    <a class="btn" href="{{ route('admin.teacherActive',['slug'=>$teacher->slug,'status'=>'0']) }}"><span class="badge bg-danger">Deactive</span></a>
                @endif</td>
                <td>
                        <div class="dropdown">
                          <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                            <i class="bx bx-dots-vertical-rounded"></i>
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('teacher.edit', $teacher->slug) }}"
                              ><i class="bx bx-edit-alt me-1"></i> Edit</a
                            >
                            <form action="{{ route('teacher.destroy', $teacher->slug) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="dropdown-item show_confirm" type="submit"><i class="bx bx-trash me-1"></i> Delete</button>
                            </form>
                          </div>
                        </div>
                      </td>
            </tr>
            @endif
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
