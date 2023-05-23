<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/frontend/auth/login') }}/fonts/icomoon/style.css">

    <link rel="stylesheet" href="{{ asset('assets/frontend/auth/login') }}/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/auth/login') }}/css/bootstrap.min.css">
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/frontend/auth/login') }}/img/favicon/favicon.ico" />
    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/auth/login') }}/css/style.css">

    <title>User Login</title>
  </head>
  <body>



  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6 text-center">
          <img src="{{ asset('assets/frontend/auth/login') }}/images/login.png" alt="Image" class="img-responsive w-100 p-0">
        </div>
        <div class="col-md-6 contents pt" >
          <div class="row justify-content-center">
            <div class="col-md-8">
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
              <input type="submit" value="Log In" class="btn text-white btn-block btn-primary">
            </form>
            </div>
          </div>

        </div>

      </div>
    </div>
  </div>


    <script src="{{ asset('assets/frontend/auth/login') }}/js/jquery-3.3.1.min.js"></script>
    <script src="{{ asset('assets/frontend/auth/login') }}/js/popper.min.js"></script>
    <script src="{{ asset('assets/frontend/auth/login') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('assets/frontend/auth/login') }}/js/main.js"></script>
  </body>
</html>
