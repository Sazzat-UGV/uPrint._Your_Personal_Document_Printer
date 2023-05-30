<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/frontend/auth/login & registration') }}/fonts/icomoon/style.css">

    <link rel="stylesheet" href="{{ asset('assets/frontend/auth/login & registration') }}/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/auth/login & registration') }}/css/bootstrap.min.css">
         <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/backend') }}/img/favicon/favicon.ico" />
    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/auth/login & registration') }}/css/style.css">

    <title>Student Registration</title>
  </head>
  <body>



  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6 ">
          <img src="{{ asset('assets/frontend/auth/login & registration') }}//images/registration.png" alt="Image" class="img-fluid pp">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8 pr">
              <div class="mb-4">
              <h3>Sign Up to <strong>uPrint<span class="text-danger">.</span></strong></h3>
            </div>
            <form action="{{ route('student.Registration') }}" method="post">
                @csrf
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text"  name="name" class="form-control @error('name')
                is-invalid
                @enderror">
                @error('name')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
              </div>

              <div class="form-group">
                <label for="student_Id">Student ID</label>
                <input type="text" name="student_Id"  class="form-control @error('student_Id')
                is-invalid
                @enderror">
                @error('student_Id')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
              </div>
              <div class="form-group mt-4">
                <label for="semester">Select Semester</label>
                <select class="form-select form-control" style="font-size: 15px" name="semester_id" aria-label="Default select example">
                    <option selected></option>
                    @foreach ($semesters as $semester)
                    <option value="{{ $semester->id }}">{{ $semester->semester_name }}</option>
                    @endforeach
                  </select>
              </div>
              
              <div class="form-group mt-4">
                <label for="department">Select Department</label>
                <select class="form-select form-control" style="font-size: 15px" name="department_id" aria-label="Default select example">
                    <option selected></option>
                    @foreach ($departments as $department)
                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach
                  </select>
              </div>

              <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text"  name="phone" class="form-control @error('phone')
                is-invalid
                @enderror" >
                @error('phone')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
              </div>


              <div class="form-group ">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control @error('password')
                is-invalid
                @enderror">
                @error('password')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
              </div>

              <div class="form-group mb-3 ">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
              </div>


              <input type="submit" value="Sign Up" class="btn text-white btn-block btn-danger">
              <div class="form-group pt-2">
                <a href="{{ route('HomePage') }}" style="text-decoration: none; font-size: 15px" ><span class="text-muted" >Back to Home</span></a>
              </div>

            </form>
            </div>
          </div>

        </div>

      </div>
    </div>
  </div>


    <script src="{{ asset('assets/frontend/auth/login & registration') }}/js/jquery-3.3.1.min.js"></script>
    <script src="{{ asset('assets/frontend/auth/login & registration') }}/js/popper.min.js"></script>
    <script src="{{ asset('assets/frontend/auth/login & registration') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('assets/frontend/auth/login & registration') }}/js/main.js"></script>
  </body>
</html>
