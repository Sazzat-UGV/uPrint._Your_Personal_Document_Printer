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
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <title>User Login</title>
  </head>
  <body>



  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6 text-center">
          <img src="{{ asset('assets/frontend/auth/login & registration') }}/images/login.png" alt="Image" class="img-responsive w-100 p-0">
        </div>
        <div class="col-md-6 contents pt" >
          <div class="row justify-content-center">
            <div class="col-md-8 pm">
              <div class="mb-4 pt-3">
              <h3>Sign In to <strong>uPrint<span class="text-danger">.</span></strong></h3>
            </div>
            <form action="#" method="post">
              <div class="form-group first">
                <label for="student_id">Student ID</label>
                <input type="text" class="form-control" id="student_id" >

              </div>
              <div class="form-group last mb-4">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password">
              </div>

              <input type="submit" value="Sign In" class="btn text-white btn-block btn-primary">
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
    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}
  </body>
</html>
