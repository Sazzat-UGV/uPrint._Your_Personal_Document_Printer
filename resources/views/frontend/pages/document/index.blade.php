@extends('frontend.layout.master')
@section('title')
Uploaded Document
@endsection


@push('user_style')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@section('content')

        <div class="row">
            <div class="col text-center mt-5">
                <h3 class="mb-4">
                    @if ($finalPrice)
                    This document will cost you <span class="badge bg-danger">{{ $finalPrice }} TK</span> to print.
                    @else
                    Sorry <span >&#128549;</span>! We cannot process your file.
                    @endif
                </h3>
                <a href="{{ route('student.dashboard') }}" class="btn btn-primary">Back To Home</a>
                @if($finalPrice)
                <button  onclick="printPDF(event)" class="btn btn-success">Print PDF</button>
                @endif
            </div>
            <h6 class="text-center mt-3 text-danger" id="error-message"></h6>
    </div>


@endsection

@push('user_script')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    function printPDF(event) {
    event.preventDefault();
    var userId = {{ auth()->user()->id }};
var fileName = userId + '.pdf';
var filePath = '/uploads/student_document/' + fileName;
    // Retrieve finalPrice value
    var finalPrice = "{{ $finalPrice }}";
    // console.log("Final Price:", finalPrice);

// Make an AJAX request to your Laravel controller
$.ajax({
    url: "{{ url('student/totalprice/ajax') }}/" + finalPrice,
      method: 'GET',
      dataType: "json",
    //   data: { finalPrice: finalPrice },
      success: function(data) {
        // Handle the response from the controller if needed
        // console.log(data);

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

      },
      error: function(xhr, status, error) {
        // Handle any errors that occur during the AJAX request
        // console.log('dfdfdfdf');

        // Print an error message in HTML
        var errorMessage = 'Insufficient Balance! Please Recharge your account...';
        document.getElementById('error-message').innerText = errorMessage;
      }
    });


  }


</script>
@endpush

