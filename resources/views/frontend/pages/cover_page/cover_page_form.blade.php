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
                  <form action="{{ route('student.PrintCoverPage') }}" method="POST" id="pdfForm">
                    @csrf
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="department">Select Your Department <span
                                class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <select id="department_name" name="department_name" class="form-select js-example-basic-single @error('department_name')
                            is-invalid
                            @enderror" >
                                <option value="" selected>Select Department</option>
                                @foreach ($deparments as $deparment)
                               <option value="{{ $deparment->id }}">{{ $deparment->full_name }}</option>
                               @endforeach
                            </select>
                            @error('department_name')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>


                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="semester">Select Semester <span
                                class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <select class="form-select js-example-basic-single @error('semester_name')
                            is-invalid
                            @enderror" id="semester_name" name="semester_name" >
                                <option value="" selected>Select Semester</option>
                                @foreach ($semesters as $semester)
                               <option value="{{ $semester->id }}">{{ $semester->semester_name }}</option>
                               @endforeach
                            </select>
                            @error('semester_name')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>


                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="subject">Cover Page For <span
                                class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <select class="form-select js-example-basic-single  @error('subject_name')
                            is-invalid
                            @enderror" id="subject_name" name="subject_name">
                                <option value="">Select Subject</option>
                            </select>
                            @error('subject_name')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="teacher">Submitted To <span
                                class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <select class="form-select js-example-basic-single  @error('teacher_name')
                            is-invalid
                            @enderror" id="teacher_name" name="teacher_name" >
                                <option value="" selected>Select Teacher</option>
                                @foreach ($teachers as $teacher)
                               <option value="{{ $teacher->id }}">{{ $teacher->teacher_name }}</option>
                               @endforeach
                            </select>
                            @error('teacher_name')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label" for="basic-default-company">Assignment Topics</label>
                      <div class="col-sm-10">
                        <input
                          type="text"
                          class="form-control @error('assignment_topics')
                          is-invalid
                          @enderror"
                          id="basic-default-company"
                          placeholder="enter assignment topics."
                          name="assignment_topics"
                        />
                        @error('assignment_topics')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                      </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="submission_date" class="col-md-2 col-form-label">Date of Submission <span
                            class="text-danger">*</span></label>
                        <div class="col-md-10">
                          <input class="form-control @error('submission_date')
                          is-invalid
                          @enderror" name="submission_date" type="date" id="submission_date" />
                          @error('submission_date')
                          <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                          @enderror
                        </div>
                      </div>

                    <div class="row justify-content-end pb-4">
                      <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Generate</button>

                        @if(session('message'))
                        <button  onclick="printPDF(event)" class="btn btn-success">Print PDF</button>
                        @endif
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

        $('#department_name').on('change', function() {
            departmentId = $(this).val();
        });

        $('#semester_name').on('change', function() {
            var semester_name = $(this).val();
            if (semester_name) {
                $.ajax({
                    url: "{{ url('student/subject/ajax') }}/" + semester_name + "?department_name=" + departmentId,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        console.log(data)
                        var d = $('#subject_name').empty();
                        $.each(data, function(key, value) {
                            $('#subject_name').append('<option value="' + value.id + '">' + value.subject_name + '</option>');
                        });
                    },
                });
            }
        });
    });

    function printPDF(event) {
    event.preventDefault();
    var userId = {{ auth()->user()->id }};
var fileName = userId + '.pdf';
var filePath = '/pdf/' + fileName;

    // Create an iframe element
    var iframe = document.createElement('iframe');
    iframe.src = filePath;
    iframe.style.width = '0';
    iframe.style.height = '0';
    iframe.style.display = 'none'; // Hide the iframe

    // Append the iframe to the body
    document.body.appendChild(iframe);

    // Wait for the PDF to load in the iframe
    iframe.onload = function() {
      // Call the print method on the iframe
      iframe.contentWindow.print();

      // Reload the page with a delay after printing
      var delayInMilliseconds = 3000; // 3 seconds
      setTimeout(function() {
        // location.reload();
      }, delayInMilliseconds);
    };
  }

  function cancelPrint() {
    // Reload the current page
    window.location.reload();
  }




</script>
@endpush
