@extends('backend.layout.master')
@section('title')
    Backup Index
@endsection

@push('admin_style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
@endpush
@section('content')
@include('backend.layout.inc.breadcumb', ['main_page' => 'Backup Management', 'sub_page' => 'Backup Index'])
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="d-flex justify-content-end align-items-center my-3">

                    <button type="button" class="btn btn-primary me-4" onclick="event.preventDefault(); document.getElementById('new-backup-form').submit();">Create Backup</button>
                    <form action="{{ route('backup.store') }}" method="post" class="d-none" id="new-backup-form">
                    @csrf
                </form>
                </div>
                <div class="table-responsive text-nowrap p-3">
                    <table class="table table-hover" id="myTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Last Updated</th>
                                <th>File Name</th>
                                <th>File Size</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($backups as $index=>$backup)
                                <tr>
                                    <td><strong>{{ $index + 1 }}</strong></td>
                                    <td>{{ $backup['created_at'] }}</td>
                                    <td>{{ $backup['file_name'] }}</td>
                                    <td>{{ $backup['file_size'] }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ route('admin.backupDownload',  $backup['file_name']) }}"><i
                                                        class="bx bx-download alt me-1"></i>
                                                    Download</a>
                                                <form action="{{ route('backup.destroy',$backup['file_name']) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="dropdown-item" type="submit"><i
                                                            class="bx bx-trash me-1"></i>
                                                        Delete</button>
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
        </div>
    </div>
@endsection

@push('admin_script')

    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();

        });
    </script>
@endpush
