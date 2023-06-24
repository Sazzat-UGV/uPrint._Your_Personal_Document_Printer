@extends('frontend.layout.master')
@section('title')
Print Documents
@endsection

@push('user_style')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>

.upload-form {
  padding: 30px;
  border-radius: 10px;
}


.form-group {
  margin-bottom: 20px;
}

.form-group label {
  display: block;
  font-weight: bold;
  margin-bottom: 5px;
}

.upload-button {
  display: inline-block;
  background-color: #6bc251;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  border-radius: 5px;
  cursor: pointer;
  font-size: 16px;
  transition: background-color 0.3s;
}

.upload-button:hover {
  background-color: #0056b3;
}

.upload-button input[type="file"] {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  opacity: 0;
  cursor: pointer;
  width: 100%;
  height: 100%;
}

.upload-icon {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100%;
  font-size: 0;
}

.upload-icon img {
  max-height: 100%;
  max-width: 100%;
}

.upload-area {
  border: 2px dashed #007bff;
  background-color: #ffffff;
  padding: 20px;
  border-radius: 5px;
  text-align: center;
  cursor: pointer;
  transition: border-color 0.3s;
}

.upload-area:hover {
  border-color: #0056b3;
}

.upload-area-text {
  font-size: 16px;
  color: #777777;
}

.upload-pdf-icon {
  font-size: 40px;
  color: #007bff;
}

.form-group::after {
  content: "";
  display: table;
  clear: both;
}
</style>

@endpush


@section('content')
@include('frontend.layout.inc.breadcumb', ['main_page' => 'Documents', 'sub_page' => 'Print'])

<div class="row">
  <!-- Basic Layout -->
  <div class="col-xxl">
    <div class="card mb-4">
      <div class="card-body">
        <div class="upload-form">
          <form action="{{ route('student.GetDocument') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="pdfFile">Select your PDF file:</label>
              <div class="upload-area p-5" id="uploadArea">
                <div class="upload-icon">
                  <i class="fas fa-file-pdf upload-pdf-icon"></i>
                </div>
                <div class="upload-area-text p-3">Click here to choose file</div>
              </div>
              <input type="file" id="pdfFile" name="pdfFile" accept=".pdf" style="display: none;">
            </div>
            <div class="form-group">
              <button type="submit" id="uploadButton" class="upload-button">Upload</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@push('user_script')
<script>
document.addEventListener("DOMContentLoaded", function() {
  var uploadArea = document.getElementById("uploadArea");
  var pdfFileInput = document.getElementById("pdfFile");
  var uploadForm = document.getElementById("uploadForm");
  var uploadButton = document.getElementById("uploadButton");

  uploadArea.addEventListener("click", function() {
    pdfFileInput.click();
  });

  pdfFileInput.addEventListener("change", function() {
    var fileName = pdfFileInput.value.split("\\").pop();
    var uploadAreaText = document.querySelector(".upload-area-text");
    uploadAreaText.innerHTML = fileName;
  });

});
</script>

@endpush
