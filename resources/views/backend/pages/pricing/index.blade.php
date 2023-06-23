@extends('backend.layout.master')
@section('title')
    Price List
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
    @include('backend.layout.inc.breadcumb', ['main_page' => 'Pricing', 'sub_page' => 'Price List'])

    <div class="card px-4">
        <div class="table-responsive text-nowrap my-4">
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Last Modified</th>
                        <th>Paper Type</th>
                        <th>Paper Price</th>
                        <th>Show to User</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pages as $index => $page)
                        <tr>
                            <th scope="row">{{ $index + 1 }}</th>
                            <td>{{ $page->updated_at->format('d M Y') }}</td>
                            <td>{{ $page->paper_type }}</td>
                            <td>{{ $page->paper_price }} TK/page</td>
                            <td>
                                <div class="form-check form-switch">
                                    <input class="form-check-input toggle-class" type="checkbox" role="switch"
                                        data-id="{{ $page->id }}" id="page-{{ $page->id }}"
                                        {{ $page->show_on_hompage ? 'checked' : '' }}>

                                </div>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('admin.PagePriceEdit',$page->id) }}"><i
                                                class="bx bx-edit-alt me-1"></i> Edit</a>

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

            $('.toggle-class').change(function() {
                var show_on_hompage = $(this).prop('checked') == true ? 1 : 0;
                var item_id = $(this).data('id');

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '/admin/check/price/show_on_hompage/' + item_id,
                    success: function(response) {
                        console.log(response);
                        Swal.fire(
                            'Status Updated!',
                            'Click ok button!',
                            'success'
                        )
                    },
                    errro: function(err) {
                        if (err) {
                            console.log(err);
                        }
                    }
                });
            });

        });
    </script>
@endpush
