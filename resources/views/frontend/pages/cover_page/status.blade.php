@extends('frontend.layout.master')
@section('title')
Cover Page Print
@endsection


@push('user_style')

@endpush

@section('content')

        <div class="row">
            <div class="col text-center mt-5">
                <h3 class="mb-4">
                    @if(session('message'))
                {{ session('message') }}
                @elseif(session('status'))
                {{ session('status') }}
                @endif
                </h3>
                <a href="{{ route('student.dashboard') }}" class="btn btn-primary">Back To Home</a>
                @if(session('message'))
                <button  onclick="printPDF(event)" class="btn btn-success">Print PDF</button>
                @endif
            </div>
    </div>


@endsection

@push('user_script')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
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

