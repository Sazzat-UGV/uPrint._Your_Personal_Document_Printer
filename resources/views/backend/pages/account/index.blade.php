@extends('backend.layout.master')
@section('title')
    Accounts
@endsection

@push('admin_style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <style>
        .dataTables_length {
            padding: 20px 0;
        }
    </style>
@endpush

@section('content')
    @include('backend.layout.inc.breadcumb', ['main_page' => 'Accounts', 'sub_page' => ''])

    <div class="card px-4">
        <div class="table-responsive text-nowrap my-2">
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Last Modify</th>
                        <th>Name</th>
                        <th>Student ID</th>
                        <th>Department</th>
                        <th>Balance</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $index => $student)
                        <tr>
                            <th scope="row">{{ $index + 1 }}</th>
                            <td>{{ $student->updated_at->format('d M Y') }}</td>
                            <td>{{ Str::limit($student->name, 25, '...') }}</td>
                            <td>{{ $student->student_id }}</td>
                            <td>{{ $student->department->name }}</td>
                            <td>{{ $student->balance }} TK</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('admin.AddBalancePage',['student_id'=>$student->student_id]) }}"><i
                                                class="bx bx-plus-circle me-1"></i> Add Balance</a>
                                        <a class="dropdown-item" href="{{ route('admin.RemoveBalancePage',['student_id'=>$student->student_id]) }}"><i
                                                class="bx bx-minus-circle me-1"></i> Remove Balance</a>

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
        $(document).ready(function() {
            $('#example').DataTable({
                pagingType: 'first_last_numbers',
            });
            $('.show_confirm').click(function(event) {
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
