@extends('frontend.layout.master')
@section('title')
Cover Page Genaretor
@endsection


@push('user_style')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@section('content')
@include('frontend.layout.inc.breadcumb', ['main_page' => 'Cover Page', 'sub_page' => 'Genaretor'])


        <div class="row">
            <!-- Basic Layout -->
            <div class="col-xxl">
              <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                  <h5 class="mb-0">Set Cover Page Data</h5>
                </div>
                <div class="card-body">
                  <form action="{{ route('student.PrintCoverPage') }}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="department">Select Your Department <span
                                class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <select id="department_id" name="department_id" class="form-select js-example-basic-single" required>
                                <option value="" selected>Select Department</option>
                                @foreach ($deparments as $deparment)
                               <option value="{{ $deparment->id }}">{{ $deparment->full_name }}</option>
                               @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="semester">Select Semester <span
                                class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <select class="form-select js-example-basic-single" id="semester_id" name="semester_id" required>
                                <option value="" selected>Select Semester</option>
                                @foreach ($semesters as $semester)
                               <option value="{{ $semester->id }}">{{ $semester->semester_name }}</option>
                               @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="subject">Cover Page For <span
                                class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <select class="form-select js-example-basic-single" id="subject_id" name="subject_id">
                                <option value="">Select Subject</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="teacher">Submitted To <span
                                class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <select class="form-select js-example-basic-single" id="teacher_id" name="teacher_id" required>
                                <option value="" selected>Select Teacher</option>
                                @foreach ($teachers as $teacher)
                               <option value="{{ $teacher->id }}">{{ $teacher->teacher_name }}</option>
                               @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label" for="basic-default-company">Assignment Topics</label>
                      <div class="col-sm-10">
                        <input
                          type="text"
                          class="form-control"
                          id="basic-default-company"
                          placeholder="enter assignment topics."
                          name="assignment_topics"
                        />
                      </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="submission_date" class="col-md-2 col-form-label">Date of Submission <span
                            class="text-danger">*</span></label>
                        <div class="col-md-10">
                          <input class="form-control" name="submission_date" type="date" id="submission_date" />
                        </div>
                      </div>

                    <div class="row justify-content-end pb-4">
                      <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Print Cover Page</button>
                      </div>
                    </div>

                  </form>
                </div>
              </div>
            </div>
    </div>

@endsection

@push('user_script')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    var departmentId;
    $(document).ready(function() {
    $('.js-example-basic-single').select2();

    $('#department_id').on('change', function() {
        departmentId = $(this).val();
    });

        $('#semester_id').on('change', function() {
            var semester_id = $(this).val();
            if (semester_id) {
                $.ajax({
                    url: "{{ url('student/subject/ajax') }}/" + semester_id+ "?department_id=" + departmentId,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        console.log(data)
                        var d = $('#subject_id').empty();
                        $.each(data, function(key, value) {
                            $('#subject_id').append('<option value="' + value.id + '">' + value.subject_name + '</option>');
                        });
                    },
                });
            }
        });
    });

</script>

@endpush
