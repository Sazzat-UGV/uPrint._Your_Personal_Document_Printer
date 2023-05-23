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

    <title>User Registration</title>
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
            <form action="#" method="post">
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="username">
              </div>
              <div class="form-group">
                <label for="student_Id">Student ID</label>
                <input type="text" class="form-control" id="student_Id">
              </div>
              <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" id="email">
              </div>
              <div class="form-group ">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password">
              </div>
              <div class="form-group mb-5 ">
                <label for="confirm_password">Confirm Password</label>
                <input type="password_confirmation" class="form-control" id="confirm_password">
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
